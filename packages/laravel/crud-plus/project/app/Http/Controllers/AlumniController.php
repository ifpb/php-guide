<?php

namespace App\Http\Controllers;

use App\Alumnus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search ?? '';
        $per_page = $request->per_page ?? 5;
        $alumni = Alumnus::sortable()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->paginate($per_page);
        if (count($alumni) === 0) {
            $request->flash('success', 'No Details found. Try to search again!');
        }
        return view('alumni.index', compact('alumni', 'search', 'per_page'));
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'linkedin' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        } else {
            Alumnus::create($request->all());
            return redirect(route('alumni.index'))->with('success', 'Alumnus is successfully saved');
        }
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
