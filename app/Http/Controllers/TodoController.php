<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $todos = Todo::orderBy('created_at', 'desc')->get();
        return view('todo/index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255|min:1',
        ]);
        $todo = Todo::create([
            'title' => trim($request->title),
        ]);
        return response()->json(['success' => true, 'todo' => $todo]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'title' => 'required|string|max:255|min:1',
        ]);
        $todo = Todo::findOrFail(($id));
        $todo->update([
            'title' => trim($request->title),
        ]);
        return response()->json(['success' => true, 'todo' => $todo, 'message' => 'Tugas Berhasil Di Update']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return response()->json(['success'=> true, 'message' => 'Tugas berhasil di hapus']);
    }
}
