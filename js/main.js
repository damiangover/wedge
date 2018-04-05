(function($) {
    var isHoverEnabled = true;

    function getViewportWidth () {
        return $(window).width() / parseFloat($("body").css("font-size"));
    }

    $(document).ready(function () {

        var focusTile = function () {
            $(this).children(".front--tile-excerpt").toggleClass("show");
            $(this).children(".front--tile-header").toggleClass("move")
            $(this).find(".front--tile-header > span").toggleClass("light");
            $(this).toggleClass("white");
        }

        var pinkBorderToParent = function() {
            var n = $(".white").length;

            if (n > 0) {
                $(this).parent().removeClass("lift-colour");
                $(this).not($(".white")).parent().addClass("lift-colour");
            } else {
                $(this).parent().addClass("lift-colour");
            }
        }

        window.addEventListener("beforeunload", function () {
            $("main").addClass("animate-out");
        });

        setTimeout(function () {
            $('#pre').addClass('loaded');
        }, 5000);

        $('#post').addClass('loading');

        $(".front--tile").on("click", focusTile);
        $(".front--tile").on("click", pinkBorderToParent);        
        $(".front--tile").on("mouseenter", pinkBorderToParent);
    });

}(jQuery, window));