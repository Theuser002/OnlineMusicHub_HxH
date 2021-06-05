var musicContainer = document.getElementById('music-container');
var playBtn = document.getElementById('play');
var prevBtn = document.getElementById('prev');
var nextBtn = document.getElementById('next');
var audio = document.getElementById('audio');
var progress = document.getElementById('progress');
var progressContainer= document.getElementById('progress-container');
var title = document.getElementById('title');
var cover = document.getElementById('cover');

//Chrome's policy does not allow Playing on refresh
playSong();


//Update song details
function loadSong (songTitle, songAudioLink, songImgLink){
    title.innerText = songTitle;
    audio.src = songAudioLink;
    cover.src = songImgLink;
}

//Play Song
function playSong(){
    console.log("PLAY SONG");
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
    var {duration, currentTime} = e.srcElement;
    var progressPercent = (currentTime/duration) * 100;
    progress.style.width = `${progressPercent}%`;
}

//Set progress when click on Progress Bar
function setProgress(e){
    var width = this.clientWidth;
    var clickX = e.offsetX;
    var duration = audio.duration;
    
    audio.currentTime = (clickX / width) * duration;
}

//Event Listener for the Play/Pause button
playBtn.addEventListener("click", ()=>{
//    classList: list all the class of an element
    var isPlaying = musicContainer.classList.contains("play");
    
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
audio.addEventListener('ended', ()=>{
    nextBtn.click();
});