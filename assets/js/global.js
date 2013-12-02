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
	if(!elem){
		return false
	}

	while (elem.parentNode.nodeName != typeName.toUpperCase()){
		if(elem.parentNode.parentNode == null){
			return false
		}
		elem = elem.parentNode
	}
	return elem.parentNode
}

function toggleClass(elem, searchClass)
{
	if(hasClass(elem, searchClass)){
		removeClass(elem, searchClass)
	} else {
		addClass(elem, searchClass)
	}
	return true
}

function addClass(elem, searchClass)
{
	if(elem.className.length > 0){
		elem.className += " " + searchClass
	}else {
		elem.className = searchClass
	}
	return true
}

function removeClass(elem, searchClass)
{
	if(elem == undefined){
		return false
	}

	if(elem.className.length > searchClass.length){
		elem.className = elem.className.replace(" "+ searchClass, "")
	} else {
		elem.className = elem.className.replace(searchClass, "")	
	}
	return true
}

function hasClass(elem, searchClass)
{		
	if(elem == undefined){
		return false
	}
	var classes = elem.className.split(" ");
	if(!empty(classes)){
		for (var i = classes.length - 1; i >= 0; i--) {
			if(classes[i] == searchClass){
				return true
			}
		};
	} else {
		if(elem.className == searchClass){
			return true
		}
	}
	return false
}

function hasAttr(elem, searchAttr)
{		
	if(elem == undefined){
		return false
	}

	if(elem.getAttribute(searchAttr)){
		return true	
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

    interval = setInterval(function() {
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
	if(value == null || value == undefined || value == "" || (typeof value === 'object' && Object.keys(value).length == 0)){
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

function ajax(url, postData,dataCallback, ajaxHeader)
{
	if(typeof postData === 'object'){
		if(ajaxHeader == 1){
			postData['ajax'] = true
		}
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

function fadeOut(element, callback)
{
	if(empty(element.style)){
		return false
	}
	
	element.style.opacity = 1

    animate()
    function animate(){
		if (element.style.opacity <= 0.1) {
       		element.style.opacity = 0
       		if(callback != undefined)
       			callback()
      		return false;
       	} 
		element.style.opacity = parseFloat(element.style.opacity) - 0.05
		setTimeout(animate, 5);
    }	
}

function fadeIn(element, callback)
{
	if(empty(element.style)){
		return false
	}
	
	element.style.opacity = 0

    animate()
    function animate(){
		if (element.style.opacity >= 0.9) {
       		element.style.opacity = 1
       		if(callback != undefined)
       			callback()
      		return false;
       	} 
		element.style.opacity = parseFloat(element.style.opacity) + 0.05
		setTimeout(animate, 10);
    }	
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