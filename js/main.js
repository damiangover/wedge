(function($) {
    window.addEventListener("beforeunload", function () {
        $("main").addClass("animate-out");
    });

    $(document).ready(function () {
        setTimeout(function () {
            $('#pre').addClass('loaded');
        }, 5000);

        $('#post').addClass('loading');

        $(".front--tile").hover(function () {
            $(this).children(".front--tile-excerpt").toggleClass("show");
            $(this).children("header").toggleClass("link");
        });
    });
}(jQuery));