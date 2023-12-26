<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    function index()
    {
        $staffList = Staff::get();
        return view('staff', compact('staffList'));
    }

    function insertStaff(Request $request)
    {
        $validateData = $request->validate([
            'staff_name' => 'required|string',
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'nid' => 'required|string'
        ]);

        $data = [
            "staff_name" => $request->post('staff_name'),
            "address" => $request->post('address'),
            "contact_number" => $request->post('contact_number'),
            "nid" => $request->post('nid')
        ];

        Staff::insert($data);

        return redirect()->back();
    }

    function editUI($id)
    {
        $staffList = Staff::get(); //all the bus list
        $staffInfo = Staff::find($id);

        return view('staff', compact('staffList', 'staffInfo'));
    }

    function editStaff(Request $request, $id)
    {
        $validateData = $request->validate([
            'staff_name' => 'required|string',
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'nid' => 'required|string'
        ]);

        $record = Staff::find($id);
        $record->staff_name = $request->post('staff_name');
        $record->address = $request->post('address');
        $record->contact_number = $request->post('contact_number');
        $record->nid = $request->post('nid');

        $record->save();

        return $this->index();
    }
}
