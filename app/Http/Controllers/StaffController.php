<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StaffController extends Controller
{
    public function index()
    {
        $result = DB::select('SELECT * FROM staff');
        return view('staff.index', ['staff' => $result]);
    }
    public function create()
    {
        return view('staff.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => ['required', 'unique:staff'],
            'name' => ['required', 'string'],
            'email' => ['email'],
            'job_title' => []
        ]);
        $sql = "INSERT INTO staff (id, name, job_title, email)"
            . "VALUES (?, ?, ?, ?)";
        $values = [$request->id, $request->name, $request->job_title,
            $request->email];
        DB::insert($sql, $values);

        // TODO: Populate staff_type table based on checkbox inputs
        return redirect()->route('staff.show', ['id' => $request->id]);
    }
    public function show($id)
    {

    }
    public function edit($id)
    {
        $staff = DB::select("SELECT * FROM staff WHERE id = ?", [$id])[0];
        return view('staff.edit', ['staff' => $staff]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id' => ['required'],
            'name' => ['required', 'string'],
            'email' => ['email'],
            'job_title' => []
        ]);

        $sql = "UPDATE staff SET id=?, name=?, job_title=?, email=?"
            . " WHERE id=?";
        $values = [$request->id, $request->name, $request->job_title,
            $request->email, $id];
        DB::update($sql, $values);

        // TODO: Update staff_types database
        return redirect()->route('staff.show', ['id' => $id]);
    }
    public function destroy($id)
    {
        DB::delete("DELETE FROM staff WHERE id = ?", [$id]);
    }
}
