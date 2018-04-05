(function($) {
    window.addEventListener("beforeunload", function () {
        $("main").addClass("animate-out");
    });

    $(document).ready(function () {
        var focusTile = function () {
            $(this).children(".front--tile-excerpt").toggleClass("show");
            $(this).children(".front--tile-header").toggleClass("move")
            $(this).find(".front--tile-header > span").toggleClass("light");
            $(this).toggleClass("white");
        }

        window.addEventListener("beforeunload", function () {
            $("main").addClass("animate-out");
        });

        setTimeout(function () {
            $('#pre').addClass('loaded');
        }, 5000);

        $('#post').addClass('loading');
        $(".front--tile").on("click", focusTile);
    });

}(jQuery, window));