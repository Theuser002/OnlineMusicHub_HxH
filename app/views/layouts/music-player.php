<head>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="css/music-player.css">
</head>
<body>
<h1> HxH Song Player </h1>
<div class="music-container" id="music-container">
    <div class="music-info">
        <h4 id="title">StarSky</h4>
        
        <div class="progress-container" id="progress-container">
            <div class="progress" id="progress">
            
            </div>
        </div>
    </div>
    
    <audio src="../songs/Victory.mp3" id="audio"></audio>
    
    <div class="img-container">
        <img src="images/ocean.jpg" alt="music-cover" id="cover"> 
    </div>
    
    <div class="navigation">
        <button id="prev" class="action-btn"> <i class="fas fa-backward"></i> </button>
        <button id="play" class="action-btn action-btn-big"> <i class="fas fa-play"></i> </button>
        <button id="next" class="action-btn"> <i class="fas fa-forward"></i> </button>
    </div>
    <script src="js/music-player.js"></script> 
</div>
</body>
