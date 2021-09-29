@extends('admin')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
@endpush
@section('content')

  <!-- BEGIN: Content-->
  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
        <section id="dashboard-ecommerce">
        <div class="row">
           <h3>Dashboard</h3>
        </div>
       
       
        </section>
<!-- Dashboard Ecommerce ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    @endsection


    @push('js')
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.min.js') }}"></script>

    
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endpush