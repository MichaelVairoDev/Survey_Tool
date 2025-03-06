<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-6">
                        <div>
                            <h2 class="text-2xl font-semibold text-gray-800">{{ $survey->title }}</h2>
                            <p class="text-gray-600 mt-2">{{ $survey->description }}</p>
                        </div>
                        @can('update', $survey)
                        <div class="flex space-x-3">
                            <a href="{{ route('surveys.results', $survey) }}"
                               class="bg-[#A1E3F9] text-gray-700 px-4 py-2 rounded-lg hover:bg-[#D1F8EF]">
                                Ver Resultados
                            </a>
                            <a href="{{ route('surveys.edit', $survey) }}"
                               class="bg-[#578FCA] text-white px-4 py-2 rounded-lg hover:bg-[#3674B5]">
                                Editar
                            </a>
                            <form action="{{ route('surveys.destroy', $survey) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600"
                                        onclick="return confirm('¿Estás seguro de eliminar esta encuesta?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                        @endcan
                    </div>

                    @if($survey->questions->isNotEmpty())
                        <form action="{{ route('responses.store', $survey) }}" method="POST" class="space-y-6">
                            @csrf
                            @foreach($survey->questions as $question)
                                <div class="bg-gray-50 p-4 rounded-lg">
                                    <label class="block text-sm font-medium text-gray-700 mb-3">
                                        {{ $question->question_text }}
                                        @if($question->is_required)
                                            <span class="text-red-500">*</span>
                                        @endif
                                    </label>

                                    @switch($question->type)
                                        @case('multiple_choice')
                                            <div class="space-y-2">
                                                @foreach($question->answers as $answer)
                                                    <div class="flex items-center">
                                                        <input type="radio"
                                                               name="responses[{{ $question->id }}][response_value]"
                                                               value="{{ $answer->answer_text }}"
                                                               id="answer_{{ $answer->id }}"
                                                               class="focus:ring-[#3674B5] h-4 w-4 text-[#3674B5] border-gray-300"
                                                               {{ $question->is_required ? 'required' : '' }}>
                                                        <label for="answer_{{ $answer->id }}"
                                                               class="ml-3 block text-sm text-gray-700">
                                                            {{ $answer->answer_text }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                            @break
                                        @case('text')
                                            <textarea name="responses[{{ $question->id }}][response_value]"
                                                      rows="3"
                                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"
                                                      {{ $question->is_required ? 'required' : '' }}></textarea>
                                            @break
                                        @case('rating')
                                            <div class="flex space-x-4">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <div class="flex items-center">
                                                        <input type="radio"
                                                               name="responses[{{ $question->id }}][response_value]"
                                                               value="{{ $i }}"
                                                               id="rating_{{ $question->id }}_{{ $i }}"
                                                               class="focus:ring-[#3674B5] h-4 w-4 text-[#3674B5] border-gray-300"
                                                               {{ $question->is_required ? 'required' : '' }}>
                                                        <label for="rating_{{ $question->id }}_{{ $i }}"
                                                               class="ml-2 text-sm text-gray-700">
                                                            {{ $i }}
                                                        </label>
                                                    </div>
                                                @endfor
                                            </div>
                                            @break
                                    @endswitch
                                </div>
                            @endforeach

                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                        class="bg-[#3674B5] text-white px-6 py-2 rounded-lg hover:bg-[#578FCA]">
                                    Enviar Respuestas
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500">Esta encuesta aún no tiene preguntas.</p>
                            @can('update', $survey)
                                <a href="{{ route('surveys.edit', $survey) }}"
                                   class="inline-block mt-4 bg-[#578FCA] text-white px-4 py-2 rounded-lg hover:bg-[#3674B5]">
                                    Agregar Preguntas
                                </a>
                            @endcan
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
