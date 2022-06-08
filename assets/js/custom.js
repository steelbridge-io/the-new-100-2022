/* Custom Javascript and jQuery
------------------------------------------------------- */

/* Animation for SideBar navigation
*
* Look in functions.php for the id="overlay" action that loads the id after <body>
* id="overlay" manages the click event, detected by an overlay, that triggers closeNav()
*
* */
var $ =jQuery.noConflict();

	function overlay(isShow) {
		var elm = document.getElementById('overlay')
		if (isShow) {
			elm.style.display = 'block';
		} else {
			elm.style.display = 'none';
		}
	}

	function openNav() {
		overlay(true);
		document.getElementById("bmbaSidenav").style.width = "550px";
	}

	function closeNav() {
		overlay(false);
		document.getElementById("bmbaSidenav").style.width = "0";

	}

	$(document).on('click', '[data-toggle="lightbox"]', function (event) {
		event.preventDefault();
		$(this).ekkoLightbox();
	});


	// Shrink nav on scroll and animate logo
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {

		if (window.innerWidth > 1200) {

			if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
				document.getElementById("genesis-nav-primary").style.padding = "0.3rem 1rem";
				document.getElementById("nav-brand-link").style.position = "absolute";
				document.getElementById("logo-svg-bmba").style.width = "142px";
				document.getElementById("logo-svg-bmba").style.height = "116px";
				document.getElementById("logo").style.width = "100px";
				document.getElementById("logo").style.height = "100px";
				document.getElementById("nav-brand-link").style.borderRadius = "0 0 50% 50%";

				// Get the Object by ID
				var a = document.getElementById("logo");
				// Get the SVG document inside the Object tag
				var svgDoc = a.contentDocument;
				// Get one of the SVG items by ID;
				var svgItem = svgDoc.getElementById("Layer_1");
				// Set the colour to something else
				svgItem.style.padding = "5px 0";

			} else if (document.body.scrollTop < 80 || document.documentElement.scrollTop < 80) {
				document.getElementById("genesis-nav-primary").style.padding = ".5rem 1rem";
				document.getElementById("nav-brand-link").style.top = "0px"
				document.getElementById("nav-brand-link").style.position = "relative";
				document.getElementById("logo").style.width = "70px";
				document.getElementById("logo").style.height = "auto";
				document.getElementById("logo-svg-bmba").style.width = "70px";
				document.getElementById("logo-svg-bmba").style.height = "auto";
				document.getElementById("nav-brand-link").style.borderRadius = "0";

				// Get the Object by ID
				var a = document.getElementById("logo");
				// Get the SVG document inside the Object tag
				var svgDoc = a.contentDocument;
				// Get one of the SVG items by ID;
				var svgItem = svgDoc.getElementById("Layer_1");
				// Set the colour to something else
				svgItem.style.padding = "0";
			}
		} else {
			'';
		}
	}

	$(window).resize(function () {

		if ($(window).width() < 1200) {

			document.getElementById("genesis-nav-primary").style.padding = ".5rem 1rem";
			document.getElementById("nav-brand-link").style.top = "0px"
			document.getElementById("nav-brand-link").style.position = "relative";
			document.getElementById("logo").style.width = "70px";
			document.getElementById("logo").style.height = "auto";
			document.getElementById("logo-svg-bmba").style.width = "70px";
			document.getElementById("logo-svg-bmba").style.height = "auto";
			document.getElementById("nav-brand-link").style.borderRadius = "0";

			// Get the Object by ID
			var a = document.getElementById("logo");
			// Get the SVG document inside the Object tag
			var svgDoc = a.contentDocument;
			// Get one of the SVG items by ID;
			var svgItem = svgDoc.getElementById("Layer_1");
			// Set the colour to something else
			svgItem.style.padding = "0";
		}

	});

	$(document).ready(function () {
		if ($(".give-btn-reveal").is(":visible")) {
			$(".give-select-fund-row").addClass("display-none");
		}

		$("button.give-btn-reveal").click(function () {
			$(".give-select-fund-row").removeClass("display-none");
		});
	});



