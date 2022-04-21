<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Playlist;

class PlaylistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlist::all();
        return view('admin.playlists.playlist', [
            'playlists' => $playlists
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.playlists.create');
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
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);


        $playlist = new Playlist();
        $playlist->title = $request->input('title');
        $playlist->title = $request->input('artist');
        $playlist->title = $request->input('path');
        $playlist->title = $request->input('images');
        $playlist->created_at = $request->input('created_at');
        $playlist->updated_at = $request->input('updated_at');
        $playlist->save();

        return redirect()->route('admin.playlists.playlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist = Playlist::findOrFail($id);

        return view ('admin.playlists.details', [


            'playlist' => $playlist
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
        $playlist = Playlist::findOrFail($id);
        return view ('admin.playlists.edit', [
            'playlist' => $playlist
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
        $playlist = Playlist::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'path'=>'required',
            'artist'=>'required',
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);

        $playlist->artist = $request->input('artist');
        $playlist->title = $request->input('title');
        $playlist->title = $request->input('artist');
        $playlist->created_at = $request->input('created_at');
        $playlist->updated_at = $request->input('updated_at');
        $playlist->save();

        return redirect()->route('admin.playlists.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlist = Playlist::findOrFail($id);
        $playlist->delete();

        return redirect()->route('admin.playlists.destroy');
    }


}
