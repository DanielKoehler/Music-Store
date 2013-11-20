function Parallax(scrollers, imageshift) {

	// Ah the joys of OOP in JavaScipt, let's consider this construct function.

	this.scrollers = [];
	self = this

	for (scroller in scrollers) {
		var element = document.getElementById(scrollers[scroller]);
		this.scrollers.push({'self':element, 'prior':element.parentNode.previousElementSibling,'next':element.parentNode.nextElementSibling});
	}

	this.imageshift = imageshift; // 200 (px) Suggested
}

Parallax.prototype.start =  function()
{	
		window.addEventListener('scroll', function (e) {self.mapParallax(e);})
		window.addEventListener('resize', function (e) {document.getElementById('full-height').style.height = (window.innerHeight - 100) + "px";})
} 

Parallax.prototype.scrollers =  function()
{
	return this.scrollers
} 

Parallax.prototype.translateParallax = function(scrollers){
	
	// Let's do some math's and style updates and let CSS do the rest.

	for (scroller in scrollers){

		var offset = scrollers[scroller].self.offsetTop
		var viewportTop = document.body.scrollTop;
		var halfWindowHeight = window.innerHeight / 2
		var viewportBottom = window.innerHeight + viewportTop;
		var priorContent = scrollers[scroller].self

        if (scrollers[scroller].self.offsetTop <= viewportBottom){
           	scrollers[scroller].self.style.webkitTransform = "translate3d(0px, " + Math.round((viewportTop - offset - this.imageshift) * .5) +"px, 0px)";
        }
    }
}

Parallax.prototype.mapParallax = function(e) {
	// Function here to allow me to choice which scrollers to map.
	
    this.translateParallax(this.scrollers);
}