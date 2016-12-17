<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index()
    {
        $result = DB::select('SELECT * FROM staff');
        return view('staff.index', ['staff' => $result])
    }
    public function create()
    {
        return view('staff.create');
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $staff = DB::select("SELECT * FROM staff WHERE id = ?", [$id])[0];
        return view('staff.edit', ['staff' => $staff]);
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        DB::delete("DELETE FROM staff WHERE id = ?", [$id]);
    }
}
