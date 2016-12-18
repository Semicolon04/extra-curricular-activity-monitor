<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $sql = "SELECT * FROM students "
            . "JOIN SUM(points) FROM activities GROUP BY student_id "
            . "ON students.id = activities.student_id";
        $sql = "SELECT * FROM students"; // Use this until activity table is ready
        $result = DB::select($sql);
        return view('students.index', ['students' => $result]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => ['required', 'unique:students', 'size:7'],
            'name' => ['required', 'string'],
            'batch' => ['required', 'size:4'],
            'sex' => [],
            'email' => ['email'],
            'address' => []
        ]);
        $sql = "INSERT INTO students (id, name, batch, sex, email, address)"
            . "VALUES (?, ?, ?, ?, ?, ?)";
        $values = [$request->id, $request->name, $request->batch,
            $request->sex, $request->email, $request->address];
        DB::insert($sql, $values);
        return redirect()->route('students.show', ['id' => $request->id]);
    }

    public function show($id)
    {
        $user = DB::select('SELECT * FROM students WHERE id = ?', [$id])[0];
        return View('students.show',['user'=>$user]);
    }

    public function edit($id)
    {
        $student = DB::select("SELECT * FROM students WHERE id = ?", [$id])[0];
        return view('students.edit', ['student' => $student]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id' => ['required', 'size:7'],
            'name' => ['required', 'string'],
            'batch' => ['required', 'size:4'],
            'sex' => [],
            'email' => ['email'],
            'address' => []
        ]);

        $sql = "UPDATE students SET id=?, name=?, batch=?, sex=?, email=?, address=?"
            . " WHERE id=?";
        $values = [$request->id, $request->name, $request->batch,
            $request->sex, $request->email, $request->address, $id];
        DB::update($sql, $values);
        return redirect()->route('students.show', ['id' => $id]);
    }
    public function destroy($id)
    {
        DB::delete("DELETE FROM students WHERE id = ?", [$id]);
    }
}
