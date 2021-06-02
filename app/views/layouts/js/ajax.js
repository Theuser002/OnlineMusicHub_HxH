function updateView(id){
	var xhttp;
	var url = "updateViewAction.php?MVID="+id;
	if (window.XMLHttpRequest) {
		xhttp = new XMLHttpRequest();
	} else {
		xhttp = new ActiveXObject("microsoft.XMLHttp");
	}
	xhttp.open("GET", url, true);
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

function process(){
	if(http.readyState==4 && http.status==200){
		result = http.responseText;
		document.getElementById("result").innerHTML = result;
	}
}