function Parallax(scrollers, imageshift) {

	// Ah the joys of OOP in JavaScipt, let's consider this construct function.
	self = this
	this.scrollers = [];
	this.imageshift = imageshift; // 500 (px) Suggested (TEMP POSITING BUGFIX)
	this.tileHeight = 0
	for (scroller in scrollers) {
		var element = document.getElementById(scrollers[scroller]);
		this.scrollers.push({'self':element, 'prior':element.parentNode.previousElementSibling,'next':element.parentNode.nextElementSibling});
		var height = element.parentNode.clientHeight
		if(height > this.tileHeight){
			this.tileHeight = height
		}
		element.style.webkitTransform = "translate3d(0px, 0px, 0px)";
	}
}

Parallax.prototype.start =  function()
{	
		window.addEventListener('scroll', function (e) {self.mapParallax(e,0);})
} 

Parallax.prototype.scrollers =  function()
{
	return this.scrollers
} 

Parallax.prototype.translateParallax = function(scrollers, useComputered, direction){
	
	// Let's do some math's and style updates and let CSS do the rest.

	for (scroller in scrollers){

		if (useComputered){
			var viewportTop = pageYOffset
			var documentTranslate = Math.abs(window.getComputedStyle(document.body).getPropertyCSSValue('-webkit-transform')[0][5].cssText)
			if(direction){
				viewportTop -= documentTranslate
			} else {
				viewportTop += documentTranslate
			}
		} else {
			var viewportTop = pageYOffset;
		}
		
		var offset = scrollers[scroller].self.offsetTop
		var viewportBottom = window.innerHeight + viewportTop;
		
		var tileHeight = this.tileHeight
        if (offset <= viewportBottom+10 && offset + tileHeight >= viewportTop-10){
        	var priorContent = scrollers[scroller].self
        	var set = Math.round((viewportTop - offset - this.imageshift) * .5)
           	scrollers[scroller].self.style.webkitTransform = "translate3d(0px, " + set +"px, 0px)";
        } 
    }
}

Parallax.prototype.mapParallax = function(e, useComputered, direction) {
	// Function here to allow me to choice which scrollers to map.
    this.translateParallax(this.scrollers, useComputered, direction);
}

Parallax.prototype.addScroller = function(content, id) {
	// Function here to allow me to choice which scrollers to map.
    this.translateParallax(this.scrollers, useComputered);
}