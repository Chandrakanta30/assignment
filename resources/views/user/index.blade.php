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
                  <h2 class="content-header-title float-left mb-0">User List</h2>
               </div>
            </div>
         </div>
      </div>
      @include('partials.message')
      <div class="content-body">
         <!-- Basic Tables start -->
         <div class="row" id="basic-table">
            <div class="col-12">


               <div class="card">
                  <div class="card-header">
                     <h4 class="card-title">All User</h4>
                  </div>
                  <div class="card-content">
                     <div class="card-body">
                        <!-- <p class="card-text">Using the most basic table Leanne Grahamup, here’s how <code>.table</code>-based tables look in Bootstrap. You can use any example of below table for your table and it can be use with any type of bootstrap tables.</p>
                           <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> -->
                        <!-- Table with outer spacing -->
                        <div class="table-responsive">
                           <table class="table table-striped mb-0">
                              <thead>
                                 <tr>
                                     <th>Student name</th>
                                     <th>Email name</th>
                                     
                                     <th>Action</th>
                                 </tr>
                              </thead>
                               <tbody>
                               @foreach($userslist as $user)
                               <tr>
                                     <td>{{$user->name}}</td>
                                     
                                     <td>{{$user->email}}</td>
                                     <td><a href="{{ route('user.edit', $user) }}" class="btn btn-circle btn-warning"><i
                                                   class="fa fa-pencil"></i></a>
                                           <a onclick="return confirm('Are you sure to delete?')"
                                              href="{{ route('user.destroy', $user->id) }}"
                                              class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a></td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>

                        {{ $userslist->links() }}
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Basic Tables end -->
      </div>
   </div>
</div>
<!-- END: Content-->
@endsection

@push('js')
<script>
$(document).ready(function () {
// on location select
    $('#select2-location').on('change', function() {
        
        $.ajax({
            type: "get",
            url: '/location/getbatches/'+this.value ,
            success: function (data) {
                let details=JSON.parse(data);
                console.log(data);
                var $mySelect = $('#select2-batch');
                $('#select2-batch').find('option').remove().end();
                var $option='';
                $option+="<option>Select option</option>";
                $.each(details.responce, function(key, value) {
                $option+= "<option value="+value.id+">"+value.batch_name+"</option>";
                });
                $mySelect.append($option);


        }
    })
});

$('#select2-batch').on('change', function() {
        
        $.ajax({
            type: "get",
            url: '/batch/stuents/'+this.value ,
            success: function (data) {
                let details=JSON.parse(data);
                console.log(data);
                var $mySelect = $('#select2-student');
                $('#select2-student').find('option').remove().end();
                var $option='';
                $option+="<option>Select option</option>";
                $.each(details.responce, function(key, value) {
                $option+= "<option value="+value.id+">"+value.name+"</option>";
                });
                $mySelect.append($option);


        }
    })
});



});

</script>
@endpush