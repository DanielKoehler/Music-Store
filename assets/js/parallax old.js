function Parallax(scrollers, imageshift) {

	// Ah the joys of OOP in JavaScipt, let's consider this construct function.

	this.scrollers = [];
	self = this

	for (scroller in scrollers) {
		var element = document.getElementById(scrollers[scroller])
		this.scrollers.push({
			'self':element,
			'inital':{'y':element.offsetTop, 'x':0, 'height':element.parentNode.clientHeight}, 
			'previousElementSibling':element.parentNode.previousElementSibling,
			'nextElementSibling':element.parentNode.nextElementSibling
		});
	}

	this.windowHeight = window.innerHeight

	this.imageshift = imageshift // 200 (px) S uggested
}

Parallax.prototype.start =  function()
{	
		window.addEventListener('scroll', function (e) {self.mapParallax(e)})
}

Parallax.prototype.mapParallax = function(e) {
	// Function here to allow me to choice which scrollers to map.
	this.windowHeight = window.innerHeight
	// for (scroller in this.scrollers){
   		this.translateParallax(this.scrollers[0])
 	// }
}

Parallax.prototype.translateParallax = function(scroller){
	
	// Let's do some math's and style updates and let CSS do the rest.
	var windowHeight = this.windowHeight
	var tile = scroller.self.parentNode
	var	tileYOffset = tile.offsetTop - pageYOffset
	var pageBottomYOffset = pageYOffset + windowHeight
	var tileOuterSpace = windowHeight - scroller.inital.height
	// console.log(pageYOffset)
	// console.log(tileYOffset)
	// console.log(windowHeight)
	// console.log(pageBottomYOffset)
	// console.log(scroller.inital.height)
	var zeroCentre = tileYOffset - pageYOffset + tileOuterSpace + (tileOuterSpace / 2)
    if (tileYOffset <= pageBottomYOffset){ // At least above bottom of page
   		// console.log()
   		// scroller.nextElementSibling.style.webkitTransform = "translate3d(0px, " + 0 +"px, 0px)"
   		if(zeroCentre < windowHeight/2 ){
   			tile.style.height = scroller.inital.height + (-zeroCentre / 2) + "px"
   		} 
    	tile.style.webkitTransform = "translate3d(0px, " + 0 +"px, 0px)"
    }	
}