<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-2xl font-semibold text-gray-800">Mis Encuestas</h3>
                        <a href="{{ route('surveys.create') }}"
                           class="bg-[#3674B5] text-white px-4 py-2 rounded-lg hover:bg-[#578FCA]">
                            Crear Nueva Encuesta
                        </a>
                    </div>

                    @php
                        $surveys = auth()->user()->surveys()->latest()->get();
                    @endphp

                    @if($surveys->isNotEmpty())
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($surveys as $survey)
                                <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                    <div class="p-5">
                                        <h4 class="text-xl font-semibold text-gray-800 mb-2">{{ $survey->title }}</h4>
                                        <p class="text-gray-600 mb-4">{{ Str::limit($survey->description, 100) }}</p>

                                        <div class="flex flex-wrap gap-2 mb-4">
                                            <span class="px-2 py-1 bg-{{ $survey->is_active ? 'green' : 'red' }}-100 text-{{ $survey->is_active ? 'green' : 'red' }}-800 rounded-full text-sm">
                                                {{ $survey->is_active ? 'Activa' : 'Inactiva' }}
                                            </span>
                                            @if($survey->expires_at)
                                                <span class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                                                    Expira: {{ $survey->expires_at->format('d/m/Y') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <span class="text-sm text-gray-500">
                                                {{ $survey->responses()->distinct('user_id')->count() }} respuestas
                                            </span>
                                            <div class="space-x-2">
                                                <a href="{{ route('surveys.show', $survey) }}"
                                                   class="text-[#3674B5] hover:text-[#578FCA]">
                                                    Ver
                                                </a>
                                                <a href="{{ route('surveys.results', $survey) }}"
                                                   class="text-[#3674B5] hover:text-[#578FCA]">
                                                    Resultados
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <p class="text-gray-500 mb-4">Aún no has creado ninguna encuesta</p>
                            <a href="{{ route('surveys.create') }}"
                               class="inline-block bg-[#3674B5] text-white px-6 py-2 rounded-lg hover:bg-[#578FCA]">
                                Crear tu primera encuesta
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
