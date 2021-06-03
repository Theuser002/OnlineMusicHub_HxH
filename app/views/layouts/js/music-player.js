const musicContainer = document.getElementById('music-container');
const playBtn = document.getElementById('play');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');
const audio = document.getElementById('audio');
const progress = document.getElementById('progress');
const progressContainer= document.getElementById('profress-container');
const title = document.getElementById('title');
const cover = document.getElementById('cover');

//Song Titles
//const songs = ['StarSky', 'Victory', 'Arcade'];

//Keep track of song, start with 'Arcade'
//let songIndex = 2;

//Load song details into DOM
//loadSong(songs[songIndex]);

//Update song details
function loadSong (songTitle, songAudioLink, songImgLink){
    title.innerText = songTitle;
    audio.src = songAudioLink;
    cover.src = songImgLink;
}

//Play Song
function playSong(){
    musicContainer.classList.add("play");
//    The querySelector() method returns the first element that matches a specified CSS selector(s) in the document.
    playBtn.querySelector("i.fas").classList.remove("fa-play");
    playBtn.querySelector("i.fas").classList.add("fa-pause");
    
//  html audio element has integrated play() method
    audio.play();
}

//Pause Song
function pauseSong(){
    musicContainer.classList.remove("play");
    
    playBtn.querySelector("i.fas").classList.remove("fa-pause");
    playBtn.querySelector("i.fas").classList.add("fa-play");
    
    audio.pause();
}

//Previous Song
function prevSong(){
    
};
//Next Song
function nextSong(){
    
};
