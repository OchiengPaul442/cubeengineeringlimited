// navbar
function navBar() {
    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 90) {
            $(".nav-bar").addClass("nav-sticky");
            $(".carousel, .page-header").css("margin-top", "73px");
        } else {
            $(".nav-bar").removeClass("nav-sticky");
            $(".carousel, .page-header").css("margin-top", "0");
        }
    });
    // add active to tab when click
    $(".nav-item").each(function () {
        $(this).click(function () {
            $(".nav-item").removeClass("active");
            $(this).addClass("active");
            // return false;
        });
    });
    $(".carousel-caption a").click(function () {
        $(".nav-item").removeClass("active");
        $(".nav-item").eq(1).addClass("active");
    });

    // open mobile menu
    $(".navbar-toggler").click(function () {
        $(".navbar-collapse").slideDown(200);
    });
}

// jQuery counterUp
function counterUp() {
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000,
    });
}

//more about us
function about() {
    $(".tabLink").each(function () {
        $(this).click(function () {
            tabeId = $(this).attr("id");
            $(".tabLink").removeClass("activeLink");
            $(this).addClass("activeLink");
            $(".tabcontent").addClass("hide");
            $("#" + tabeId + "-1").removeClass("hide");
            return false;
        });
    });
}

// timeline section
function timeline() {
    $(".timeline-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        margin: 30,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>',
        ],
        responsive: {
            0: {
                items: 1,
            },
            576: {
                items: 1,
            },
            768: {
                items: 2,
            },
            992: {
                items: 3,
            },
        },
    });
}

// Testimonials section
function testimonials() {
    // Testimonial Slider
    $(".testimonial-slider").slick({
        infinite: true,
        autoplay: true,
        arrows: false,
        dots: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: ".testimonial-slider-nav",
    });
    $(".testimonial-slider-nav").slick({
        arrows: false,
        dots: false,
        focusOnSelect: true,
        centerMode: true,
        centerPadding: "22px",
        slidesToShow: 3,
        asNavFor: ".testimonial-slider",
    });
    $(".testimonial .slider-nav").css({
        position: "relative",
        height: "160px",
    });

    $(".timeline-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        loop: true,
    });
}

// form validations using ajax
function validation() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#contact-form").on("submit", function (e) {
        // prevent default form submit
        e.preventDefault();
        $(".message-block").text("");
        // get form data
        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var message = $("#message").val();
        // send ajax request
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            dataType: "json",
            data: {
                name: name,
                email: email,
                subject: subject,
                message: message,
            },
            success: function (response) {
                // clear form
                $("#contact-form")[0].reset();
                $(".success-message").text(response.success);
                $(".fail-message").text(response.error);
                $("#notification").modal("show");
                setTimeout(function () {
                    $("#notification").modal("hide");
                }, 3500);
            },
            error: function (response) {
                // get error messages
                $.each(response.responseJSON.errors, function (key, value) {
                    $("." + key + "_error").text(value);
                });
            },
        });
    });
}

$(document).ready(function () {
    // Initiate the wowjs
    wow = new WOW({
        animateClass: "animated", // default
        offset: 0, // default
        mobile: false, // default
        live: true, // default
    });
    wow.init();

    $(window).scrollTop(0);

    $(".innerpoint").show();

    // Complete page is fully loaded, including all frames, objects and images
    setTimeout(function () {
        $("body").addClass("loaded");
        $(".innerpoint").hide();
    }, 3000);

    // close mobile menu when click outside
    $(document).mouseup(function (e) {
        var container = $(".nav-bar");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $(".navbar-collapse").slideUp(200);
        }
    });

    // scroll to top when click back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });

    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });

    $(".floating-call-btn").hide();
    /* floating call button show on scoll*/
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) {
            $(".floating-call-btn").fadeIn();
        } else {
            $(".floating-call-btn").fadeOut();
        }
    });

    // call functions
    navBar();
    about();
    timeline();
    testimonials();
    counterUp();
    validation();
});
