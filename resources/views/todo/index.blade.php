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
                  <h2 class="content-header-title float-left mb-0">Todo List</h2>
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
                     <h4 class="card-title">All Todo</h4>
                  </div>
                  <div class="card-content">
                     <div class="card-body">
                        <div class="table-responsive">
                           <table class="table table-striped mb-0">
                              <thead>
                                 <tr>
                                     <th>User name</th>
                                     
                                     <th>Todo Name</th>
                                     <th>Action</th>
                                 </tr>
                              </thead>
                               <tbody>
                               @foreach($alltodo as $todo)
                               <tr>
                                     <td>{{$todo->user->name}}</td>
                                     
                                     <td>{{$todo->todo_name}}</td>
                                     <td><a href="{{ route('todo.edit', $todo) }}" class="btn btn-circle btn-warning"><i
                                                   class="fa fa-pencil"></i></a>
                                          <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-circle btn-success"><i
                                                   class="fa fa-eye"></i></a>
                                           <a onclick="return confirm('Are you sure to delete?')"
                                              href="{{ route('todo.destroy', $todo->id) }}"
                                              class="btn btn-circle btn-danger"><i class="fa fa-trash"></i></a></td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                        </div>

                        {{ $alltodo->links() }}
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