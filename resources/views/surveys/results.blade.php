<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Resultados: {{ $survey->title }}</h2>
                        <p class="text-gray-600 mt-2">{{ $survey->description }}</p>
                        <p class="text-sm text-gray-500 mt-1">
                            Total de respuestas: {{ $survey->responses->groupBy('user_id')->count() }}
                        </p>
                    </div>

                    <div class="space-y-8">
                        @foreach($survey->questions as $question)
                            <div class="bg-gray-50 p-6 rounded-lg">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">
                                    {{ $question->question_text }}
                                </h3>

                                @php
                                    $responses = $question->responses;
                                    $totalResponses = $responses->count();
                                @endphp

                                @switch($question->type)
                                    @case('multiple_choice')
                                        @php
                                            $options = $responses->groupBy('response_value')
                                                ->map(function($group) use ($totalResponses) {
                                                    return [
                                                        'count' => $group->count(),
                                                        'percentage' => $totalResponses > 0
                                                            ? round(($group->count() / $totalResponses) * 100, 1)
                                                            : 0
                                                    ];
                                                });
                                        @endphp

                                        <div class="space-y-3">
                                            @foreach($options as $option => $stats)
                                                <div>
                                                    <div class="flex justify-between text-sm text-gray-700">
                                                        <span>{{ $option }}</span>
                                                        <span>{{ $stats['count'] }} ({{ $stats['percentage'] }}%)</span>
                                                    </div>
                                                    <div class="mt-1 h-2 bg-gray-200 rounded-full">
                                                        <div class="h-2 bg-[#3674B5] rounded-full"
                                                             style="width: {{ $stats['percentage'] }}%">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        @break

                                    @case('rating')
                                        @php
                                            $ratings = $responses->groupBy('response_value')
                                                ->map(function($group) use ($totalResponses) {
                                                    return [
                                                        'count' => $group->count(),
                                                        'percentage' => $totalResponses > 0
                                                            ? round(($group->count() / $totalResponses) * 100, 1)
                                                            : 0
                                                    ];
                                                });
                                            $averageRating = $totalResponses > 0
                                                ? round($responses->avg('response_value'), 1)
                                                : 0;
                                        @endphp

                                        <div>
                                            <p class="text-lg font-medium text-gray-900 mb-4">
                                                Calificación promedio: {{ $averageRating }} / 5
                                            </p>
                                            <div class="grid grid-cols-5 gap-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <div>
                                                        <div class="text-center text-sm text-gray-700 mb-1">
                                                            {{ $i }}
                                                        </div>
                                                        <div class="h-24 bg-gray-200 rounded-t-lg relative">
                                                            <div class="absolute bottom-0 w-full bg-[#3674B5]"
                                                                 style="height: {{ ($ratings[$i]['percentage'] ?? 0) }}%">
                                                            </div>
                                                        </div>
                                                        <div class="text-center text-xs text-gray-500 mt-1">
                                                            {{ $ratings[$i]['count'] ?? 0 }}
                                                        </div>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                        @break

                                    @case('text')
                                        <div class="space-y-3">
                                            @foreach($responses as $response)
                                                <div class="bg-white p-3 rounded border border-gray-200">
                                                    {{ $response->response_value }}
                                                </div>
                                            @endforeach
                                        </div>
                                        @break
                                @endswitch
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
