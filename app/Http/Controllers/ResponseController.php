<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ResponseController extends Controller
{
    use AuthorizesRequests;

    public static function middleware(): array
    {
        return ['auth'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Survey $survey)
    {
        $this->authorize('respond', $survey);

        $validated = $request->validate([
            'responses' => 'required|array',
            'responses.*.question_id' => 'required|exists:questions,id',
            'responses.*.response_value' => 'required|string'
        ]);

        // Verificar que todas las preguntas requeridas tengan respuesta
        $requiredQuestions = $survey->questions()->where('is_required', true)->pluck('id');
        $answeredQuestions = collect($validated['responses'])->pluck('question_id');

        if ($requiredQuestions->diff($answeredQuestions)->isNotEmpty()) {
            return back()->withErrors(['message' => 'Por favor responde todas las preguntas requeridas.']);
        }

        foreach ($validated['responses'] as $response) {
            $survey->responses()->create([
                'question_id' => $response['question_id'],
                'user_id' => auth()->id(),
                'response_value' => $response['response_value']
            ]);
        }

        return redirect()->route('surveys.show', $survey)
            ->with('success', '¡Gracias por completar la encuesta!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function results(Survey $survey)
    {
        $this->authorize('view-results', $survey);

        $survey->load(['questions.responses', 'responses']);

        return view('surveys.results', compact('survey'));
    }
}
