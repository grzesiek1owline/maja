// TODO: SLIDER

let tempSlideType;

jQuery('.js-prod-slider').on('init', function(event, slick){
	let dat = jQuery((slick.$slides)[0]).data('type');
	jQuery('.js-short-info').addClass(dat);
	tempSlideType = dat;
});

jQuery('.js-prod-slider').slick({
	dots: true,
	arrows: true,
	infinite: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	prevArrow: jQuery('.js-arrow-prev'),
	nextArrow: jQuery('.js-arrow-next'),
	speed: 500,
  fade: true,
  cssEase: 'linear',
	appendDots: jQuery('.custom-paging'),
	customPaging: function customPaging(slider, i) {
		return '<span>0' + (i + 1) + '</span>';
	}
});

jQuery('.js-prod-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
	const dat = jQuery(slick.$slides.get(nextSlide)).data('type');
	console.log('dat ' + dat + ', temp ' + tempSlideType);
	if(tempSlideType == dat) {
		return false;
	}

	jQuery('.js-short-info').hide();
	jQuery('.js-short-info').removeClass('bg');
	jQuery('.js-short-info').removeClass('bg-duo');

	setTimeout(function() {
		jQuery('.js-short-info').show();
    jQuery('.js-short-info').addClass(dat);
	}, 200);
	tempSlideType = dat;
});

jQuery('.js-variations').slick({
	dots: true,
	arrows: true,
	infinite: true,
	slidesToShow: 6,
	slidesToScroll: 1,
	adaptiveHeight: false,
	autoplay: true,
	autoplaySpeed: 2000,
	prevArrow: jQuery('.js-arrow-prev-var'),
	nextArrow: jQuery('.js-arrow-next-var'),
	speed: 500,
	appendDots: jQuery('.js-var-custom-paging'),
	responsive: [{
			breakpoint: 1024,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 3,
			}
		},
		{
			breakpoint: 768,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		}
	],
	customPaging: function customPaging(slider, i) {
		return '<span>0' + (i + 1) + '</span>';
	}
});

jQuery('.js-var').click(function (event) {
	event.preventDefault();
	const url = jQuery(this).attr('href');

	jQuery('.js-var-popup-img').attr('src', url);
	jQuery('.js-var-popup').fadeIn(300);
})

jQuery('.js-zoom').click(function (event) {
	event.preventDefault();
	const url = jQuery(this).attr('data-magnify-src');
	const windowW = jQuery(window).width();

	if (windowW < 992) {
		jQuery('.js-var-popup-img').attr('src', url);
		jQuery('.js-var-popup').fadeIn(300);
	}
})

jQuery('.js-variations-close-popup').click(function () {
	jQuery('.js-var-popup').fadeOut();
})

jQuery('.js-product-open-popup').click(function () {
	jQuery(this).next('.js-product-popup').fadeIn(300);
})

jQuery('.js-product-close-popup').click(function () {
	jQuery('.js-product-popup').fadeOut();
})

function magnify(imgID, zoom) {
	var img, glass, w, h, bw;
	img = document.querySelector(imgID);

	/* Create magnifier glass: */
	glass = document.createElement("DIV");
	glass.setAttribute("class", "img-magnifier-glass");

	/* Insert magnifier glass: */
	img.parentElement.insertBefore(glass, img);

	/* Set background properties for the magnifier glass: */
	glass.style.backgroundImage = "url('" + img.src + "')";
	glass.style.backgroundRepeat = "no-repeat";
	glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
	bw = 3;
	w = glass.offsetWidth / 2;
	h = glass.offsetHeight / 2;

	/* Execute a function when someone moves the magnifier glass over the image: */
	glass.addEventListener("mousemove", moveMagnifier);
	img.addEventListener("mousemove", moveMagnifier);

	/*and also for touch screens:*/
	glass.addEventListener("touchmove", moveMagnifier);
	img.addEventListener("touchmove", moveMagnifier);

	function moveMagnifier(e) {
		var pos, x, y;
		/* Prevent any other actions that may occur when moving over the image */
		e.preventDefault();
		/* Get the cursor's x and y positions: */
		pos = getCursorPos(e);
		x = pos.x;
		y = pos.y;
		/* Prevent the magnifier glass from being positioned outside the image: */
		if (x > img.width - (w / zoom)) {
			x = img.width - (w / zoom);
		}
		if (x < w / zoom) {
			x = w / zoom;
		}
		if (y > img.height - (h / zoom)) {
			y = img.height - (h / zoom);
		}
		if (y < h / zoom) {
			y = h / zoom;
		}
		/* Set the position of the magnifier glass: */
		glass.style.left = (x - w) + "px";
		glass.style.top = (y - h) + "px";
		/* Display what the magnifier glass "sees": */
		glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
	}

	function getCursorPos(e) {
		var a, x = 0,
			y = 0;
		e = e || window.event;
		/* Get the x and y positions of the image: */
		a = img.getBoundingClientRect();
		/* Calculate the cursor's x and y coordinates, relative to the image: */
		x = e.pageX - a.left;
		y = e.pageY - a.top;
		/* Consider any page scrolling: */
		x = x - window.pageXOffset;
		y = y - window.pageYOffset;
		return {
			x: x,
			y: y
		};
	}
}

jQuery(document).ready(function () {
	jQuery('.js-zoom').each(function () {
		let big = jQuery(this).attr('data-magnify-src');
		let url = jQuery(this).attr('src');
		const windowW = jQuery(window).width();

		if (big != url && windowW > 992) {
			jQuery(this).parent().zoom({
				url: big
			});
		}
	})
});


// Remove old gallery plugin
jQuery.fn.lightGallery = false;
