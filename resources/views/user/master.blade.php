<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MultiShop - Online Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="{{ asset('users/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('users/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('users/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3  .1/jquery.min.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('users/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    @include('user.includes.header')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('user.includes.sidebar')

    <!-- Navbar End -->


    <!-- Carousel Start -->

    <!-- Carousel End -->


    <!-- Featured Start -->

    <!-- Featured End -->


    @yield('content')


    <!-- Vendor Start -->

    <!-- Vendor End -->


    <!-- Footer Start -->
    @include('user.includes.footer')
    <!-- Footer End -->


    <!-- Back to Top -->


    <!-- JavaScript Libraries -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('users/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('users/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('users/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('users/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('users/js/main.js') }}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript">

        let url = "{{ route('changeLang') }}";

        $(".changeLang").change(function() {
            console.log(1)
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script> --}}
    @yield('scripts')
</body>

</html>
