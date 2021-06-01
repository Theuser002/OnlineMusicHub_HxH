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