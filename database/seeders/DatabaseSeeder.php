<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Response;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear usuario de prueba
        $user = User::create([
            'name' => 'Usuario Demo',
            'email' => 'demo@example.com',
            'password' => Hash::make('password123')
        ]);

        // Crear una encuesta de ejemplo
        $survey = Survey::create([
            'user_id' => $user->id,
            'title' => 'Evaluación de Satisfacción',
            'description' => 'Ayúdanos a mejorar nuestros servicios respondiendo esta breve encuesta.',
            'is_active' => true
        ]);

        // Crear preguntas de ejemplo
        $questions = [
            [
                'type' => 'rating',
                'text' => '¿Qué tan satisfecho estás con nuestro servicio?',
                'required' => true
            ],
            [
                'type' => 'multiple_choice',
                'text' => '¿Cómo nos conociste?',
                'required' => true,
                'answers' => [
                    'Redes sociales',
                    'Recomendación',
                    'Búsqueda en internet',
                    'Publicidad'
                ]
            ],
            [
                'type' => 'text',
                'text' => '¿Qué sugerencias tienes para mejorar nuestro servicio?',
                'required' => false
            ]
        ];

        foreach ($questions as $index => $q) {
            $question = Question::create([
                'survey_id' => $survey->id,
                'question_text' => $q['text'],
                'type' => $q['type'],
                'is_required' => $q['required'],
                'order' => $index + 1
            ]);

            if ($q['type'] === 'multiple_choice') {
                foreach ($q['answers'] as $index => $answerText) {
                    Answer::create([
                        'question_id' => $question->id,
                        'answer_text' => $answerText,
                        'order' => $index + 1
                    ]);
                }
            }
        }
    }
}
