<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 notdark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white notdark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 notdark:text-gray-100">


                    Search For Trips

                    <form action="/search-trip" method="post" class="flex flex-wrap items-center">
                        @csrf
                        <div class="w-full md:w-1/3 lg:w-1/4 mb-4 md:mb-0">
                            <select id="fromLocation" name="fromLocation"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="" disabled selected>Select From Location</option>
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->location_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/4 mb-4 md:mb-0">
                            <select id="toLocation" name="toLocation"
                                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                <option value="" disabled selected>Select To Location</option>
                                @foreach($locations as $location)
                                    <option value="{{$location->id}}">{{$location->location_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/4 mb-4 md:mb-0">
                            <input type="date" id="date" name="date"
                                   class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                        </div>

                        <div class="w-full md:w-1/3 lg:w-1/4 mb-4 md:mb-0">
                            <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                Search
                            </button>
                        </div>

                    </form>
                </div>

                @if (isset($trips))

                    <table class="table-auto min-w-full bg-white border border-gray-300">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">From</th>
                            <th class="px-4 py-2">To</th>
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Total Seats</th>
                            <th class="px-4 py-2">Available Seats</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trips as $trip)

                            <tr>
                                <td class="border px-4 py-2">{{$trip['triproute']['location_name']}}</td>
                                <td class="border px-4 py-2">{{$trip}}</td>
                                <td class="border px-4 py-2">{{$trip->leave_time}}</td>
                                <td class="border px-4 py-2">{{$trip['bus']->seat_capacity}}</td>
                                <td class="border px-4 py-2">{{$trip->leave_time}}</td>
                                <td class="border px-4 py-2">
                                    <a href="/book-ticket/{{$trip->id}}">
                                        <button
                                            class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                            Book
                                        </button>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                @endif
            </div>
        </div>
    </div>


</x-app-layout>
