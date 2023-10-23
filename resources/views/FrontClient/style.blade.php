<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Eflyer</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->

    <link rel="stylesheet" type="text/css" href="{{ asset('Client/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/css/style.css')}}">
    <!-- Responsive-->
    <link rel="stylesheet" type="text/css" href="{{ asset('Client/css/responsive.css')}}">

    <!-- fevicon -->
    <link rel="icon" href="{{ asset('Client/images/fevicon.png" type="image/gif')}}" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"  href="{{ asset('Client/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- Tweaks for older IEs-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Client/css/owl.carousel.min.css')}}">
    <link rel="stylesoeet" href="{{ asset('Client/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
</head>
<script src="{{ asset('Client/js/jquery.min.js') }}"></script>
<script src="{{ asset('Client/js/popper.min.js') }}"></script>
<script src="{{ asset('Client/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Client/js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('Client/js/plugin.js') }}"></script>
<!-- sidebar -->
<script src="{{ asset('Client/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('Client/js/custom.js') }}"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const participateButton = document.getElementById('participateButton');
        const bidNowButton = document.getElementById('bidNowButton');
        const participateForm = document.getElementById('participateForm');
        const bidForm = document.getElementById('bidForm');
        const bidAmountInput = document.getElementById('bidAmount');

        participateForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Simulate participation here, you can replace this with your actual logic
            simulateParticipation().then(() => {
                participateForm.style.display = "none";
                bidForm.style.display = "block";
            });
        });

        bidForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const bidAmount = bidAmountInput.value;
            // Handle bid submission here (you need to implement this logic)
            simulateBid(bidAmount).then(() => {
                alert('Bid placed successfully.');
            });
        });

        // Simulate participation (replace this with your actual logic)
        function simulateParticipation() {
            return new Promise((resolve) => {
                setTimeout(resolve, 2000); // Simulate a delay (replace with your actual logic)
            });
        }

        // Simulate bid submission (replace this with your actual logic)
        function simulateBid(bidAmount) {
            return new Promise((resolve) => {
                setTimeout(resolve, 2000); // Simulate a delay (replace with your actual logic)
            });
        }
    });
</script>

