const btn = document.querySelectorAll('.song #play_btn');
const song = document.querySelectorAll('#music');

/*popup music player part*/
const p_m_player = document.querySelector('.popup_music_player');
const down_player = document.querySelector('#down_player');
const current_track_name = document.querySelector('#current_track_name');
const current_singer_name = document.querySelector('#current_singer_name');
const song_img = document.querySelector('.song_img');

/*controlls part*/
const play_pause_btn1 = document.querySelector('#play_pause_btn1');
const forward_btn1 = document.querySelector('#forward_btn1');
const backward_btn1 = document.querySelector('#backward_btn1');

const play_pause_btn2 = document.querySelector('#play_pause_btn2');
const forward_btn2 = document.querySelector('#forward_btn2');
const backward_btn2 = document.querySelector('#backward_btn2');

let slider1 = document.querySelector('#slider1');
let slider2 = document.querySelector('#slider2');


/*songs duration*/
let current_duration1 = document.querySelector('.controlls .progress_part #current_duration1');
let total_duration1 = document.querySelector('.controlls .progress_part #total_duration1');

let current_duration2 = document.querySelector('.controlls_small .progress_part_small #current_duration2');
let total_duration2 = document.querySelector('.controlls_small .progress_part_small #total_duration2');

/*small music player part*/
let s_m_player = document.querySelector('.small_music_player');
let playing_img = document.querySelector('.playing_img');
let wave_animation = document.querySelector('.wave_animation');
let up_player = document.querySelector('#up_player');
let song_name = document.querySelector('#song_name');
let artist_name = document.querySelector('#artist_name');


/*default values*/
let is_song_played = false;
let song_status = false;
let index_no = 0;

console.log(index_no);




btn.forEach((btn, index) => {
    btn.addEventListener('click', function() {
        console.log("playing")
        s_m_player.style.transform = 'translateY(0px)';

        if (index != index_no) {
            song_status = false;
        }

        index_no = index;
        song[index].currentTime = 0;

        if (song_status == false) {
            play_song();
        } else {
            pause_song();
        }

    });
});


/*pause song*/
function pause_song() {
    song[index_no].pause();
    song_status = false;
    clearInterval(update_second);
    wave_animation.style.opacity = '0';
    play_pause_btn1.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
    play_pause_btn2.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
}


/*This function will update every 1s*/
function update_second() {


    // update slider position
    if (!isNaN(song[index_no].duration)) {

        position = song[index_no].currentTime * (100 / song[index_no].duration);

        slider1.value = position
        slider2.value = position

        console.log(slider1.value, slider2.value, position, song[index_no].duration, "current time",
            song[index_no].currentTime)
    }

    let durationMinutes = Math.floor(song[index_no].duration / 60);
    let durationSeconds = Math.floor(song[index_no].duration - durationMinutes * 60);
    total_duration1.textContent = durationMinutes + ":" + durationSeconds;
    total_duration2.textContent = durationMinutes + ":" + durationSeconds;

    // Calculate the time left and the total duration
    let curr_minutes = Math.floor(song[index_no].currentTime / 60);
    let curr_seconds = Math.floor(song[index_no].currentTime - curr_minutes * 60);

    // Add a zero to the single digit time values
    if (curr_seconds < 10) { curr_seconds = "0" + curr_seconds; }
    if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }

    // Display the updated duration
    current_duration1.textContent = curr_minutes + ":" + curr_seconds;
    current_duration2.textContent = curr_minutes + ":" + curr_seconds;


    // function will run when the song is over
    if (song[index_no].ended) {
        clearInterval(update_second);
        wave_animation.style.opacity = '0';
        index_no = index_no + 1;
        if (index_no == Playlist.length) {
            index_no = 0;
        }

        song[index_no].currentTime = 0;
        play_song();
    }
}


/*show popup music player */
up_player.addEventListener('click', function() {
    p_m_player.style.transform = 'translateY(0%)';
});


/* Hide popup music player */
down_player.addEventListener('click', function() {
    p_m_player.style.transform = 'translateY(110%)';
});


/*play pause btn inside the popup Music player*/
play_pause_btn1.addEventListener('click', function() {
    if (song_status == false) {
        song[index_no].play();
        song_status = true;
        wave_animation.style.opacity = '1';
        this.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
        play_pause_btn2.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
    } else {
        song[index_no].pause();
        song_status = false;
        wave_animation.style.opacity = '0';
        this.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
        play_pause_btn2.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
    }
});

play_pause_btn2.addEventListener('click', function() {
    if (song_status == false) {
        song[index_no].play();
        song_status = true;
        wave_animation.style.opacity = '1';
        this.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
        play_pause_btn1.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
    } else {
        song[index_no].pause();
        song_status = false;
        wave_animation.style.opacity = '0';
        this.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
        play_pause_btn1.innerHTML = '<i class="fa fa-play" aria-hidden="true"></i>';
    }
});


// change slider position
function change_duration1() {
    let slider1_position = song[index_no].duration * (slider1.value / 100);
    song[index_no].currentTime = slider1_position;
    song[index_no].currentTime * (100 / song[index_no].duration);

}




function change_duration2() {
    slider2_position = song[index_no].duration * (slider2.value / 100);
    song[index_no].currentTime = slider2_position;

}




/*forward btn (next)*/
forward_btn1.addEventListener('click', function() {

    index_no = index_no + 1;
    if (index_no == Playlist.length) {
        index_no = 0;
    }

    song[index_no].currentTime = 0;
    play_song();
});

forward_btn2.addEventListener('click', function() {

    index_no = index_no + 1;
    if (index_no == Playlist.length) {
        index_no = 0;
    }

    song[index_no].currentTime = 0;
    play_song();
});


/*backward btn (previous)*/
backward_btn1.addEventListener('click', function() {

    if (index_no == 0) {
        index_no = Playlist.length - 1;
    } else {
        index_no = index_no - 1;
    }

    song[index_no].currentTime = 0;

    play_song();
});

backward_btn2.addEventListener('click', function() {

    if (index_no == 0) {
        index_no = Playlist.length - 1;
    } else {
        index_no = index_no - 1;
    }

    song[index_no].currentTime = 0;

    play_song();
});


/*play function*/
function play_song() {
    song[index_no].play();

    if (is_song_played == true) {
        document.querySelector(".active_song").pause();
        document.querySelector(".active_song").classList.remove("active_song");
    } else {
        is_song_played = true;
    }

    song[index_no].classList.add("active_song");

    song_status = true;
    setInterval(update_second, 1000);
    wave_animation.style.opacity = '1';
    p_m_player.style.transform = 'translateY(0%)';

    song_img.innerHTML = `<img src="http://localhost:8000/${Playlist[index_no].img}" />`;
    playing_img.innerHTML = `<img src="http://localhost:8000/${Playlist[index_no].img}" />`;

    song_name.innerHTML = Playlist[index_no].name;
    artist_name.innerHTML = Playlist[index_no].singer;

    current_track_name.innerHTML = Playlist[index_no].name;
    current_singer_name.innerHTML = Playlist[index_no].singer;
    play_pause_btn1.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';


    play_pause_btn2.innerHTML = '<i class="fa fa-pause" aria-hidden="true"></i>';
}