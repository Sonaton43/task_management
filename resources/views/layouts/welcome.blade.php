<!-- ======= Hrader Start ======= -->
@include('layouts.header')
<!-- =======  Hrader End  ======= -->

    <!-- ======= Navbar Start ======= -->
    @include('layouts.navbar')
    <!-- =======  Navbar End  ======= -->

    <!-- ======= Sidebar Start ======= -->
    @include('layouts.sidebar')
    <!-- =======  Sidebar End  ======= -->

  

  

  <main id="main" class="main">
      @yield('section')
  </main><!-- End #main -->

  <!-- ======= Sidebar Start ======= -->
  @include('layouts.footer')
  <!-- =======  Sidebar End  ======= -->

<!-- ======= Sidebar Start ======= -->
@include('layouts.script')
<!-- =======  Sidebar End  ======= -->

