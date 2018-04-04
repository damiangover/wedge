window.addEventListener("beforeunload", function () {
    console.log("Calling animate out");
    $("main").addClass("animate-out");
});

$(document).ready(function() {
    setTimeout(function(){
        $('#pre').addClass('loaded');
    }, 5000);

    $('#post').addClass('loading');
});