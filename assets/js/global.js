function nextOfClass(elem, className)
{
	while (elem.nextElementSibling.className.indexOf(className) == -1 && elem.nextElementSibling != undefined){
		elem = elem.nextElementSibling
	}
	return elem.nextElementSibling
}

function parentOfClass(elem,className)
{
	while (elem.parentNode.className.indexOf(className) == -1 && elem.parentNode != undefined){
		elem = elem.parentNode
	}
	return elem.parentNode
}

function parentOfType(elem,typeName)
{	
	while (elem.parentNode.nodeName != typeName.toUpperCase()){
		elem = elem.parentNode
	}
	return elem.parentNode
}

function toggleClass(elem, searchClass)
{
	if(!hasClass(elem, searchClass)){
		addClass(elem, searchClass)
	} else {
		removeClass(elem, searchClass)
	}
}

function addClass(elem, searchClass)
{
	if(elem.className.length > 0){
		elem.className += " " + searchClass
	}else {
		elem.className = searchClass
	}

}

function removeClass(elem, searchClass)
{
	
	if(elem.className.length > searchClass.length){
		elem.className = elem.className.replace(" "+ searchClass, "")
	} else {
		elem.className = elem.className.replace(searchClass, "")	
	}
}

function hasClass(elem, searchClass)
{
	var classes = elem.className.split(" ");
	if(!empty(classes)){
		for (var i = classes.length - 1; i >= 0; i--) {
			if(classes[i] == searchClass){
				return true
			}
		};
	}
	return false
}

function smoothScrollTo(y)
{
	if(y <= pageYOffset){
		step = -50 // Up
	} else {
		step = 20 // Down
	}
	console.log('called' + y)

    interval = setInterval(function() {
    	console.log(pageYOffset + step)
       	if (((pageYOffset + step >= y) && step > 0) || ((pageYOffset + step <= y) && step < 0)) {
       		window.scrollTo(0,y)
          	clearInterval(interval);
      		return false;
       	}
		window.scrollBy(0,step)
    }, 5);
}

function empty(value, assig)
{
	if((typeof value === 'object' && Object.keys(value).length == 0) || value == null || value == undefined || value == ""){
		return true
	}
	return false
}

function setCookie(cookieHandle,value)
{
	var today = new Date().getTime();
	var value = JSON.stringify(value)
	document.cookie = cookieHandle + "=" + value + ";expires=" + new Date(today + 1728000000).toUTCString() + ";"
	globalCookies[cookieHandle] = value;
	return true
}

function deleteCookie(cookieHandle)
{
	document.cookie = cookieHandle + "=; expires=" + Date() + ";"
}

var globalCookies
function fetchCookie(cookieHandle)
{
	if(!empty(globalCookies)){
		return globalCookies[cookieHandle]
	}

	cookies = document.cookie.split(" ")
	cookieArray = {}
	for (cookie in cookies){
		current = cookies[cookie]
		var index = current.substr(0,current.indexOf("="));
		var value = current.substr(current.indexOf("=") + 1);
		try {
	       value = JSON.parse(value);
	    } catch (exception) {
	       value = value
	    }
	    cookieArray[index] =  value
	}

	globalCookies = cookieArray
	
	return cookieArray[cookieHandle]
}

function replaceDivisionFromURL(url, localDiv, forignDiv){
	return true
}


function ajax(url, postData,dataCallback)
{

	if(typeof postData === 'object'){
		postData['ajax'] = true
		postData = urlEncode(postData);
	}
	var ajax = new XMLHttpRequest();
	ajax.open('POST', url, true);
	ajax.onreadystatechange = function (){	
		if(ajax.readyState == 4 && ajax.status == 200) {
			
			try {
		        var res = JSON.parse(ajax.responseText);
		    } catch (e) {
		      	var res = ajax.responseText;
		    }

			dataCallback(res);
			
		} else if (ajax.readyState == 1){
			console.log('Error.');
		}	
	}

	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send(postData);
}

function urlEncode(objects)
{
	var urlEncodedArray = []
	for (var object in objects) {
		if(!empty(objects[object])){
			urlEncodedArray.push(encodeURIComponent(object)+"="+encodeURIComponent(objects[object])) 
		}
	}
	return urlEncodedArray.join('&')
}