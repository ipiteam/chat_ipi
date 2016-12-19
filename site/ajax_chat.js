if ("lastMsgId" in window) { var lastMsgId; }
if ("colorArray" in window) {var colorArray = [ "red", "blue", "green", "orange"];}
if ("colorIdArray" in window ) {var colorIdArray= [];}
    var chatDiv = document.getElementById("ipi_mainchat");

function getXMLHttpRequest() {
	var xhr = null;
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest();
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	return xhr;
}
function requestOnLoad(callback, id, getOpts) {
    var xhr   = getXMLHttpRequest();
	var ret = 1;
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseXML, id);
            return 0;
        } else if (xhr.readyState < 4) {
        }
    };
    xhr.open("GET", "server.php?" + getOpts, true);
    xhr.send(null);
}
function requestSend( id, texte) {
    var xhr   = getXMLHttpRequest();
	var ret = 1;
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            // callback(xhr.responseXML, id);
            return 0;
        } else if (xhr.readyState < 4) {
        }
    };
    xhr.open("POST", "post.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id + "&texte=" + texte);
}

/*
Fonction qui va charger les derniers messages
*/
function readData(oData, id) {
    var chat = document.getElementById("chat");

    var colId   = oData.getElementsByTagName("profils");
    var l;
    for (var i=0; i<colId.length; i++) {
        colorIdArray.push(parseInt(colId[i].getAttribute("id")));

    }

    var nodes   = oData.getElementsByTagName("item");
    var oBloc;
    var idd;
    var col = null;
    // chat.innerHTML = ""; // reset le chat
    for (var i = nodes.length - 1; i >= 0; i--) {
        oBloc = document.createElement("div");

        if (nodes[i].getAttribute('id_profil') == id) {
            oBloc.className = "msg_send";
            col = undefined;
        } else {
            oBloc.className = "msg_get";
            idd = parseInt(nodes[i].getAttribute('id_profil'));
            indexId = colorIdArray.indexOf(idd);
            if (indexId == -1) {
                colorIdArray.push(idd);
                col = colorArray[colorIdArray.length % colorArray.length];
            } else {
                col = colorArray[indexId % colorArray.length];
            }
        }

        appendChildMsgInfo(oBloc, "div", "oheure", nodes[i].getAttribute("heure_mess"));
        appendChildMsgInfo(oBloc, "div", "opseudo", nodes[i].getAttribute("pseudo") + " :", col);

        appendChildMsgText(oBloc, "div", "otexte", nodes[i].getElementsByTagName('texte')[0].textContent);

        chat.appendChild(oBloc);
    }
    if (nodes.length > 0) {
        lastMsgId = nodes[0].getAttribute("id");
        chatDiv.scrollTop = chatDiv.scrollHeight;
    }
    // TODO : To REMOVE
    	lol = nodes;
    return 0;
}
var lol;

function appendChildMsgInfo(parent, element, clName, string, color) {
    var o = document.createElement(element);
    o.className = clName;
    o.textContent = string;
    if (color != undefined) {
        o.style.color = color;
    }
    parent.appendChild(o);
}

function appendChildMsgText(parent, element, clName, string, color) {
    var o = document.createElement(element);
    o.className = clName;
    if (typeof(o.innerText) == "undefined" ) {
        o.innerHTML = string;
    } else {
        o.innerText = string;
    }
    if (color != undefined) {
        o.style.color = color;
    }
    parent.appendChild(o);
}
