$(document).ready(function () {
	
	$(window).scroll(function () {
		if ($(this).scrollTop() > 1) {
			$('header').addClass("sticky");
		}
		else {
			$('header').removeClass("sticky");
		}
	});
	
	$("#mob_open").click(function () {
		if ($('html').is(".show_mob_menu")) {
			$('.bar:nth-child(2)').removeClass('transparent');
			$('.bar:nth-child(1)').removeClass('rotate-top');
			$('.bar:nth-child(3)').removeClass('rotate-bottom');
			$("#accordian").removeClass("active_menu__");
			$('html').removeClass("show_mob_menu");
		} else {
			$('.bar:nth-child(2)').addClass('transparent');
			$('.bar:nth-child(1)').addClass('rotate-top');
			$('.bar:nth-child(3)').addClass('rotate-bottom');
			$("#accordian").addClass("active_menu__");
			$('html').addClass("show_mob_menu");
			$('html').removeClass("show_mob-contact");
		}
	});
	
	$(".mob-contact-btn").click(function () {
		if ($('html').is(".show_mob-contact")) {
			$('html').removeClass("show_mob-contact");
		} else {
			$('html').addClass("show_mob-contact");
			$('html').removeClass("show_mob_menu");
		}
		return false;
	});
	
	$("header li.menu-item-has-children > a").click(function () {
		if ($(window).width() < 961) {
			if ($(this).parent().is(".active")) {
				$(this).parent().removeClass("active");
			} else {
				$("header li.menu-item-has-children").removeClass("active");
				$(this).parent().addClass("active");
			}
			return false;
		}
	});
	
	$(document).mouseup(function (e) {
		var div = $("header li.menu-item-has-children > a");
		if (!div.is(e.target) && div.has(e.target).length === 0) {
			$("header li.menu-item-has-children").removeClass("active");
		}
	});
	
	$(".mob-contact-menu .close").click(function () {
		$('html').removeClass("show_mob-contact");
		return false;
	});
	
	$(".faq-title").click(function () {
		$('.faq-box').removeClass('active');
		$(this).parent().addClass('active');
	});
	
	if (typeof(Storage) !== "undefined") {
		boxSignUp = JSON.parse(sessionStorage.getItem('boxSignUp'));
		if (boxSignUp !== null && boxSignUp !== false) {
			$('body').removeClass("showBoxSignUp");
		} else {
			if ($('.alert-top-join').length > 0) {
				$('body').addClass("showBoxSignUp");
			}
		}
	}
	
	if ($('.alert-top-join').length > 0) {
		$('.alert-top-join .close, #mc4wp-form-1 input[type="submit"]').click(function () {
			if ($('.widget_mailchimpsf_widget').length > 0) {
				$('.widget_mailchimpsf_widget').hide();
			}
			$('body').removeClass("showBoxSignUp");
			sessionStorage.setItem('boxSignUp', true);
			return false;
		});
	} else {
		$('body').removeClass("showBoxSignUp");
	}
	
	if ($('.widget_mailchimpsf_widget').length > 0) {
		$('.widget_mailchimpsf_widget .widget-wrap').append('<button type="button" class="close" aria-label="Close"> <span aria-hidden="true">×</span> </button>');
		$(".mc4wp_show").click(function () {
			$('.widget_mailchimpsf_widget').show();
			return false;
		});
		$(".widget_mailchimpsf_widget .close").click(function () {
			$('.widget_mailchimpsf_widget').hide();
			return false;
		});
	}
	
});
