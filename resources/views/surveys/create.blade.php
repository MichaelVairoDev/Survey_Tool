<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Crear Nueva Encuesta</h2>

                    <form action="{{ route('surveys.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <!-- Título -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">
                                    Título de la Encuesta
                                </label>
                                <input type="text" name="title" id="title"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"
                                    required>
                            </div>

                            <!-- Descripción -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Descripción
                                </label>
                                <textarea name="description" id="description" rows="3"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]"></textarea>
                            </div>

                            <!-- Fecha de Expiración -->
                            <div>
                                <label for="expires_at" class="block text-sm font-medium text-gray-700">
                                    Fecha de Expiración (opcional)
                                </label>
                                <input type="datetime-local" name="expires_at" id="expires_at"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#3674B5] focus:ring-[#3674B5]">
                            </div>

                            <div class="flex items-center justify-end space-x-3">
                                <a href="{{ route('surveys.index') }}"
                                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300">
                                    Cancelar
                                </a>
                                <button type="submit"
                                    class="bg-[#3674B5] text-white px-4 py-2 rounded-lg hover:bg-[#578FCA]">
                                    Crear Encuesta
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
