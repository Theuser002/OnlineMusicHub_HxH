function updateMVView(id){
	var xhttp;
	var url = "updateMVViewAction.php?MVID="+id;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("microsoft.XMLHttp");
	}
	xhttp.open("POST", url, true);
	xhttp.send();
}

function addFavMV(MVID){
	var xhttp;
	var url = "addFavMVAction.php?MVID="+MVID;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("microsoft.XMLHttp");
	}
	xhttp.open("GET", url, true);
	xhttp.send();
}

function livesearch(data){
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("microsoft.XMLHttp");
	}
	if(data != ""){
		xhttp.onreadystatechange = function(){
			if(xhttp.readyState==4 && xhttp.status==200){
				document.getElementById("result").innerHTML = xhttp.responseText;
			}
		};
		xhttp.open('GET', 'getSearch.php?key=' + data, true);
		xhttp.send();
	}else{
		document.getElementById("result").innerHTML = "";
	}
}

function deleteMV(MVID){
	var xhttp;
	var url = "deleteMVAction.php?MVID="+MVID;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("microsoft.XMLHttp");
	}
	xhttp.open("POST", url, true);
	xhttp.send();
	window.location.reload();
}

function deleteSinger(SingerID){
	var xhttp;
	var url = "deleteSingerAction.php?SingerID="+SingerID;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("microsoft.XMLHttp");
	}
	xhttp.open("POST", url, true);
	xhttp.send();
	window.location.reload();
}

function deleteSong(SongID){
	var xhttp;
	var url = "deleteSongAction.php?SongID="+SongID;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("microsoft.XMLHttp");
	}
	xhttp.open("POST", url, true);
	xhttp.send();
	window.location.reload();
}