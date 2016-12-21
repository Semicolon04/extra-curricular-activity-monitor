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
        DB::beginTransaction();
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


        $sql2 = "INSERT INTO users (id, password,type)"
            . "VALUES (?, ?, ?)";

        $values2 = [$request->id , 'qwerty','staff'];
        DB::insert($sql2,$values2);

        // TODO: Populate staff_type table based on checkbox inputs
        if ($request->has('club')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
                [$request->id, 1]);
        }
        if ($request->has('competition')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
            [$request->id, 2]);
        }
        if ($request->has('sport')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
            [$request->id, 3]);
        }
        if ($request->has('other')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
            [$request->id, 4]);
        }
        DB::commit();
        return redirect()->route('staff.show', ['id' => $request->id]);
    }
    public function show($id)
    {
        $staff = DB::select("SELECT * FROM staff WHERE id = ?", [$id])[0];
        return view('staff.show', ['staff' => $staff]);
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

        DB::beginTransaction();
        $sql = "UPDATE staff SET id=?, name=?, job_title=?, email=?"
            . " WHERE id=?";
        $values = [$request->id, $request->name, $request->job_title,
            $request->email, $id];
        DB::update($sql, $values);

        // TODO: Update staff_types database
        DB::delete("DELETE FROM staff_type WHERE staff_id = ?", [$request->id]);
        if ($request->has('club')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
                [$request->id, 1]);
        }
        if ($request->has('competition')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
            [$request->id, 2]);
        }
        if ($request->has('sport')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
            [$request->id, 3]);
        }
        if ($request->has('other')) {
            DB::insert("INSERT into staff_type (staff_id, type_id) VALUES (?, ?)",
            [$request->id, 4]);
        }
        DB::commit();
        return redirect()->route('staff.show', ['id' => $id]);
    }
    public function destroy($id)
    {
        DB::delete("DELETE FROM staff WHERE id = ?", [$id]);
    }
}
