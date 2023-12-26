<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 notdark:text-gray-200 leading-tight">
            {{ __('Staff') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex bg-white notdark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <!-- First Column (70%) -->
                <div class="w-3/5 p-6 text-gray-900 notdark:text-gray-100">
                    <h1>Staff List</h1>

                    @if (isset($staffList))

                        <table class="table-auto min-w-full bg-white border border-gray-300">
                            <thead>
                            <tr>
                                <th class="px-4 py-2">ID</th>
                                <th class="px-4 py-2">Staff Name</th>
                                <th class="px-4 py-2">Contact Number</th>
                                <th class="px-4 py-2">Address</th>
                                <th class="px-4 py-2">NID</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($staffList as $staff)

                                <tr>
                                    <td class="border px-4 py-2">{{$staff->id}}</td>
                                    <td class="border px-4 py-2">{{$staff->staff_name}}</td>
                                    <td class="border px-4 py-2">{{$staff->contact_number}}</td>
                                    <td class="border px-4 py-2">{{$staff->address}}</td>
                                    <td class="border px-4 py-2">{{$staff->nid}}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('staff.edit', ['id' => $staff->id]) }}">
                                            @csrf
                                            <button type="submit" name="edit"
                                                    class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                Edit
                                            </button>
                                        </a>
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

                        <h1>Edit Staff</h1>
                        <form method="post" action="/edit-staff/{{$staffInfo->id}}"
                              class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
                            @csrf

                            <div class="mb-4">
                                <label for="staff_name" class="block text-sm font-semibold text-gray-600">Staff Name</label>
                                <input type="text" name="staff_name" id="staff_name" value="{{$staffInfo->staff_name}}"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="contact_number" class="block text-sm font-semibold text-gray-600">Contact Number</label>
                                <input type="number" name="contact_number" id="contact_number" value="{{$staffInfo->contact_number}}"
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
                        <h1>New Staff</h1>
                        <form method="post" action="/new-staff"
                              class="max-w-md mx-auto p-6 bg-white rounded-md shadow-md">
                            @csrf

                            <div class="mb-4">
                                <label for="staff_name" class="block text-sm font-semibold text-gray-600">Staff Name</label>
                                <input type="text" name="staff_name" id="staff_name"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="contact_number" class="block text-sm font-semibold text-gray-600">Contact Number</label>
                                <input type="number" name="contact_number" id="contact_number"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="address" class="block text-sm font-semibold text-gray-600">Address</label>
                                <input type="text" name="address" id="address"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                            </div>

                            <div class="mb-4">
                                <label for="nid" class="block text-sm font-semibold text-gray-600">NID</label>
                                <input type="number" name="nid" id="nid"
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
