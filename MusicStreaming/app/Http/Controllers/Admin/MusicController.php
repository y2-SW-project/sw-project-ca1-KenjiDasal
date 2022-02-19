<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Music;

class MusicController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::all();
        return view('admin.musics.index', [
            'musics' => $musics
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.musics.create');
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
            'description' =>'required|max:500',
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);


        $music = new Music();
        $music->artist = $request->input('artist');
        $music->title = $request->input('title');
        $music->likes = $request->input('likes');
        $music->description = $request->input('description');
        $music->img = $request->input('img');
        $music->created_at = $request->input('created_at');
        $music->updated_at = $request->input('updated_at');
        $music->save();

        return redirect()->route('admin.musics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $music = Music::findOrFail($id);

        return view ('admin.musics.show', [


            'music' => $music
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
        $music = Music::findOrFail($id);
        return view ('admin.musics.edit', [
            'music' => $music
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
        $music = Music::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' =>'required|max:500',
            'created_at' => 'required|date',
            'updated_at' => 'required|date'
        ]);

        $music->artist = $request->input('artist');
        $music->title = $request->input('title');
        $music->likes = $request->input('likes');
        $music->description = $request->input('description');
        $music->img = $request->input('img');
        $music->created_at = $request->input('created_at');
        $music->updated_at = $request->input('updated_at');
        $music->save();

        return redirect()->route('admin.musics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        $music->delete();

        return redirect()->route('admin.musics.index');
    }
}