window.onload = function () {
	// Switches Listener and JS handler
	var switches = document.getElementsByClassName('switch');
	for (var i = switches.length - 1; i >= 0; i--) { //
		switches[i].addEventListener('click', function (event){
			var switchContainer = event.target.parentNode;
			var input = switchContainer.getElementsByTagName('input')[0];
			var evt = new Event('dkswitched');
			setTimeout(function(){input.parentNode.parentNode.dispatchEvent(evt);}, 400);
			if(switchContainer.className == 'switch-on')
			{   
				input.checked = false
				switchContainer.className = 'switch-off';
			} else {
				input.checked = true
				switchContainer.className = 'switch-on';
			}
		});
	};

	var tileNav = document.getElementsByClassName('smooth-navigation-next');
	for (var i = tileNav.length - 1; i >= 0; i--) { //
		tileNav[i].addEventListener('click', function (event){		
			var windowHeight = window.innerHeight
			var tile = nextOfClass(parentOfClass(event.target, 'scroller-content'), 'scroller-content')
			var scroll = tile.offsetTop - ((windowHeight - tile.clientHeight) / 2)
			
			if (scroll >= document.body.clientHeight - windowHeight){
				scroll = document.body.clientHeight - windowHeight
			}

			scrollTo(scroll, function(){parallax.mapParallax(null, 1)});
		});
	};

	var tileNav = document.getElementsByClassName('smooth-navigation-top');
	for (var i = tileNav.length - 1; i >= 0; i--) { //
		tileNav[i].addEventListener('click', function (event){		
			scrollTop()
		});
	};

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

	function scrollTop(){
        document.body.style.marginTop = -pageYOffset+"px"
        document.body.style.overflowY = "scroll"
        window.scrollTo(0);
        document.body.style.transition = "all 1s ease"
        document.body.style.marginTop = "0"
       	document.body.addEventListener('webkitTransitionEnd', function(){document.body.removeAttribute("style")}, false); 
	}

	function scrollTo(y, onmoveFunction){
		// Because scroll events won't fire, the page is not scrolling, lets set up a var and callback function for the animation period.
		var isanimating = true
		var translated =  -(y - pageYOffset) 		
		// Set our transition's property, time, and transition.
		document.body.style.transition = "all 0.5s ease"
		document.body.style.webkitTransform = "translate3d(0px, " + translated +"px, 0px)";
        
		document.body.addEventListener('webkitTransitionEnd', handleScrollEnd, false);
		
		animating();
		
		function animating(){setTimeout(function(){if(isanimating){onmoveFunction();animating();}}, 1);}
		
		function handleScrollEnd(){
			document.body.removeAttribute("style");
			window.scrollTo(0,y);
			isanimating = false
			document.body.removeEventListener('webkitTransitionEnd', handleScrollEnd, false)
		}
		return true
	}
}