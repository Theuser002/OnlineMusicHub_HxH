<html>
<head>
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
<body>
<input type="text" style="width:300px; margin:0px;" placeholder="Search songs, mv or artist" onkeyup="livesearch(this.value);"></input>
<div id='result'>
	
</div>
</body>
</html>