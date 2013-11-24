function nextOfClass(elem, className){
	while (elem.nextElementSibling.className.indexOf(className) == -1 && elem.nextElementSibling != undefined){
		elem = elem.nextElementSibling
	}
	return elem.nextElementSibling
}

function parentOfClass(elem,className){
	while (elem.parentNode.className.indexOf(className) == -1 && elem.parentNode != undefined){
		elem = elem.parentNode
	}
	return elem.parentNode
}

function toggleClass(elem, searchClass){
	if(hasClass(elem, searchClass)){
		elem.className += searchClass
	} else {
		if(!(elem.className = elem.className.replace(" "+ searchClass, ""))){
			elem.className = elem.className.replace(searchClass, "")
		} 
	}
}

function hasClass(elem, searchClass){
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

function scrollUpTo(y){
	var interval;
    interval = setInterval(function() {
       	if (pageYOffset -50 <= y) {
       		window.scrollTo(0,y)
          	clearInterval(interval);
      		return false;
       	}
		window.scrollBy(0,-50)
    }, 5);
}	

function scrollDownTo(y){
	var interval;
    interval = setInterval(function() {
       	if (pageYOffset + 20 >= y) {
       		window.scrollTo(0,y)
          	clearInterval(interval);
      		return false;
       	}
		window.scrollBy(0,20)
    }, 5);
}

function empty(value, assig){
	if((typeof value === 'object' && Object.keys(value).length == 0) || value == null || value == undefined || value == ""){
		return true
	}
	return false
}

function ajax(url, postData,dataCallback, errorCallBack){

	if(typeof postData === 'object'){
		postData = urlEncode(postData);
	}

	var ajax = new XMLHttpRequest();
	ajax.open('POST', url, false);
	ajax.onreadystatechange = function (){	
		if(ajax.readyState == 4 && ajax.status == 200) {
			dataCallback(ajax.responseText);
		} else if (ajax.readyState == 1){
			console.log('Error.');
		}	
	}

	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.send(postData);
}

function urlEncode(objects){
	var urlEncodedArray = []
	for (var object in objects) {
		if(!empty(objects[object])){
			urlEncodedArray.push(encodeURIComponent(object)+"="+encodeURIComponent(objects[object])) 
		}
	}
	return urlEncodedArray.join('&')
}