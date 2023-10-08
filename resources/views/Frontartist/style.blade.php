<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gal Art</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Amaranth&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>
<script type="text/javascript">


    $(document).ready(function(){
        /*****Fixed Menu******/
        var secondaryNav = $('.cd-secondary-nav'),
            secondaryNavTopPosition = secondaryNav.offset().top;
        navbar_height = document.querySelector('.navbar').offsetHeight;

        $(window).on('scroll', function(){
            if($(window).scrollTop() > secondaryNavTopPosition + navbar_height ) {
                secondaryNav.addClass('is-fixed');
                document.body.style.paddingTop = navbar_height + 'px';

            } else {
                secondaryNav.removeClass('is-fixed');
                document.body.style.paddingTop = '0'
            }
        });

    });
</script>
