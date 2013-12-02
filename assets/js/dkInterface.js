window.onload = function () {
	dkInterfaceAddListeners();	
}

function dkInterfaceAddListeners(){

	// Listen for search transition finished.
	var searchButton = document.getElementById('navigation-container').getElementsByClassName('search-button')[0];
	searchButton.addEventListener('webkitTransitionEnd', function(event){if(hasClass(searchButton, 'open')){searchInput.focus();}});
	// Listen for search click.
	if(!hasAttr(searchButton,'data-dkInterface')){
		searchButton.setAttribute('data-dkInterface','event')
		searchButton.addEventListener('click', function (event){	
			searchClick(event, searchButton)		
		});
	}

	var intellitype = document.getElementById("intellitype");
	var searchInput = document.getElementById('navbar-search');
	// Listen for choice of suggestions, and to fetch suggestions.
	if(!hasAttr(searchInput,'data-dkInterface')){
		searchInput.setAttribute('data-dkInterface','event')
		searchInput.addEventListener('keyup', function(event){
			searchKeyup(event, searchInput, searchButton, intellitype)
		});
	}
	// We use .input class for passing any given data.
	var ajaxAnchor = document.getElementsByClassName('ajax-handled-anchor');
	for (var i = ajaxAnchor.length - 1; i >= 0; i--) { //
		if(!hasAttr(ajaxAnchor[i],'data-dkInterface')){
			ajaxAnchor[i].setAttribute('data-dkInterface','event')
			ajaxAnchor[i].addEventListener('click', function (event){		
				ajaxAnchorClick(event, searchButton)	
			});	
		}
	};

	// We use .input class for passing any given data.
	var alerts = document.getElementsByClassName('alert-message-close');
	for (var i = alerts.length - 1; i >= 0; i--) { //
		if(!hasAttr(alerts[i],'data-dkInterface')){
			alerts[i].setAttribute('data-dkInterface','event')
			alerts[i].addEventListener('click', function (event){		
				alertCloseClick(event)	
			});	
		}
	};

	// Switches Listener and JS handler
	var switches = document.getElementsByClassName('switch');
	for (var i = switches.length - 1; i >= 0; i--) { //
		if(!hasAttr(switches[i],'data-dkInterface')){
			switches[i].setAttribute('data-dkInterface','event')
			switches[i].addEventListener('click', function (event){
				switchClick(event)
			});
		}
	};

	var fullWindowHeightElements = document.getElementsByClassName('full-window-height');
	for (var i = fullWindowHeightElements.length - 1; i >= 0; i--) { 
		if(!hasAttr(fullWindowHeightElements[i],'data-dkInterface')){
			fullWindowHeightElements[i].setAttribute('data-dkInterface','setting')
			fullWindowHeightElements[i].style.minHeight = window.innerHeight - 146 + "px"
		}
	};

	var tileNav = document.getElementsByClassName('smooth-navigation-next');
	for (var i = tileNav.length - 1; i >= 0; i--) { //
		if(!hasAttr(tileNav[i],'data-dkInterface')){
			tileNav[i].setAttribute('data-dkInterface','event')
			tileNav[i].addEventListener('click', function (event){		
				scrollNextClick(event)
			});
		}
	};

	var tileNav = document.getElementsByClassName('smooth-navigation-top');
	for (var i = tileNav.length - 1; i >= 0; i--) { //
		if(!hasAttr(tileNav[i],'data-dkInterface')){
			tileNav[i].setAttribute('data-dkInterface','event')
			tileNav[i].addEventListener('click', function (event){		
				smoothScrollTo(0)
			});
		}
	};

	// We use .input class for passing any given data.
	var ajaxForms = document.getElementsByClassName('ajax-action-handled-form');
	for (var i = ajaxForms.length - 1; i >= 0; i--) { //
		if(!hasAttr(ajaxForms[i],'data-dkInterface')){
			ajaxForms[i].setAttribute('data-dkInterface','event')
			ajaxForms[i].addEventListener('submit', function (event){		
				ajaxFormSubmit(event)
			});	
		}
	};
}

function searchClick(event, searchButton){
	event.preventDefault();


	searchButton = event.target;

	if(searchButton.nodeName == 'INPUT'){
		parentOfType(searchButton, 'li').style.overflow = "auto";
		return true
	}

	if(searchButton.nodeName != 'LI'){
		searchButton = parentOfType(searchButton, 'li');
	}

	if(document.getElementById('navbar-search').value == "" || !hasClass(searchButton, 'open')){
		
		if(hasClass(searchButton, 'open')){ // Is about to close
			searchButton.style.overflow = "hidden";
		}

		toggleClass(searchButton, 'open');
		return true
	}
	// Handle Loading Search Page.
}

// Interface Handler functions.

var storedString = ""; // Store Input value so we can simply find out whether we need new suggestions. 
var fetching = 0;
var intellitypeOpen = 0; // One Based
var userSelection = -1; // One Based
function searchKeyup(event, searchInput, searchButton, intellitype){
	switch(event.keyCode){
		case 27:
			if(intellitypeOpen == true && intellitype.childNodes.length){
				searchButton.style.overflow = "hidden";
				intellitypeOpen = 0
			} else {
				searchInput.blur()
				searchButton.style.overflow = "hidden";
				removeClass(searchButton, 'open');	
			}
		break;
		case 38:
			if(intellitype.childElementCount){
				if(hasClass(intellitype.childNodes[userSelection], 'selection'))
					removeClass(intellitype.childNodes[userSelection], 'selection')
				if(userSelection - 1 == -1){
					searchInput.focus();
					userSelection = -1
				} else {
					userSelection -= 1
					addClass(intellitype.childNodes[userSelection], 'selection');
				}
			} 
		break;
		case 40: //down
			if(intellitype.childElementCount){
				if(hasClass(intellitype.childNodes[userSelection], 'selection'))
					removeClass(intellitype.childNodes[userSelection], 'selection')
				if(userSelection + 1 >= intellitype.childElementCount){
					searchInput.focus();
					userSelection = -1
				} else {
					userSelection += 1
					addClass(intellitype.childNodes[userSelection], 'selection');
				}
			} 
		break;
	}

	if(!empty(searchInput.value) && fetching == 0 && storedString != searchInput.value && searchInput.value != ""){
		
		fetching = 1
		storedString = searchInput.value
		fetchSuggestions()

		if(intellitypeOpen != true){
			searchButton.style.overflow = "auto";
			intellitypeOpen = 1
		}

		function fetchSuggestions(){
			ajax('./index.php?c=ajax&m=search_suggestion', {'query':searchInput.value},function(suggestions){
				
				intellitype.innerHTML = "";

				for (var key in suggestions){
				    anchorTag = document.createElement("a");
				    anchorTag.href = "./index.php?c=store&m=search&query=" + suggestions[key];
				    anchorTag.appendChild(document.createTextNode(suggestions[key])); 
					intellitype.appendChild(anchorTag);
				}
		
				fetching = 0;
				if(storedString != searchInput.value){
					fetchSuggestions();
				}
			})
		}
		return true;
	}

	if(empty(searchInput.value)){
		searchButton.style.overflow = "hidden";
		intellitypeOpen = 0
	}
	return true;
}

function scrollNextClick(event){
	var windowHeight = window.innerHeight
	var tile = nextOfClass(parentOfClass(event.target, 'scroller-content'), 'scroller-content')
	var scroll = tile.offsetTop - ((windowHeight - tile.clientHeight) / 2)
	
	if (scroll >= document.body.clientHeight - windowHeight){
		scroll = document.body.clientHeight - windowHeight
	}

	smoothScrollTo(scroll);
}

function switchClick(event){
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
}

function alertCloseClick(event){
	var message = parentOfType(event.target, 'div');
	fadeOut(message, function (){
		message.parentNode.removeChild(message);
	})
}

function ajaxFormSubmit(event){
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
		ajax(event.target.getAttribute('action'), formData,function(res)
			{
				ajaxEncodedActions(res);
			} 
		, 1);
	}
}

function ajaxEncodedActions(res){
	// Location
	// Error
	// Message
	client = res.ajax
	
	if(empty(client))
		return false

	if(client.location.state != "stay" && client.location != "stay"){
		if(client.location.mode == 'full'){
			replaceMainPageFromURL(client.location.address, 1); // Full reload
		} else {
			replaceMainPageFromURL(client.location.address); // Partial reload
		}
	}

	if(!empty(client.message)){
		for (var i = client.message.length - 1; i >= 0; i--) {
			console.log(client.message)
			if(!empty(client.message[i].type) && !empty(client.message[i].content)){
			    
				var previous = document.querySelector('.message-' + client.message[i].type);

				if(previous != null){
					message = previous;
			   		message.innerHTML = "";
			    } else {
			    	message = document.createElement("div");
			    	message.className = "message message-" + client.message[i].type
			    }

			    message.style.opacity = 0
			  	content = document.createElement("p");
			  	content.appendChild(document.createTextNode(client.message[i].content))
			  	close = document.createElement("a");
			  	close.className = 'alert-message-close';
			  	close.innerHTML = '<i class="fa fa-times-circle"></i>';
			  	close.setAttribute('data-dkInterface','event')
				close.addEventListener('click', function (event){		
					alertCloseClick(event)	
				});	
			  	message.appendChild(close)
			  	message.appendChild(content)

			  	if(previous == null)
					document.body.insertBefore(message, document.getElementById('main-page'));
				fadeIn(message)
			}
		};
	}
}

function ajaxAnchorClick(event, searchButton){
	
	event.preventDefault();

	removeClass(document.getElementById('navigation-container').getElementsByClassName('active')[0],'active');
	
	if(!hasClass(event.target, 'non-active'))
		addClass(parentOfType(event.target, 'li'), 'active');
	if(hasAttr(event.target, 'data-activate'))
		addClass(document.getElementById(event.target.getAttribute('data-activate')).parentNode, 'active');

	if(hasClass(event.target, 'full-refresh')){	
		replaceMainPageFromURL(event.target.getAttribute('href'), 1)
	} else {
		replaceMainPageFromURL(event.target.getAttribute('href'))
	}

	if(hasClass(searchButton, 'open')){
		searchButton.style.overflow = "hidden";
		removeClass(searchButton, 'open');	
	}
}

function replaceMainPageFromURL(url, full){ // full 1 or 0, replace header and main-page or just main-page 

	if(full == 1){fadeOut(document.getElementById('navigation-container'))}
	fadeOut(document.getElementById('main-page'))

	ajax(url, {}, function (page){
		var temp = document.createElement("div")
		temp.innerHTML = page
		var mainPage = temp.querySelector('div[id=main-page]')
		
		if(mainPage){
			var title = temp.querySelector('title')
			document.title = title.innerHTML
			window.history.pushState(null, title.innerHTML, url);

			document.getElementById('main-page').innerHTML = mainPage.innerHTML;

			if(full == 1){
				var navigationContainer = temp.querySelector('div[id=navigation-container]')
				document.getElementById('navigation-container').innerHTML = navigationContainer.innerHTML;
				fadeIn(document.getElementById('navigation-container'))
			}

			dkInterfaceAddListeners()

			// Lets re-evaluate the scripts we may have loaded. 
			scripts = mainPage.querySelectorAll('script')
			for (var i = scripts.length - 1; i >= 0; i--) {
				eval(scripts[i].innerHTML)
			};

		} else {
			document.getElementById('main-page').innerHTML = '<div class="container padded"><p class="centre">Sorry, somesthing went wrong, please try opening the link in a new tab.</p></div>';
		}
		
		// Clear the current temp.
		temp = "";

		fadeIn(document.getElementById('main-page'))
	}, 0);
}