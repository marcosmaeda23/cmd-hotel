var mySlider;	// A reference to the SliderWall instance.
var err;
// Initialize the slider.
$(document).ready(function() {
	try {
		// imageSlideshow is the id of the <div> tag that will contain the SliderWall instance.
		$("#imageSlideshow").sliderWallBullets({
			// general options
			cssClassSuffix: "",
			domainKeys: "",
			imageAlign: "middleCenter", /* topLeft, topCenter, topRight, middleLeft, middleCenter (default), middleRight, bottomLeft, bottomCenter, bottomRight */
			imageScaleMode: "scaleCrop", /* scale, scaleCrop (default), crop, stretch */
			loopContent: true,
			rssFeed: null,
			selectableContent: true,

			// slideshow options
			autoSlideShow: false,
			slideShowSpeed: 6,

			// timer control options
			showTimer: true,
			timerPosition: "belowControlBar", /* aboveControlBar, belowControlBar (default) */

			// control bar options
			autoHideControlBar: true,
			controlsHideDelay: 5,
			controlsShowHideSpeed: 0.2,
			showControlBar: true,

			// navigation options
			autoHideNavButtons: true,
			showNavigationButtons: true,

			// text options
			autoHideText: true,

			// interaction options
			useGestures: true,
			useKeyboard: true,
			useMouseScroll: true,
			pauseOnMouseOver: false,
			disableAutohideOnMouseOver: false,

			// transitions
			transitionType: {
				optimizeForIpad: false,  /* If set to true, it would use only the Alpha and Slide effects. */
				random: false,
				transitions: [
					/*
					Possible transitions: Alpha, AlphaBars, BrightSquares, Disc, FlipBars, Iris, LensGlare, None, Slide, SquareFade, SquareLight, Stripes, Waves, WaveScale, Wavy
					Possible tween types: Back, Bounce, Circ, Cubic, Elastic, Expo (default), Quad, Quart, Quint, Sine
					Possible easing types: easeIn, easeOut, easeInOut
					*/
					{
						name: "Alpha",
						duration: 0.75,
						tweenType: "Expo",
						easing: "easeInOut"
					},
					{
						name: "AlphaBars",
						duration: 1,
						tweenType: "Expo",
						easing: "easeOut",
						direction: "l2r",
						random: false,
						barWidth: 50
					},
					{
						name: "BrightSquares",
						duration: 1,
						tweenType: "Expo",
						easing: "easeOut",
						direction: "tl2br",
						random: false,
						tileWidth: 100,
						tileHeight: 100
					},
					{
						name: "Disc",
						duration: 1,
						tweenType: "Expo",
						easing: "easeInOut"
					},
					{
						name: "FlipBars",
						duration: 1,
						tweenType: "Expo",
						easing: "easeOut",
						direction: "l2r",
						random: false,
						barWidth: 80
					},
					{
						name: "Iris",
						duration: 1,
						tweenType: "Expo",
						easing: "easeInOut"
					},
					{
						name: "LensGlare",
						duration: 1,
						tweenType: "Expo",
						easing: "easeOut",
						gradientWidth: 100,
						margins: 20,
						lightOffset: 0,
						lightDirection: false
					},
					/*
					{
					name: "None" //This is the setting if you don't want to apply any transition effects.
					},
					*/
					{
						name: "Slide",
						duration: 0.75,
						tweenType: "Expo",
						easing: "easeInOut",
						direction: "horizontal"
					},
					{
						name: "SquareFade",
						duration: 1.5,
						tweenType: "Expo",
						easing: "easeOut",
						direction: "tl2br",
						random: false,
						tileWidth: 100,
						tileHeight: 100
					},
					{
						name: "SquareLight",
						duration: 1,
						tweenType: "Expo",
						easing: "easeOut",
						direction: "tl2br",
						random: false,
						tileWidth: 100,
						tileHeight: 100
					},
					{
						name: "Stripes",
						duration: 1.5,
						tweenType: "Expo",
						easing: "easeInOut",
						direction: "l2r",
						random: false,
						barWidth: 50
					},
					{
						name: "Waves",
						duration: 1,
						tweenType: "Expo",
						easing: "easeIn",
						direction: "l2r",
						random: false,
						barWidth: 60
					},
					{
						name: "WaveScale",
						duration: 1.5,
						tweenType: "Expo",
						easing: "easeOut",
						maxWidth: 100
					},
					{
						name: "Wavy",
						duration: 1,
						tweenType: "Expo",
						easing: "easeOut",
						direction: "l2r",
						random: false,
						barWidth: 60
					}
				]
			},

			// callback functions
			init: null,
			contentLoadStart: null,
			contentLoadComplete: null,
			contentLoadError: null,
			contentShow: null,
			contentHide: null,
			slideClick: null,
			slideshowStart: null,
			slideshowStop: null,
			pageChange: null
		});

		// This is how you get a reference to the SliderWall object to call
		// SliderWall methods (mySlider.next(), mySlider.getSelectedIndex()).
		mySlider = $("#imageSlideshow").data("sliderWall");

	} catch(err) { /* handle any error messages */ }
});
