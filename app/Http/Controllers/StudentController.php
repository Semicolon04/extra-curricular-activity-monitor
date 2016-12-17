<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $sql = "INSERT INTO students (id, name, batch, sex, email, address)"
            . "VALUES (?, ?, ?, ?, ?, ?)";
        $values = [$request->id, $request->name, $request->batch,
            $request->sex, $request->email, $request->address];
        DB::insert($sql, $values);
        return redirect()->route('students.show', ['id' => $request->id]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        DB::delete("DELETE FROM students WHERE id = ?", [$id]);
    }
}
