<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 notdark:text-gray-200 leading-tight">
            {{ __('Routes') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white notdark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- First Column (70%) -->
                <div class="w-3/5 p-6 text-gray-900 notdark:text-gray-100">
                    <h1>Trip List</h1>

                    @if (isset($trips))

                        <table class="table-auto min-w-full bg-white border border-gray-300">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">From</th>
                                <th class="px-4 py-2">To</th>
                                <th class="px-4 py-2">Time</th>
                                <th class="px-4 py-2">Total Seats</th>
                                <th class="px-4 py-2">Bus</th>
                                <th class="px-4 py-2">Driver</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trips as $trip)

                                <tr>
                                    <td class="border px-4 py-2">{{$trip['triproute']['startPoint']['location_name']}}</td>
                                    <td class="border px-4 py-2">{{$trip['triproute']['endPoint']['location_name']}}</td>
                                    <td class="border px-4 py-2">{{date_format(date_create($trip->leave_time), "d-m-Y h:i:s A")}}</td>
                                    <td class="border px-4 py-2">{{$trip['bus']->seat_capacity}}</td>
                                    <td class="border px-4 py-2">{{$trip['bus']->bus_name}}</td>
                                    <td class="border px-4 py-2">{{$trip['busdriver']->staff_name}}</td>
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

                <!-- Second Column (30%) -->
                <div class="w-2/5 p-6 text-gray-900 notdark:text-gray-100">
                    @if (isset($staffInfo))

                        <h1>Edit Trip</h1>

                    @else
                        <h1>New Trip</h1>
                        <form method="post" action="/new-trip"
                              class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
                            @csrf


                            <div class="w-full mb-4 md:mb-0">
                                <label>Route</label>
                                <select id="route_id" name="route_id"
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                    <option value="">Select Route</option>
                                    @foreach($routes as $route)
                                        <option value="{{$route->id}}">{{$route['startPoint']['location_name']}}
                                            - {{$route['endPoint']['location_name']}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="w-full mb-4 md:mb-0">
                                <label>Bus</label>
                                <select id="bus_id" name="bus_id"
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                    <option value="">Select Bus</option>
                                    @foreach($bus as $busItem)
                                        <option value="{{$busItem->id}}">{{$busItem['bus_name']}}
                                            - {{$busItem['seat_capacity']}} Seats</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="w-full mb-4 md:mb-0">
                                <label>Driver</label>
                                <select id="driver_id" name="driver_id"
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                    <option value="">Select Bus</option>
                                    @foreach($staff as $staffItem)
                                        <option value="{{$staffItem->id}}">{{$staffItem['staff_name']}}
                                            </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="w-full mb-4 md:mb-0">
                                <label>Leave Time</label>
                                <input type="datetime-local" name="leave_time">

                            </div>

                            <button type="submit"
                                    class="w-full bg-green-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-green">
                                Next
                            </button>
                        </form>
                    @endif


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
