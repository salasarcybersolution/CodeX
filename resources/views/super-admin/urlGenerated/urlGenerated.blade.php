@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}} /</span> {{$subtitle}}
    <div style="float: right;margin-top: -10px;">
      <button class="dt-button btn btn-primary" type="button"  onclick="addNewSubscriptionPlans()">
        <span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
      </button>
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
  <div class="card-datatable table-responsive">
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
            <?php $i=0;
             $status =  array('1' =>'Active','0'=>'Deactive');   
             foreach ($list as $value) { $i++; ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->email}}</td>
                <td>{{$value->create_date}}</td>
                <td>
                 <a href="javascript:void(0);"  onclick="viewGeneratedURL('{{$value->generator_token}}')"><i class="bx bx-shape-circle"></i></a>
                 <a href="javascript:void(0);" style="color: red" onclick="deleteGeneratedURL('{{$value->generated_url_id}}')"><i class="bx bxs-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
         
    </table>
  </div>
</div>



<!-- Add From -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
    <div class="offcanvas-header border-bottom">
      <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Generated URL</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
      <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('Components/urlGeneratedProcess')}}" method="POST">
      
      <div class="col-sm-12 mt-3">
        <label class="form-label" for="name">Name</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='bx bxs-detail'></i></span>
          <input type="text" id="name" name="name" class="form-control dt-post" placeholder="Name" />
        </div>
        <p class="error" id="err_name"></p>
      </div>

      <div class="col-sm-12 mt-0">
        <label class="form-label" for="email">Email</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='bx bxs-envelope'></i></span>
          <input type="text" id="email" name="email" class="form-control dt-post" placeholder="Email" />
        </div>
        <p class="error" id="err_email"></p>
      </div>
      
       
      <div class="col-sm-12 mt-4" style="text-align: center;">
        <button type="button" class="btn btn-primary mb-2 w-100" onclick="generatedURLProcess()" id="submiteAdminButtons_g">Submit</button>
        <button type="reset" class="btn btn-secondary mb-2 w-100" data-bs-dismiss="offcanvas" id="c_submiteAdminButtons_g">Cancel</button>

        <button type="button" class="btn btn-primary w-100" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
        <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
      </div>
    </form>
    </div>
  </div>
 

<!-- View Detail -->
  <div class="modal fade" id="viewGeneratedURLModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Registration Url</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                      <div class="col-lg mb-md-0 mb-4">
                        <input type="text" id="v_generated_url" name="v_generated_url" class="form-control dt-post" />
                      </div>      
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" onclick="copyToClipboard()">Copy</button>
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

</div>
<!--/ Content -->
@endsection