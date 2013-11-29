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

			smoothScrollTo(scroll);
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
				console.log(event.target.getAttribute('action'))
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
	var ajaxAnchor = document.getElementsByClassName('no-navigation');
	for (var i = ajaxAnchor.length - 1; i >= 0; i--) { //
		ajaxAnchor[i].addEventListener('click', function (event){		
			
			event.preventDefault();
			removeClass(parentOfClass(event.target,'navigation-container').getElementsByClassName('active')[0],'active');
			addClass(parentOfType(event.target, 'li'), 'active');
			if(hasClass(event.target, 'ajax-handled-anchor')){

			}
		});	
	};

	var storedString = ""; // Store Input value so we can simply find out whether we need new suggestions. 
	var fetching = 0;
	var intellitype = document.getElementById("intellitype");
	var searchInput = document.getElementById('navbar-search');
	searchInput.addEventListener('keyup', function(event){
		// Listen for choice of suggestions, and to fetch suggestions.
		
		if(!empty(searchInput.value) && fetching == 0 && storedString != searchInput.value){
			
			fetching = 1
			storedString = searchInput.value
			fetchSuggestions()
			if(searchButton.style.overflow != "auto"){
				searchButton.style.overflow = "auto";
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
	});

	// Listen for search click.
	var searchButton = document.getElementById('navigation-container').getElementsByClassName('search-button')[0];

	searchButton.addEventListener('webkitTransitionEnd', function(event){if(hasClass(searchButton, 'open')){searchInput.focus();}});
	searchButton.addEventListener('click', function (event){		
			
		event.preventDefault();

		searchButton = event.target;
		// console.log(searchButton)

		if(searchButton.nodeName == 'INPUT'){
			parentOfType(searchButton, 'li').style.overflow = "auto";
			return true
		}

		if(searchButton.nodeName != 'LI'){
			searchButton = parentOfType(searchButton, 'li');
		}

		if(document.getElementById('navbar-search').value == ""){
			
			if(hasClass(searchButton, 'open')){
				searchButton.style.overflow = "hidden";
			} 
			toggleClass(searchButton, 'open');
			return true
		}
		
		// Handle Loading Search Page.

	});

	function handleJson(data){
		var data = JSON.parse(data)
		console.log(data)
		if(data.appendScroller){

		}
	}
}