<script type="text/javascript">

const musicContainer = document.getElementById('music-container');
const playBtn = document.getElementById('play');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');
const audio = document.getElementById('audio');
const progress = document.getElementById('progress');
const progressContainer= document.getElementById('progress-container');
const title = document.getElementById('title');
const cover = document.getElementById('cover');
    
//const songTitle = ;
//const songAudioLink = ;
//const songImgLink = ;
    
//Song Titles
//const songs = ['StarSky', 'Victory', 'Arcade'];

//Keep track of song, start with 'Arcade'
//let songIndex = 2;

//Load song details into DOM
//loadSong(songTitle, songAudio, songCover);

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

//Update Progress Bar
function updateProgress(e){
    //event.srcElement (or event.target): Sets of retrieves te object that fired the event.
    const {duration, currentTime} = e.srcElement;
    const progressPercent = (currentTime/duration) * 100;
    progress.style.width = `${progressPercent}%`;
}

//Set progress when click on Progress Bar
function setProgress(e){
    const width = this.clientWidth;
    const clickX = e.offsetX;
    const duration = audio.duration;
    
    audio.currentTime = (clickX / width) * duration;
}

//Event Listener for the Play/Pause button
playBtn.addEventListener("click", ()=>{
//    classList: list all the class of an element
    const isPlaying = musicContainer.classList.contains("play");
    
    if(isPlaying){
        pauseSong();
    }else{
        playSong();
    }
});

//Time and Song update
audio.addEventListener('timeupdate', updateProgress);

//Click on Progress Bar
progressContainer.addEventListener("click", setProgress);

//Song ends
audio.addEventListener('ended', nextSong);
</script>