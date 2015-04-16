function createREQ() {
    try {
        req = new XMLHttpRequest(); // flesta
    }
    catch(err1) {
        try {
            req = new ActiveXObject("Msxml2.XMLHTTP"); // nÃ¥gra IE
        }
        catch(err2) {
            try {
                req = new ActiveXObject("Microsoft.XMLHTTP"); // andra IE
            }
            catch(err3) {
                req = false; // jag ger upp
            }
        }
    }
    return req; // returnera req-objekt
    //alert("Created"+req.toString());
}

function requestGET(url, query, req) {
    myRand = parseInt(Math.random() * 99999999);
    req.open("GET", url + '?' + query + '&rand=' + myRand, true); // undvik cache
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

function loader() {
    var ele = document.getElementById("loading");
    if (ele.style.display == "block") {
        ele.style.display = "none";
    }
    else {
        ele.style.display = "block";
    }

}


function doAjax(url, query, callback, reqtype, getxml) {
   // alert("Doing Ajax");

    var emptyselect = query.indexOf('--Choose A Category--');
    if (emptyselect >= 0) {
        return;
    }
    //alert("url = "+url+"\nquery = "+query+"\ncallback = "+callback+"\nreqtype = "+reqtype+"\nxml = "+getxml);
    var myreq = createREQ(); // skapa XMLHTTPRequest-instans
    loader();
    myreq.onreadystatechange = function () {
        if (myreq.readyState == 4) {
            //alert("Ready");
            if (myreq.status == 200) {

                var item = myreq.responseText;
                if (getxml == 1) {
                    item = myreq.responseXML;
                    //alert(item);
                }


                doCallback(callback, item);
                loader();
            }
        } else {
            //alert("Not Raedy");
        }
    }
    if (reqtype == 'post') {
        requestPOST(url, query, myreq);
    }
    else {
        requestGET(url, query, myreq);
    }
}
/**
 * Created by abel on 4/10/2015.
 */
