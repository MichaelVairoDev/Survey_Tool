<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Encuestas Disponibles</h2>
                @auth
                <a href="{{ route('surveys.create') }}" class="bg-[#3674B5] text-white px-4 py-2 rounded-lg hover:bg-[#578FCA]">
                    Crear Nueva Encuesta
                </a>
                @endauth
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($surveys as $survey)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $survey->title }}</h3>
                            <p class="text-gray-600 mb-4">{{ Str::limit($survey->description, 100) }}</p>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-500">
                                    {{ $survey->questions_count ?? 0 }} preguntas
                                </span>
                                <a href="{{ route('surveys.show', $survey) }}"
                                   class="bg-[#A1E3F9] text-gray-700 px-4 py-2 rounded-lg hover:bg-[#D1F8EF]">
                                    Ver Encuesta
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-gray-500">No hay encuestas disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $surveys->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
