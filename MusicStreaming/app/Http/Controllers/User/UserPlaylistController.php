<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\UserPlaylist;

class UserPlaylistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = UserPlaylist::all();
        return view('user.playlists.playlist', [
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
        return view('user.playlists.create');
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
            'path' => 'required',
            'img' => 'required',
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);

        $PathName = time() . '-' . $request->title . '.' . $request->path->extension();
        $request->path->move(public_path('music'), $PathName);
        $ImgName = time() . '-' . $request->title . '.' . $request->img->extension();
        $request->img->move(public_path('images'), $ImgName);



        $playlist = new UserPlaylist();
        $playlist->title = $request->input('title');
        $playlist->artists = $request->input('artists');
        $playlist->path = $PathName;
        $playlist->img = $ImgName;
        $playlist->created_at = $request->input('created_at');
        $playlist->updated_at = $request->input('updated_at');
        $playlist->save();

        return redirect()->route('user.playlists.playlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $playlist = UserPlaylist::findOrFail($id);

        return view ('user.playlists.details', [


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
        $playlist = UserPlaylist::findOrFail($id);
        return view ('user.playlists.edit', [
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
        $playlist = UserPlaylist::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'path'=>'required',
            'artists'=>'required',
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);

        $playlist->artists = $request->input('artists');
        $playlist->title = $request->input('title');
        $playlist->path = $request->input('path');
        $playlist->images = $request->input('images');
        $playlist->created_at = $request->input('created_at');
        $playlist->updated_at = $request->input('updated_at');
        $playlist->save();

        return redirect()->route('user.playlists.update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $playlist = UserPlaylist::findOrFail($id);
        $playlist->delete();

        return redirect()->route('user.playlists.playlist');
    }


}