@extends('layouts.admin_nav')

@section('content')
<div class="main">
    <!-- top section -->
    <div class="top_section">
        <h5><i class="fa fa-headphones" aria-hidden="true"></i>&nbsp;&nbsp;Playlist</h5>

    </div>

    <div class="tracks ">


        <!-- list of song will add here from 'song_list.js' file -->
        <table id="table-posts" class="table table-hover">
            <tbody>
                @foreach ($playlists as $playlist)

            <tr data-id="$playlist->id">
                <a href="{{route('admin.playlists.details', $playlist->id)}}">
                <div class="song mb-3">
                    <div class="img">
                        <img src="{{ asset('images/' . $playlist->id) }}.jpg" alt="">
                    </div>
                    <div class="more">
                        <audio src="{{ asset('music/' . $playlist->id) }}.mp3"></audio>
                    <div class="song_info">
                       <p id="title">{{ $playlist->title }}</p>
                       <p>{{ $playlist->artists }}</p>
                    </div>

                    <div class="flex">
                    <div class="d-flex align-items-center mr-2">
                        <a href="{{route('admin.playlists.edit', $playlist->id)}}" class="btn btn-primary mx-4">Edit</a>
                        <form style="display: inline-block" method="POST" action="{{route('admin.playlists.destroy', $playlist->id)}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-control btn btn-danger">Remove</button>
                        </form>
                    </div>
                    <div>
                        <button id="play_btn"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                    </div>
                </div>



                    </div>

                </div>
            </a>




                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- small music player -->


        <div class="small_music_player">
            <div class="d-flex">
                <div class="s_player_img">
                    <div class="playing_img">
                        <img src="{{ asset('images/'.$playlist->id) }}.jpg" alt="">
                        {{-- http://localhost:8000/images/1.jpg --}}
                    </div>

                    <!-- wave animation part -->
                    <div class="wave_animation">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </div>
                </div>

                <div class="song_detail">
                    <p id="song_name"></p>
                    <p id="artist_name"></p>
                </div>

            </div>


            <div class="controlls_btns_small">
                <button id="backward_btn2"><i class="fa fa-step-backward" aria-hidden="true"></i></button>
                <button id="play_pause_btn2"><i class="fa fa-play" aria-hidden="true"></i></button>
                <button id="forward_btn2"><i class="fa fa-step-forward" aria-hidden="true"></i></button>
            </div>

            <div class="controlls_small">
                <div class="progress_part_small">
                    <input type="range" min="0" max="100" value="1" id="slider2" onchange="change_duration2()">
                    <div class="durations">
                        <p id="current_duration2">0:00</p>
                        <p id="total_duration2">0:00</p>
                    </div>
                </div>

            </div>



            <div class="mb-5">
                <i class="fa fa-chevron-up" aria-hidden="true" id="up_player"></i>
            </div>

        </div>


        <!--  popup music player part -->
        <div class="popup_music_player">
            <div class="top">
                <p>Now Playing</p>
                <i class="fa fa-chevron-down" aria-hidden="true" id="down_player"></i>
            </div>

            <div class="song_img">
                <img src="{{ asset('images/' . $playlist->id) }}.jpg" alt="">
            </div>

            <div class="song_description">
                <h3 id="current_track_name"></h3>
                <p id="current_singer_name"></p>
            </div>

            <div class="controlls">
                <div class="progress_part">
                    <input type="range" min="0" max="100" value="1" id="slider1" onchange="return change_duration1('test')">
                    <div class="durations">
                        <p id="current_duration1">0:00</p>
                        <p id="total_duration1">0:00</p>
                    </div>

                </div>

                <!-- controlls btn's -->
                <div class="controlls_btns">
                    <button id="backward_btn1"><i class="fa fa-step-backward" aria-hidden="true"></i></button>
                    <button id="play_pause_btn1"><i class="fa fa-play" aria-hidden="true"></i></button>
                    <button id="forward_btn1"><i class="fa fa-step-forward" aria-hidden="true"></i></button>
                </div>


            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src="{{ URL::asset('js/music_player.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/playlist.js') }}"></script>
@endsection
