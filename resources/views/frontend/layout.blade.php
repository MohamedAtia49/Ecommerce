<!-- /*
* Bootstrap 5
* Template Name: Furni
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    @include('partials.head')
    <title>@yield('title')</title>
    @include('partials.styles')
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('partials.nav')
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    @include('partials.hero-section')
    <!-- End Hero Section -->



    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            @yield('content')
        </div>
    </div>


    <!-- Start Footer Section -->
    @include('partials.footer')
    <!-- End Footer Section -->


    @include('partials.scripts')
</body>

</html>
