@extends('layouts.user_nav')

@section('content')
    <div class="main">
        <!-- top section -->
        <div class="top_section">
            <h5><i class="fa fa-headphones" aria-hidden="true"></i>&nbsp;&nbsp;Playlist</h5>

        </div>

        <div class="tracks ">


            <!-- list of song will add here from 'song_list.js' file -->
            @foreach ($songs as $song)
                <table id="table-posts" class="table table-hover">
                    <tbody>
                        <form style="display: inline-block" method="POST" action="{{route('user.songs.destroy', $song->id)}}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="form-control btn btn-danger">Delete</button>
                        </form>
                        <a href="{{route('user.songs.show', $song->id)}}" class="btn btn-primary">View</a>
                        <a href="{{route('user.songs.edit', $song->id)}}">Edit</a>

                        <tr data-id="$song->id">
                            <div class="song">
                                <div class="img">
                                    <img src="{{ asset('images/' . $song->id) }}.jpg" alt="">
                                </div>
                                <div class="more">
                                    <audio src="{{ asset('music/' . $song->id) }}.mp3"></audio>
                                    <div class="song_info">
                                        <p id="title">{{ $song->title }}</p>
                                        <p>{{ $song->title }}</p>
                                    </div>
                                    <div class="flex">
                                        <button id="play_btn"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    </tbody>
                </table>
            @endforeach

            <!-- small music player -->


            <div class="small_music_player">
                <div class="d-flex">
                    <div class="s_player_img">
                        <div class="playing_img">
                            <img src="{{ asset('images/' . $song->id) }}.jpg" alt="">
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



                <div class="mb-5" id="up_player">
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
                    <img src="{{ asset('images/' . $song->id) }}.jpg" alt="">
                </div>

                <div class="song_description">
                    <h3 id="current_track_name"></h3>
                    <p id="current_singer_name"></p>
                </div>

                <div class="controlls">
                    <div class="progress_part">
                        <input type="range" min="0" max="100" value="1" id="slider1"
                            onchange="return change_duration1('test')">
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
@endsection

<script type="text/javascript" src="{{ URL::asset('js/playlist.js') }}"></script>
<script>
    window.addEventListener('load', (event) => {
        console.log('page is fully loaded');
    });
</script>
