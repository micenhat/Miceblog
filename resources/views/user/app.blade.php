<!DOCTYPE html>
<html lang="en">

<head>

    @include('user/layouts/head')

</head>

<body style="background-color: #eeeeee;">

    <!-- Navigation -->
          @include('user/layouts/header')

    <!-- Page Content -->
          @yield('main-content')

            <!-- Blog Sidebar Widgets Column -->
          @include('user/layouts/category')

        <!-- Footer -->

          @include('user/layouts/footer')

</body>

</html>
