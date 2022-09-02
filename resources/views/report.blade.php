<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="initCharts()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     x-init="await userActivityChart('chart', '{{ route('reports-chart.get') }}')"
                >
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Chart</h3>

                    <canvas height="100" id="chart"></canvas>
                </div>
            </div>
        </div>
    </div>



    <div class="py-1" x-data="initTables()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     x-init="reports('#report-table', '{{ route('reports-chart.get') }}')"
                >
                    <h3 class="font-semibold text-xl text-gray-800 leading-tight">Data</h3>

                    <div id="report-table"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
