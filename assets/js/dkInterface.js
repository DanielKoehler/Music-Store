window.onload = function () {
	dkInterfaceAddheaderListeners();
	dkInterfaceAddListeners();	
}

function dkInterfaceAddheaderListeners(){
	// Listen for search transition finished.
	var searchButton = document.getElementById('navigation-container').getElementsByClassName('search-button')[0];
	searchButton.addEventListener('webkitTransitionEnd', function(event){if(hasClass(searchButton, 'open')){searchInput.focus();}});
	// Listen for search click.
	searchButton.addEventListener('click', function (event){	
		searchClick(event, searchButton)		
	});

	var intellitype = document.getElementById("intellitype");
	var searchInput = document.getElementById('navbar-search');
	// Listen for choice of suggestions, and to fetch suggestions.
	searchInput.addEventListener('keyup', function(event){
		searchKeyup(event, searchInput, searchButton, intellitype)
	});

	// We use .input class for passing any given data.
	var ajaxAnchor = document.getElementById('navigation-container').getElementsByClassName('ajax-handled-anchor');
	for (var i = ajaxAnchor.length - 1; i >= 0; i--) { //
		ajaxAnchor[i].addEventListener('click', function (event){		
			ajaxAnchorClick(event, searchButton)	
		});	
	};
}

function dkInterfaceAddListeners(){
	// Switches Listener and JS handler
	var switches = document.getElementsByClassName('switch');
	for (var i = switches.length - 1; i >= 0; i--) { //
		switches[i].addEventListener('click', function (event){
			switchClick(event)
		});
	};

	var fullWindowHeightElements = document.getElementsByClassName('full-window-height');
	for (var i = fullWindowHeightElements.length - 1; i >= 0; i--) { 
		fullWindowHeightElements[i].style.minHeight = window.innerHeight - 171 + "px"
	};

	var tileNav = document.getElementsByClassName('smooth-navigation-next');
	for (var i = tileNav.length - 1; i >= 0; i--) { //
		tileNav[i].addEventListener('click', function (event){		
			scrollNextClick(event)
		});
	};

	var tileNav = document.getElementsByClassName('smooth-navigation-top');
	for (var i = tileNav.length - 1; i >= 0; i--) { //
		tileNav[i].addEventListener('click', function (event){		
			smoothScrollTo(0)
		});
	};

	// We use .input class for passing any given data.
	var ajaxForms = document.getElementsByClassName('ajax-action-handled-form');
	for (var i = ajaxForms.length - 1; i >= 0; i--) { //
		ajaxForms[i].addEventListener('submit', function (event){		
			ajaxFormSubmit(event)
		});	
	};

	var ajaxAnchor = document.getElementById('main-page').getElementsByClassName('ajax-handled-anchor');
	for (var i = ajaxAnchor.length - 1; i >= 0; i--) { //
		ajaxAnchor[i].addEventListener('click', function (event){		
			ajaxAnchorClick(event)	
		});	
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

	if(!empty(searchInput.value) && fetching == 0 && storedString != searchInput.value){
		
		fetching = 1
		storedString = searchInput.value
		fetchSuggestions()

		if(intellitypeOpen != true){
			searchButton.style.overflow = "auto";
			intellitypeOpen = 1
		}

		function fetchSuggestions(){
			ajax('/ajax/search_suggestion.html', {'query':searchInput.value},function(suggestions){
				
				intellitype.innerHTML = "";

				for (var key in suggestions){
				    anchorTag = document.createElement("a");
				    anchorTag.href = "/store/search.html?query=" + suggestions[key];
				    anchorTag.appendChild(document.createTextNode(suggestions[key])); 
					intellitype.appendChild(anchorTag);
				}
		
				fetching = 0;
				if(storedString != searchInput.value){
					fetchSuggestions();
				}
			})
		}
	}
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

function ajaxEncodedActions(client){
	// Location
	// Error
	// Message
	if(client.location.state != "stay"){
		if(client.location.mode == 'full'){
			replaceMainPageFromURL(client.location.address, 1); // Full reload
		} else {
			replaceMainPageFromURL(client.location.address); // Partial reload
		}
	}
}

function ajaxAnchorClick(event, searchButton){
	
	event.preventDefault();

	removeClass(document.getElementById('navigation-container').getElementsByClassName('active')[0],'active');
	
	if(!hasClass(event.target, 'non-active'))
		addClass(parentOfType(event.target, 'li'), 'active');
	if(hasAttr(event.target, 'data-activate'))
		addClass(document.getElementById(event.target.getAttribute('data-activate')).parentNode, 'active');

	replaceMainPageFromURL(event.target.getAttribute('href'))
	
	if(hasClass(searchButton, 'open')){
		searchButton.style.overflow = "hidden";
		removeClass(searchButton, 'open');	
	}
}