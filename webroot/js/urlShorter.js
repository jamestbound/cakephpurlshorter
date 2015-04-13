
/* hide everything*/
hideEverything = function () {
    for (var i = 0; document.getElementsByClassName("displayOn").length > i; i++) {
        document.getElementsByClassName("displayOn")[i].className = "displayHide";
    }
    for (var i = 0; document.getElementsByClassName("displayShow").length > i; i++) {
        document.getElementsByClassName("displayShow")[i].className = "displayHide";
    }
}

function containerShow(conteiner) {
    hideEverything();
    document.getElementById(conteiner).className = "displayShow";
}

function urlSubmit() {
    containerShow('loading');
    if (window.XMLHttpRequest) {
        var xh = new XMLHttpRequest();
    } else {
        var xh = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xh.open("POST", "", true);
//        xh.setRequestHeader("Content-length", parseInt(JSON.stringify(postv).length));
    xh.overrideMimeType('application/json');
    xh.timeout = 50000;
    xh.ontimeout = function () {
        console.log("timeout");
    }
    xh.onreadystatechange = function () {
        if (xh.readyState == 4) {
            if (xh.status == 200) {
                var j = JSON.parse(xh.responseText.T());
                switch (j.status) {
                    case 'ok':
                        statusOk(j);
                        return true;
                        break;
                    case "Access Denied":
                        statusAccessDenied(j);
                        break;
                    case "Error":
                        statusError(j);
                        break;

                    default:
                        alert("impossible");
                        return false;
                }



            }
        }
    }
}

function statusOk(j){ // 
    containerShow('urlResponseCorrect');    
    document.getElementById("urlResponseCorrectShortUrl").innerHTML=j.shortUrl.toString();
}


function statusError(j){ // simple44 error situation
    containerShow('urlResponseUnknownError');    
}


function statusAccessDenied(j){ /// access denied situation
    containerShow('urlResponseAccessDenied');    
}
