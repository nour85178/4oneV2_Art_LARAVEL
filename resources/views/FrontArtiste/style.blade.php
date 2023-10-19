<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Art Quest</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Amaranth&display=swap') }}">
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Alata&display=swap') }}">


    <script src="{{ asset('js/jquery-2.1.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>



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
