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