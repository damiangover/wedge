<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
<script type="text/javascript" src="//cdn.rawgit.com/icons8/bower-webicon/v0.10.7/jquery-webicon.min.js"></script>
<script src="js/main.js"></script>

<!--<script>-->
<!--    window.ga = function () {-->
<!--        ga.q.push(arguments)-->
<!--    };-->
<!--    ga.q = [];-->
<!--    ga.l = +new Date;-->
<!--    ga('create', 'UA-XXXXX-Y', 'auto');-->
<!--    ga('send', 'pageview')-->
<!--</script>-->
<!--<script src="https://www.google-analytics.com/analytics.js" async defer></script>-->
<script>
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
</script>

<?php wp_footer() ?>

</div>
</body>
</html>