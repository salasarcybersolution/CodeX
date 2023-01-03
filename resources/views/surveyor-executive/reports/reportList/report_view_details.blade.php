@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}} /</span>
    <div style="float: right;margin-top: -10px;">
<!--       <button class="dt-button btn btn-primary" type="button"  onclick="addNewSubscriptionPlans()">
        <span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
      </button> -->
    </div>
  </h4>

 @if(Session::has('msg'))
   <div class="row flasMsg">
      <div class="col-md-12">
          <div class="alert alert-success alert-dismissible" role="alert">
              {{ Session::get('msg') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>      
  @endif  

  @if(Session::has('msg2'))
   <div class="row flasMsg">
      <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible" role="alert">
              {{ Session::get('msg2') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>      
  @endif  


<div class="card">
<!--   <div class="card-datatable table-responsive">
       <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Sno.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Generated Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                
                </td>
            </tr>
       
        </tbody>
         
    </table>
  </div> -->
</div>



<!-- Add From -->


</div>
<!--/ Content -->
@endsection