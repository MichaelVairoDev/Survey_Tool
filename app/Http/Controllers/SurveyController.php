<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SurveyController extends Controller
{
    use AuthorizesRequests;

    public static function middleware(): array
    {
        return [
            'auth' => ['except' => ['index', 'show']]
        ];
    }

    public function index()
    {
        $surveys = Survey::with('questions')
            ->withCount('questions')
            ->where('is_active', true)
            ->where(function($query) {
                $query->whereNull('expires_at')
                      ->orWhere('expires_at', '>', now());
            })
            ->latest()
            ->paginate(9);

        return view('surveys.index', compact('surveys'));
    }

    public function create()
    {
        return view('surveys.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'expires_at' => 'nullable|date|after:today',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $survey = $request->user()->surveys()->create($validated);

        return redirect()->route('surveys.edit', $survey)
            ->with('success', 'Encuesta creada exitosamente. Ahora puedes agregar preguntas.');
    }

    public function show(Survey $survey)
    {
        if (!$survey->is_active && !auth()->user()?->can('update', $survey)) {
            abort(404);
        }

        if ($survey->expires_at && $survey->expires_at->isPast() && !auth()->user()?->can('update', $survey)) {
            abort(404);
        }

        $survey->load(['questions.answers' => function($query) {
            $query->orderBy('order');
        }]);

        $hasResponded = false;
        if (auth()->check()) {
            $hasResponded = $survey->responses()
                ->where('user_id', auth()->id())
                ->exists();
        }

        return view('surveys.show', compact('survey', 'hasResponded'));
    }

    public function edit(Survey $survey)
    {
        $this->authorize('update', $survey);

        $survey->load(['questions.answers' => function($query) {
            $query->orderBy('order');
        }]);

        return view('surveys.edit', compact('survey'));
    }

    public function update(Request $request, Survey $survey)
    {
        $this->authorize('update', $survey);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'expires_at' => 'nullable|date',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $survey->update($validated);

        return redirect()->route('surveys.show', $survey)
            ->with('success', 'Encuesta actualizada exitosamente.');
    }

    public function destroy(Survey $survey)
    {
        $this->authorize('delete', $survey);

        $survey->questions()->delete(); // Esto eliminará las preguntas y sus respuestas en cascada
        $survey->delete();

        return redirect()->route('surveys.index')
            ->with('success', 'Encuesta eliminada exitosamente.');
    }

    public function results(Survey $survey)
    {
        $this->authorize('view-results', $survey);

        $survey->load(['questions.responses', 'questions.answers']);

        // Calcular estadísticas para cada pregunta
        foreach ($survey->questions as $question) {
            $responses = $question->responses;
            $totalResponses = $responses->count();

            $stats = [
                'total' => $totalResponses,
                'data' => []
            ];

            if ($question->type === 'multiple_choice') {
                $stats['data'] = $responses->groupBy('response_value')
                    ->map(function($group) use ($totalResponses) {
                        return [
                            'count' => $group->count(),
                            'percentage' => $totalResponses > 0 ? round(($group->count() / $totalResponses) * 100, 1) : 0
                        ];
                    })->toArray();
            }
            elseif ($question->type === 'rating') {
                $stats['average'] = $totalResponses > 0 ? round($responses->avg('response_value'), 1) : 0;
                $stats['distribution'] = $responses->groupBy('response_value')
                    ->map(function($group) use ($totalResponses) {
                        return [
                            'count' => $group->count(),
                            'percentage' => $totalResponses > 0 ? round(($group->count() / $totalResponses) * 100, 1) : 0
                        ];
                    })->toArray();
            }

            $question->stats = $stats;
        }

        return view('surveys.results', compact('survey'));
    }
}
