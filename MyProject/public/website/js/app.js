$(document).ready(() => {
    $("#hamburger-menu").click(() => {
        $("#hamburger-menu").toggleClass("active");
        $("#nav-menu").toggleClass("active");
    });

    $(".chair__link--active").click(function () {
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
        } else {
            $(".active").removeClass("active");
            $(this).addClass("active");
        }
    });

    // setting owl carousel

    let navText = [
        "<i class='bx bx-chevron-left'></i>",
        "<i class='bx bx-chevron-right'></i>",
    ];

    $("#hero-carousel").owlCarousel({
        items: 1,
        dots: false,
        loop: true,
        nav: true,
        navText: navText,
        autoplay: true,
        autoplayHoverPause: true,
    });

    $("#top-movies-slide").owlCarousel({
        items: 2,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        responsive: {
            500: {
                items: 3,
            },
            1280: {
                items: 4,
            },
            1600: {
                items: 6,
            },
        },
    });

    $(".movies-slide").owlCarousel({
        items: 2,
        dots: false,
        nav: true,
        navText: navText,
        margin: 15,
        responsive: {
            500: {
                items: 2,
            },
            1280: {
                items: 4,
            },
            1600: {
                items: 6,
            },
        },
    });
});
const userInfo = document.querySelector(".user-info");
const dropdownList = document.querySelector(".dropdown-info-list");

userInfo.addEventListener("click", function () {
    userInfo.classList.toggle("open-icon");
    dropdownList.classList.toggle("open-dropdown");
});
// document.addEventListener("click", function (event) {
//     if (event.target.closest(".dropdown-info-list")) return;
//     dropdownList.classList.remove("open-dropdown");
// });
