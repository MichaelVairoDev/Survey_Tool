<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class QuestionController extends Controller
{
    use AuthorizesRequests;

    public static function middleware(): array
    {
        return ['auth'];
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Survey $survey)
    {
        $this->authorize('update', $survey);

        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'type' => 'required|in:multiple_choice,text,rating',
            'is_required' => 'boolean',
            'order' => 'integer',
            'answers' => 'required_if:type,multiple_choice|array',
            'answers.*' => 'required_if:type,multiple_choice|string|max:255'
        ]);

        $question = $survey->questions()->create([
            'question_text' => $validated['question_text'],
            'type' => $validated['type'],
            'is_required' => $validated['is_required'] ?? true,
            'order' => $validated['order'] ?? 0
        ]);

        if ($validated['type'] === 'multiple_choice' && isset($validated['answers'])) {
            foreach ($validated['answers'] as $index => $answerText) {
                $question->answers()->create([
                    'answer_text' => $answerText,
                    'order' => $index
                ]);
            }
        }

        return redirect()->route('surveys.show', $survey)
            ->with('success', 'Pregunta agregada exitosamente.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, Survey $survey, Question $question)
    {
        $this->authorize('update', $survey);

        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'type' => 'required|in:multiple_choice,text,rating',
            'is_required' => 'boolean',
            'order' => 'integer'
        ]);

        $question->update($validated);

        return redirect()->route('surveys.show', $survey)
            ->with('success', 'Pregunta actualizada exitosamente.');
    }

    public function destroy(Survey $survey, Question $question)
    {
        $this->authorize('update', $survey);

        $question->delete();

        return redirect()->route('surveys.show', $survey)
            ->with('success', 'Pregunta eliminada exitosamente.');
    }
}
