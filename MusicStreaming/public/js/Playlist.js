//song list
let Playlist = [{
        name: "Moments Like this",
        path: "music/1.mp3",
        img: "images/1.jpg",
        singer: "The Afters"
    },
    {
        name: "Remix - Bad Habits",
        path: "music/2.mp3",
        img: "images/2.jpg",
        singer: "Ed sheeran (Copyright Free Version)"
    },
    {
        name: " Right Now ",
        path: "music/3.mp3",
        img: "images/3.jpg",
        singer: "Fabvl"
    },
    {
        name: "No Sleep",
        path: "music/4.mp3",
        img: "images/4.jpg",
        singer: "Neffex"
    },
    {
        name: "Light Switch",
        path: "music/5.mp3",
        img: "images/5.jpg",
        singer: "Charlie Puth"
    },
    {
        name: "Still Alive",
        path: "music/6.mp3",
        img: "images/6.jpg",
        singer: "Portal (Cover By NateWantsToBattle)"
    },
]; /*you can add more song & images from you computer*/



/*tracks*/
let tracks = document.querySelector('.tracks');

//creating a list or generating Html
for (let i = 0; i < Playlist.length; i++) {

    let Html = ` <div class="song">
      <div class="img">
      <img src="http://localhost:8000/${Playlist[i].img}" alt="">
      </div>
      <div class="more">
      <audio src="http://localhost:8000/${Playlist[i].path}" id="music"></audio>
      <div class="song_info">
         <p id="title">${Playlist[i].name}</p>
         <p>${Playlist[i].singer}</p>
      </div>
      <button id="play_btn"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
      </div>
    </div>`;

    tracks.insertAdjacentHTML("beforeend", Html);
};



/*please follow all the rules so that you do not face any problem*/
