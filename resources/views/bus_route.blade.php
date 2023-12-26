<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 notdark:text-gray-200 leading-tight">
            {{ __('Routes') }}
        </h2>
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white notdark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- First Column (70%) -->
                <div class="w-3/5 p-6 text-gray-900 notdark:text-gray-100">
                    <h1>Route List</h1>

                    @if (isset($routes))

                        <table class="table-auto min-w-full bg-white border border-gray-300">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Start Point</th>
                                <th class="px-4 py-2">End Point</th>
                                <th class="px-4 py-2">Stoppages</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($routes as $route)

                                <tr>
                                    <td class="border px-4 py-2">{{$route->id}}</td>
                                    <td class="border px-4 py-2">{{$route['startPoint']['location_name']}}</td>
                                    <td class="border px-4 py-2">{{$route['endPoint']['location_name']}}</td>
                                    <td class="border px-4 py-2">
                                        {{--                                        {{$route['stoppages']}}--}}
                                        @foreach($route['stoppages'] as $stoppage)
                                            {{$stoppage['location']->location_name}} <br>
                                        @endforeach
                                    </td>

                                    <td class="border px-4 py-2">
{{--                                        <a href="{{ route('staff.edit', ['id' => $route->id]) }}">--}}
{{--                                            @csrf--}}
{{--                                            <button type="submit" name="edit"--}}
{{--                                                    class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                                                Edit--}}
{{--                                            </button>--}}
{{--                                        </a>--}}
                                        {{--                                        <form method="post" action="/staff/delete">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            <input type="number" hidden readonly name="id" value="{{$staff->id}}">--}}
                                        {{--                                            <button type="submit" name="delete"--}}
                                        {{--                                                    onclick="return confirm('Are you sure?')"--}}
                                        {{--                                                    class="bg-red-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">--}}
                                        {{--                                                Delete--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </form>--}}
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>

                    @else
                        No Data Found!!
                    @endif

                </div>

                <!-- Second Column (30%) -->
                <div class="w-2/5 p-6 text-gray-900 notdark:text-gray-100">
                    @if (isset($staffInfo))

                        <h1>Edit Route</h1>
                        <form method="post" action="/edit-staff/{{$staffInfo->id}}"
                              class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
                            @csrf

                            <div class="mb-4">
                                <label for="staff_name" class="block text-sm font-semibold text-gray-600">Route
                                    Name</label>
                                <input type="text" name="staff_name" id="staff_name" value="{{$staffInfo->staff_name}}"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="contact_number" class="block text-sm font-semibold text-gray-600">Contact
                                    Number</label>
                                <input type="number" name="contact_number" id="contact_number"
                                       value="{{$staffInfo->contact_number}}"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="address" class="block text-sm font-semibold text-gray-600">Address</label>
                                <input type="text" name="address" id="address" value="{{$staffInfo->address}}"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="nid" class="block text-sm font-semibold text-gray-600">NID</label>
                                <input type="number" name="nid" id="nid" value="{{$staffInfo->nid}}"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <button type="submit"
                                    class="w-full bg-green-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-green">
                                Submit
                            </button>
                        </form>
                    @else
                        <h1>New Route</h1>
                        <form method="post" action="/new-route"
                              class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
                            @csrf


                            <div class="w-full mb-4 md:mb-0">
                                <label>Start Point</label>
                                <select id="fromLocation" name="start_point"
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                    <option value="" disabled selected>Select From Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{$location->id}}">{{$location->location_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-full mb-4 md:mb-0">
                                <label>End Point</label>
                                <select id="toLocation" name="end_point"
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                    <option value="" disabled selected>Select To Location</option>
                                </select>
                            </div>

                            <div class="w-full mb-4 md:mb-0">
                                <label>Stoppages</label>
                                <select id="stoppages" name="stoppages[]" multiple
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                    <option value="" disabled selected>Select Stoppages</option>
                                </select>
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


    <script>
        $(document).ready(function () {
            // Event listener for "fromLocation" dropdown
            $('#fromLocation').change(function () {
                // Clear the "toLocation" dropdown
                $('#toLocation').empty().append('<option value="" disabled selected>Select To Location</option>');

                // Filter out selected options from "start_point"
                var selectedStartPoint = $(this).val();
                var locations = {!! json_encode($locations) !!};

                $.each(locations, function (index, location) {
                    if (location.id != selectedStartPoint) {
                        $('#toLocation').append('<option value="' + location.id + '">' + location.location_name + '</option>');
                    }
                });

                // Trigger change event on "toLocation" dropdown
                $('#toLocation').trigger('change');
            });

            // Event listener for "toLocation" dropdown
            $('#toLocation').change(function () {
                // Clear the "stoppages" dropdown
                $('#stoppages').empty().append('<option value="" disabled selected>Select Stoppages</option>');

                // Filter out selected options from "start_point" and "end_point"
                var selectedStartPoint = $('#fromLocation').val();
                var selectedEndPoint = $(this).val();
                var locations = {!! json_encode($locations) !!};

                $.each(locations, function (index, location) {
                    if (location.id != selectedStartPoint && location.id != selectedEndPoint) {
                        $('#stoppages').append('<option value="' + location.id + '">' + location.location_name + '</option>');
                    }
                });
            });
        });
    </script>

</x-app-layout>
