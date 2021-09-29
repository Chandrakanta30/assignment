@extends('admin')
@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
   <div class="content-overlay"></div>
   <div class="header-navbar-shadow"></div>
   <div class="content-wrapper">
      <div class="content-header row">
         <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
               <div class="col-12">
                  <h2 class="content-header-title float-left mb-0">Task</h2>
                  <div class="breadcrumb-wrapper col-12">
                     <ol class="breadcrumb">
                        <li class="breadcrumb-item active"> Task Details
                        </li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @include('partials.message')
      <div class="content-body">
         <!-- Bootstrap Select start -->
         <!-- Basic Select2 start -->
         <section class="basic-select2">
            <div class="row">
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title"> Task Details</h4>
                     </div>
                     <div class="card-content">
                        <div class="card-body">
                      
                              <div class="row">
                                 <div class="col-sm-6 col-12">
                                 <fieldset class="form-group">
                                    <div class="text-bold-600 font-medium-2 mb-2">
                                        Name
                                    </div>
                                    <div class="input-group">
                                    {{$todo->todo_name}}
                                    </div>
                                 </fieldset>
                                 </div>
                                
                                 <div class="col-sm-6 col-12">
                                 <fieldset class="form-group">
                                    <div class="text-bold-600 font-medium-2 mb-2">
                                        Expected Delivery Date
                                    </div>
                                    <div class="input-group">
                                    {{$todo->estimated_delivery_time}}
                                    </div>
                                 </fieldset>
                                 </div>


                                 <div class="col-sm-12 col-12">
                                    <fieldset class="form-group">
                                       <div class="text-bold-600 font-medium-2 mb-2">
                                          Description
                                       </div>
                                       <div class="input-group">
                                       {{$todo->description}}
                                       </div>
                                    </fieldset>
                                 </div>
                                
                                 <div class="col-sm-4 col-12">
                                    <fieldset class="form-group">
                                    <div class="text-bold-600 font-medium-2 mb-2">
                                          Attachments
                                       </div>
                                       <div class="input-group">
                                     
                                      @php
$images= json_decode($todo->attachments);
foreach($images as $Image){

echo "<a href='$Image' download target='_blank' class='btn btn-large pull-right'><i class='icon-download-alt'> </i> Download </a>";

}
                                       @endphp
                                       </div>
                                    </fieldset>
                                 </div>
                                 <div class="col-sm-4 col-12">
                                    <fieldset class="form-group">
                                    <div class="text-bold-600 font-medium-2 mb-2">
                                          User name
                                       </div>
                                       <div class="input-group">
                                       {{$todo->user->name}}
                                       
                                       </div>
                                    </fieldset>
                                 </div>
                        </div>
                     
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- Basic Select2 end -->
      </div>
   </div>
</div>
<!-- END: Content-->
@endsection
@push('js')
<script>
function myFunction() {
   $("#todoitems").append('<div class="col-sm-6 col-12"><fieldset class="form-group"><div class="input-group">   <input type="text" class="form-control" name="audio" id="book" placeholder="Start Time"></div></fieldset></div><div class="col-sm-4 col-12"><fieldset class="form-group"><div class="input-group"><input type="file" class="form-control" name="audio" id="book" placeholder="Start Time"> </div> </fieldset></div><div class="col-sm-2 col-12"><button type="button" class="btn btn-outline-primary" onclick="myFunction()"> <i data-feather="plus" class="me-25"></i><span>Add More</span> </button> </div>');
}
$(document).ready(function () {



});

</script>
@endpush