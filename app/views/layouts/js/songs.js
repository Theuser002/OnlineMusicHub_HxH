function getXMLHttpObject (){
    var xmlHttp = null;
    try
    {
        xmlHttp = new XMLHttpRequest();
        
    }
    catch (e)
    {
        //Internet Explorer (IE)
        try
        {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        //old IE
        catch (e)
        {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");        
        }
    }
}