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

			scrollDownTo(scroll);
		});
	};

	var tileNav = document.getElementsByClassName('smooth-navigation-top');
	for (var i = tileNav.length - 1; i >= 0; i--) { //
		tileNav[i].addEventListener('click', function (event){		
			scrollUpTo(0)
		});
	};
	// We use .input class for passing any given data.
	var ajaxForms = document.getElementsByClassName('ajax-action-handled-form');
	for (var i = ajaxForms.length - 1; i >= 0; i--) { //
		ajaxForms[i].addEventListener('submit', function (event){		
			event.preventDefault();
			var formData = {}
			var formElements = event.target.getElementsByClassName('input')
			for (var i = formElements.length - 2; i >= 0; i--) {
				if(!empty(formElements[i].value) && !empty(formElements[i].name)){
					formData[formElements[i].name] = formElements[i].value
				}
			};
			// Should have real form data now.
			if(!empty(formData)){
				ajax(event.target.getAttribute('action'), 
					formData,
					function(res)
					{
						handleJson(res)
					}, 
					function(){
						console.log('error')
					}
				);
			}
		});	
	};

	// We use .input class for passing any given data.
	var ajaxAnchor = document.getElementsByClassName('ajax-handled-anchor');
	for (var i = ajaxAnchor.length - 1; i >= 0; i--) { //
		ajaxAnchor[i].addEventListener('click', function (event){		
			event.preventDefault();
			document.getElementsByClassName('navigation').getElementsByTagName('li').getElementsByClassName('active')[0].removeClass('active');
		});	
	};

	function handleJson(data){
		var data = JSON.parse(data)
		console.log(data)
		if(data.error == 0){
			console.log('hello');
		}
	
















	}
}