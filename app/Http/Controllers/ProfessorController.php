<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professors = Professor::all();

        return view('reyting.dashboard.professor.index', compact('professors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reyting.dashboard.professor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            "fish" => "string",
            "image" => "string",
            "status" => "boolean",
            "custom_ball" => "float",
            "small_info" => "text"
        ]);

        Professor::create($validated);

        return back()->with('message', 'item stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        return view('reyting.dashboard.professor.show', compact('professor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Professor $professor)
    {
        $validated = $this->validate($request, [
            "fish" => "string",
            "image" => "string",
            "status" => "boolean",
            "custom_ball" => "float",
            "small_info" => "text"
        ]);

        $professor->update($validated);

        return back()->with('message', 'item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professor $professor)
    {
        $professor->delete();

        return back()->with('message', 'item deleted successfully');
    }
}
