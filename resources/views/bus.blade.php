<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 notdark:text-gray-200 leading-tight">
            {{ __('Bus') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white notdark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- First Column (70%) -->
                <div class="w-3/5 p-6 text-gray-900 notdark:text-gray-100">
                    <h1>Bus List</h1>

                    @if (isset($buses))

                        <table class="table-auto min-w-full bg-white border border-gray-300">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Bus Name</th>
                                <th class="px-4 py-2">Seat Capacity</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($buses as $bus)

                                <tr>
                                    <td class="border px-4 py-2">{{$bus->id}}</td>
                                    <td class="border px-4 py-2">{{$bus->bus_name}}</td>
                                    <td class="border px-4 py-2">{{$bus->seat_capacity}}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('bus.edit', ['id' => $bus->id]) }}">
                                            @csrf
                                            <button type="submit" name="edit"
                                                    class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </button>
                                        </a>
                                        <form method="post" action="/bus/delete">
                                            @csrf
                                            <input type="number" hidden readonly name="id" value="{{$bus->id}}">
                                            <button type="submit" name="delete"
                                                    onclick="return confirm('Are you sure?')"
                                                    class="bg-red-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
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
                    @if (isset($busInfo))

                        <h1>Edit Bus</h1>
                        <form method="post" action="/edit-bus/{{$busInfo->id}}"
                              class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
                            @csrf
                            <div class="mb-4">
                                <label for="bus_name" class="block text-sm font-semibold text-gray-600">Bus Name</label>
                                <input type="text" name="bus_name" id="bus_name" value="{{$busInfo->bus_name}}"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="seat_capacity" class="block text-sm font-semibold text-gray-600">Seat
                                    Capacity</label>
                                <input type="number" name="seat_capacity" id="seat_capacity" value="{{$busInfo->seat_capacity}}"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <button type="submit"
                                    class="w-full bg-green-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-green">
                                Submit
                            </button>
                        </form>
                    @else
                        <h1>New Bus</h1>
                        <form method="post" action="/new-bus"
                              class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
                            @csrf

                            <div class="mb-4">
                                <label for="bus_name" class="block text-sm font-semibold text-gray-600">Bus Name</label>
                                <input type="text" name="bus_name" id="bus_name"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="seat_capacity" class="block text-sm font-semibold text-gray-600">Seat
                                    Capacity</label>
                                <input type="number" name="seat_capacity" id="seat_capacity"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <button type="submit"
                                    class="w-full bg-green-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline-green">
                                Submit
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
