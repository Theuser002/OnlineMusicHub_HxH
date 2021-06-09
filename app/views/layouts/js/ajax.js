function getXMLHttpObject (){
    console.log('TEST');
    //xhr: XMLHttpRequestObject
    var xhr = null;
    try
    {
        xhr = new XMLHttpRequest();
        
    }
    catch (e)
    {
        //Internet Explorer (IE)
        try
        {
            xhr = new ActiveXObject('Msxml2.XMLHTTP');
        }
        //old IE
        catch (e)
        {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');        
        }
    }
    
    return xhr;
}

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

//function addFavMV(MVID){
//	var xhttp;
//	var url = "addFavMVAction.php?MVID="+MVID;
//	if (window.XMLHttpRequest) {
//		xhttp = new XMLHttpRequest();
//	} else {
//		xhttp = new ActiveXObject("microsoft.XMLHttp");
//	}
//	xhttp.open("GET", url, true);
//	xhttp.send();
//}

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
}

var addFavBtn = document.getElementById('add-fav');
var removeFavBtn = document.getElementById('remove-fav');

function addFavMVToDB(MVID){
    console.log('ADD FAV');
    var xhr = getXMLHttpObject();
    var url = 'addFavMVAction.php?MVID='+MVID;
    xhr.open('GET', url, true);
    xhr.send();
}

function removeFavMVFromDB(MVID){
    console.log('REMOVE FAV');
    var xhr = getXMLHttpObject();
    var url = 'removeFavMVAction.php?MVID='+MVID;
    xhr.open('GET', url, true);
    xhr.send();
}

function addFavMV(MVID){
    if (addFavBtn.querySelector('i').classList.contains('far')){
        addFavBtn.querySelector('i').classList.remove('far');
        addFavBtn.querySelector('i').classList.add('fas');

        addFavMVToDB(MVID);
    }else if (addFavBtn.querySelector('i').classList.contains('fas')){
        addFavBtn.querySelector('i').classList.remove('fas');
        addFavBtn.querySelector('i').classList.add('far');
        removeFavMVFromDB(MVID);
    }else{
        console.log('ACTION1');
    }
}

function removeFavMV(MVID){
    if (removeFavBtn.querySelector('i').classList.contains('far')){
        removeFavBtn.querySelector('i').classList.remove('far');
        removeFavBtn.querySelector('i').classList.add('fas');
        addFavMVToDB(MVID);
    }else if (removeFavBtn.querySelector('i').classList.contains('fas')){
        removeFavBtn.querySelector('i').classList.remove('fas');
        removeFavBtn.querySelector('i').classList.add('far');
        removeFavMVFromDB(MVID);
    }else{
        console.log('ACTION2');
    }
}
