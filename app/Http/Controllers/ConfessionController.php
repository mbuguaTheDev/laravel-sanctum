<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Confession;

class ConfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Confession::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        return Confession::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Confession::find($id);
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
        $confession = Confession::find($id);
        $confession->update($request->all());
        return $confession;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Confession::destroy($id);
    }

    /**
     * Search for a confession title.
     *
     * @param  str $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Confession::where('title', 'like', '%'.$title.'%')->get();
    }
}