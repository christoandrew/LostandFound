function createREQ() {
    var xmlHttpRequest;

    if (window.XMLHTTPRequest) {
        xmlHttpRequest = new XMLHTTPRequest();
    } else {
        xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlHttpRequest; // returnera req-objekt
}

function requestGET(url, query, req) {
    var myRand = parseInt(Math.random()*99999999);
    req.open("GET", url+'?'+query+'&rand='+myRand, true); // undvik cache
    req.send(null);
}

function requestPOST(url, query, req) {
    req.open("POST", url, true);
    req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    req.send(query);
}

function doCallback(callback, item) {
    eval(callback + '(item)');

}


function loader(){


    var ele = document.getElementById("loading");
    if(ele.style.display == "block") {
        ele.style.display = "none";
    }
    else {
        ele.style.display = "block";
    }

}


function doAjax(url, query, callback, reqtype, getxml) {

    var emptyselect = query.indexOf('Please select');
    if(emptyselect >= 0) {
        return;
    }
    //alert("url = "+url+"\nquery = "+query+"\ncallback = "+callback+"\nreqtype = "+reqtype+"\nxml = "+getxml);
    var myreq = createREQ(); // skapa XMLHTTPRequest-instans
    loader();
    myreq.onreadystatechange = function() {
        if(myreq.readyState == 4) {

            if(myreq.status == 200) {

                var item = myreq.responseText;
                if(getxml == 1) {
                    item = myreq.responseXML;
                }


                doCallback(callback, item);
                loader();
            }
        }
    }
    if(reqtype == 'post') {
        requestPOST(url, query, myreq);
    }
    else {
        requestGET(url, query, myreq);
    }
}
/**
 * Created by abel on 4/10/2015.
 */
