@include('admin.adminlayout.header')
  <!-- [ Main Content ] start -->
  <div class="pc-container">
    <div class="pc-content">
      <!-- [ breadcrumb ] start -->
      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="../">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">@stack('sitemap')</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- [ breadcrumb ] end -->
      <!-- [ Main Content ] start -->
      <section>
        @yield('main-content')
      </section>
    </div>
  </div>
  <!-- [ Main Content ] end -->
@include('admin.adminlayout.footer')