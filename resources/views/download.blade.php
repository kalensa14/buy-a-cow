<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Download') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="initDownloader()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-button
                        @click="downloadFile('{{ route('download-file.show') }}')"
                        x-html="inProgress ? `<i class='uil uil-loding uil-sign-in-alt'></i> Downloading ...` : '{{ __('Download me') }}'"
                        x-bind:disabled="inProgress"
                    >{{ __('Download me') }}</x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
