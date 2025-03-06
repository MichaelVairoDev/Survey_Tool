<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Editar Encuesta -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-6">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Editar Encuesta</h2>

                    <form action="{{ route('surveys.update', $survey) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">
                                    Título de la Encuesta
                                </label>
                                <input type="text" name="title" id="title"
                                    value="{{ $survey->title }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"
                                    required>
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Descripción
                                </label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]">{{ $survey->description }}</textarea>
                            </div>

                            <div>
                                <label for="expires_at" class="block text-sm font-medium text-gray-700">
                                    Fecha de Expiración (opcional)
                                </label>
                                <input type="datetime-local" name="expires_at" id="expires_at"
                                    value="{{ $survey->expires_at ? date('Y-m-d\TH:i', strtotime($survey->expires_at)) : '' }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]">
                            </div>

                            <div>
                                <label class="inline-flex items-center">
                                    <input type="checkbox" name="is_active"
                                        {{ $survey->is_active ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-[#3674B5] shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]">
                                    <span class="ml-2 text-sm text-gray-700">Encuesta Activa</span>
                                </label>
                            </div>

                            <div class="flex justify-end space-x-3">
                                <a href="{{ route('surveys.show', $survey) }}"
                                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                                    Cancelar
                                </a>
                                <button type="submit"
                                    class="bg-[#3674B5] text-white px-4 py-2 rounded-lg hover:bg-[#578FCA]">
                                    Actualizar Encuesta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Gestionar Preguntas -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-6">Preguntas de la Encuesta</h3>

                    <!-- Formulario para agregar pregunta -->
                    <form action="{{ route('questions.store', $survey) }}" method="POST" class="mb-8">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="question_text" class="block text-sm font-medium text-gray-700">
                                    Nueva Pregunta
                                </label>
                                <input type="text" name="question_text" id="question_text"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"
                                    required>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="type" class="block text-sm font-medium text-gray-700">
                                        Tipo de Pregunta
                                    </label>
                                    <select name="type" id="type"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"
                                        onchange="toggleAnswersSection(this.value)">
                                        <option value="text">Texto</option>
                                        <option value="multiple_choice">Opción Múltiple</option>
                                        <option value="rating">Calificación</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="inline-flex items-center mt-6">
                                        <input type="checkbox" name="is_required"
                                            checked
                                            class="rounded border-gray-300 text-[#3674B5] shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]">
                                        <span class="ml-2 text-sm text-gray-700">Pregunta Requerida</span>
                                    </label>
                                </div>
                            </div>

                            <div id="answers_section" class="hidden space-y-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Opciones de Respuesta
                                </label>
                                <div id="answer_inputs" class="space-y-2">
                                    <div class="flex items-center space-x-2">
                                        <input type="text" name="answers[]"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"
                                            placeholder="Opción 1">
                                        <button type="button" onclick="addAnswerInput()"
                                            class="bg-[#578FCA] text-white px-3 py-2 rounded-lg hover:bg-[#3674B5]">
                                            +
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-[#3674B5] text-white px-4 py-2 rounded-lg hover:bg-[#578FCA]">
                                    Agregar Pregunta
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Lista de preguntas existentes -->
                    <div class="space-y-4">
                        @foreach($survey->questions as $question)
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-gray-900">{{ $question->question_text }}</h4>
                                        <p class="text-sm text-gray-500">
                                            Tipo: {{ ucfirst($question->type) }}
                                            @if($question->is_required)
                                                <span class="text-red-500 ml-2">*Requerida</span>
                                            @endif
                                        </p>
                                        @if($question->type === 'multiple_choice')
                                            <div class="mt-2 pl-4">
                                                @foreach($question->answers as $answer)
                                                    <div class="text-sm text-gray-600">• {{ $answer->answer_text }}</div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <form action="{{ route('questions.destroy', [$survey, $question]) }}"
                                          method="POST"
                                          class="flex items-center space-x-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700"
                                            onclick="return confirm('¿Estás seguro de eliminar esta pregunta?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleAnswersSection(type) {
            const answersSection = document.getElementById('answers_section');
            answersSection.classList.toggle('hidden', type !== 'multiple_choice');
        }

        function addAnswerInput() {
            const container = document.getElementById('answer_inputs');
            const inputCount = container.children.length + 1;

            const div = document.createElement('div');
            div.className = 'flex items-center space-x-2';

            div.innerHTML = `
                <input type="text" name="answers[]"
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"
                    placeholder="Opción ${inputCount}">
                <button type="button" onclick="this.parentElement.remove()"
                    class="bg-red-500 text-white px-3 py-2 rounded-lg hover:bg-red-600">
                    -
                </button>
            `;

            container.appendChild(div);
        }
    </script>
</x-app-layout>
