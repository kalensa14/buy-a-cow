<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistic') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="initStatistic()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200"
                     x-init="makeTable('statistic-table', 'statistic-filter', '{{ route('statistic.data') }}')"
                >

                    <h4 class="font-semibold text-xl text-gray-800 leading-tight">Filter parameters</h4>

                    <div id="statistic-filter" class="py-4">
                        <x-input type="text" name="date" id="filter-date" placeholder="Date" />
                        <x-input type="text" name="user" id="filter-user" placeholder="Username" />
                        <select name="action" id="filter-action" class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="">- select option -</option>
                            <option value="login">Login</option>
                            <option value="logout">Logout</option>
                            <option value="register">Registration</option>
                            <option value="view-page">View page</option>
                            <option value="button-click">Button click</option>
                        </select>
                    </div>

                    <div id="statistic-table"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
