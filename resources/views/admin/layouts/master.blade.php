<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <!-- base:css -->
  @include('admin.layouts.inc.styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

  @stack('css')
</head>
<body>
 
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layouts.inc.navber')
    <!-- partial -->
    
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <div id="right-sidebar" class="settings-panel">
       
        
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layouts.inc.sidebar')
      <!-- partial -->
      <div class="main-panel">
        @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.layouts.inc.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
@include('admin.layouts.inc.scripts');
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
<script>
    toastr.options = {
        'progressBar': true,
        'closeButton': true,
        'timeout': 120000, // Adjust the timeout as needed
    };
    toastr.success("{{ Session::get('success') }}", 'Success!');
</script>
@elseif (Session::has('error'))
<script>
    toastr.options = {
        'progressBar': true,
        'closeButton': true,
        'timeout': 120000, // Adjust the timeout as needed
    };
    toastr.error("{{ Session::get('error') }}", 'Error!');
</script>
@endif
  <!-- End custom js for this page-->
  @stack('js')
</body>

</html>

