<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Song;

class SongController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return view('admin.songs.index', [
            'songs' => $songs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.songs.create');
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
            'artists' => 'required',
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);


        $song = new Song();
        $song->title = $request->input('title');
        $song->artists = $request->input('artists');
        $song->path = $request->input('path');
        if($request->hasfile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('images/', $filename);
            $song -> img = $filename;
        }
        $song->created_at = $request->input('created_at');
        $song->updated_at = $request->input('updated_at');
        $song->save();

        return redirect()->route('admin.songs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $song = Song::findOrFail($id);

        return view ('admin.songs.details', [


            'song' => $song
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        return view ('admin.songs.edit', [
            'song' => $song
        ]);
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
        $song = Song::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'path'=>'required',
            'artists'=>'required',
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);

        $song->artists = $request->input('artists');
        $song->title = $request->input('title');
        $song->path = $request->input('path');
        $song->img = $request->input('img');
        $song->created_at = $request->input('created_at');
        $song->updated_at = $request->input('updated_at');
        $song->save();

        return redirect()->route('admin.songs.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::findOrFail($id);
        $song->delete();

        return redirect()->route('admin.songs.index');
    }


}