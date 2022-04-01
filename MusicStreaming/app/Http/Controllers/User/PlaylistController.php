<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PlaylistController extends Controller
{
   /**
     *
     *
     * @return void
    */
    public function _contruct(){
        $this->middleware('auth');
        $this->middleware('role:user');
    }

    /**
    *@return \Illuminate\Contracts\Suppport\Renderable
    */
     public function index(){
    //     $user = Auth::user();

    //     $user->authorizedRoles('admin');

        return view('user.music.playlist');
    }

}