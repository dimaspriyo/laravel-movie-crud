<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $movie = Movie::all();
        return view('index',['movies' => $movie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'year' => 'required|numeric',
            'remake' => 'required',
            ]);

        $movie = new Movie();
        $movie->name = $request->name;
        $movie->genre = $request->genre;
        $movie->year = $request->year;
        $movie->remake = $request->remake;
        $movie->save();

        return redirect()->route('movies.index')->with('success','Success insert movie');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $movie = \App\Movie::find($id);
        return view('edit',['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'genre' => 'required',
            'year' => 'required|numeric',
            'remake' => 'required',
            ]);

        $movie = \App\Movie::find($id);
        $movie->id = $id;
        $movie->name = $request->name;
        $movie->genre = $request->genre;
        $movie->year = $request->year;
        $movie->remake = $request->remake;
        $movie->save();
        
        return redirect()->route('movies.index')->with('success','Success Update Movie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $movie = \App\Movie::find($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success','Success Delete Movie');
    }
}
