<?php

namespace App\Http\Controllers;

use App\Alumnus;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumni = Alumnus::all();
        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'linkedin' => 'required|url',
        ]);
        // dd($validatedData);
        Alumnus::create($validatedData);

        return redirect(route('alumni.index'))->with('success', 'Alumnus is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumnus  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function show(Alumnus $alumnus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumnus  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumnus $alumnus)
    {
        $alumnus = Alumnus::findOrFail($alumnus->id);
        return view('alumni.edit', compact('alumnus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumnus  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumnus $alumnus)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'linkedin' => 'required|url',
        ]);
        Alumnus::whereId($alumnus->id)->update($validatedData);

        return redirect(route('alumni.index'))->with('success', 'Alumnus is successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumnus  $alumnus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumnus $alumnus)
    {
        $alumnus = Alumnus::findOrFail($alumnus->id);
        $alumnus->delete();

        return redirect(route('alumni.index'))->with('success', 'Alumnus is successfully deleted');
    }
}
