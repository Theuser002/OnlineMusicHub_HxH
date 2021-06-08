var addFavBtn = document.getElementById('add-fav');
var removeFavBtn = document.getElementById('remove-fav');


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

function updateSongViews(songID){
    var xhr = getXMLHttpObject();
    var url = 'updateSongViewsAction.php?songID='+songID;
    
//    https://www.w3schools.com/xml/ajax_xmlhttprequest_send.asp
    xhr.open('GET', url, true);
    xhr.send();
}

function addFavSongToDB(songID){
    console.log('ADD FAV');
    var xhr = getXMLHttpObject();
    var url = 'addFavSongAction.php?songID='+songID;
    xhr.open('GET', url, true);
    xhr.send();
}

function removeFavSongFromDB(songID){
    console.log('REMOVE FAV');
    var xhr = getXMLHttpObject();
    var url = 'removeFavSongAction.php?songID='+songID;
    xhr.open('GET', url, true);
    xhr.send();
}

function addFavSong(songID){
    if (addFavBtn.querySelector('i').classList.contains('far')){
        addFavBtn.querySelector('i').classList.remove('far');
        addFavBtn.querySelector('i').classList.add('fas');

        addFavSongToDB(songID);
    }else if (addFavBtn.querySelector('i').classList.contains('fas')){
        addFavBtn.querySelector('i').classList.remove('fas');
        addFavBtn.querySelector('i').classList.add('far');
        removeFavSongFromDB(songID);
    }else{
        console.log('ACTION1');
    }
}

function removeFavSong(songID){
    if (removeFavBtn.querySelector('i').classList.contains('far')){
        removeFavBtn.querySelector('i').classList.remove('far');
        removeFavBtn.querySelector('i').classList.add('fas');
        addFavSongToDB(songID);
    }else if (removeFavBtn.querySelector('i').classList.contains('fas')){
        removeFavBtn.querySelector('i').classList.remove('fas');
        removeFavBtn.querySelector('i').classList.add('far');
        removeFavSongFromDB(songID);
    }else{
        console.log('ACTION2');
    }
}