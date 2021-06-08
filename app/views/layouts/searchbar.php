<!--This <head></head> will be put to the <head></head> of the file that contain it--><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/ajax.js"></script>
</head>


<style>
    #result{
        width: 300px;
        max-height: 300px;
        position: absolute;
        z-index: 1;
        overflow-x: hidden;
        overflow-y: auto;
        background-color: white;
    }
    .suggestbox{
        border-bottom-style: solid;
    }
    .suggestbox img{
        width: 30%;
        margin-right: 2px;
    }
</style>
<div class="searchbar">
    <input type="text" style="width:300px; margin:0px;" placeholder="Search songs, MVs or artist ..." onkeyup="livesearch(this.value);"></input>
    <div id='result'>
    </div>
</div>
<script type="text/javascript" src="js/ajax.js"></script>