function getXMLHttpObject (){
    console.log("TEST");
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
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        }
        //old IE
        catch (e)
        {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");        
        }
    }
    
    return xhr;
}

function updateSongViews(songID){
    console.log('TEST');
//    var xhr = getXMLHttpObject();
    var xhr;
    if (window.XMLHttpRequest) {
		xhr = new XMLHttpRequest();
	} else {
		xhr = new ActiveXObject("microsoft.XMLHttp");
	}
    var url = "updateSongViewsAction.php?songID="+songID;
    
//    https://www.w3schools.com/xml/ajax_xmlhttprequest_send.asp
    xhr.open("GET", url, true);
    xhr.send();
}