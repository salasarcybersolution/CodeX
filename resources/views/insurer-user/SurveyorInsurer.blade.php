@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}}</span>
    <div style="float: right;margin-top: -10px;">
       <a href="{{url('surveyor/serveyorInsurerForm')}}"><button type="button" class="btn btn-primary">Add New Insurer</button></a>
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


<div class="card">
  <div class="card-datatable table-responsive">
       <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Sno.</th>
                <th>Insurer Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;
             $status =  array('1' =>'Active','0'=>'Deactive');   
             foreach ($insurers as $value) { $i++; ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$value->insurer}}</td>
                <td <?php if($value->status == '0'){ ?>class="text-danger"<?php } ?> >{{$status[$value->status]}}</td>
                <td>
                   <a href="javascript:void(0);" class="btn btn-sm btn-icon item-edit" onclick="editSubscriptionPlanInfo('{{$value->insurer_id}}')"><i class="bx bxs-edit"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
         
    </table>
  </div>
</div>



<!-- Add From -->
<!-- <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
    <div class="offcanvas-header border-bottom">
      <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Add New Subscription Plans </h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
      <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('Components/saveSubscriptionPlansInfo')}}" method="POST">
      <div class="col-sm-12 mt-4">
        <label class="form-label" for="subscription_type">Subscription Type</label>
        <div class="input-group input-group-merge">
          <span id="basicFullname2" class="input-group-text"><i class="bx bx-book-content"></i></span>
          <select class="form-control" id="subscription_type" name="subscription_type">
                <option value="">Select Subscription Type</option>
                <option value="Fixed">Fixed</option>
                <option value="Monthly">Monthly</option>
                <option value="Quarterly">Quarterly</option>
                <option value="Half Yearly">Half Yearly</option>
                <option value="Yearly">Yearly</option>
          </select>
           
        </div>
        <p class="error" id="err_subscription_type"></p>
      </div>

      <div class="col-sm-12">
        <label class="form-label" for="subscription_titles">No. of Users Allowed</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='bx bxs-user'></i></span>
          <input type="text" id="users_allowed" name="users_allowed" class="form-control dt-post" placeholder="Users Allowed" />
        </div>
        <p class="error" id="err_users_allowed"></p>
      </div>


      <div class="col-sm-12">
        <label class="form-label" for="subscription_titles">Subscription Titles </label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='bx bxs-detail'></i></span>
          <input type="text" id="subscription_titles" name="subscription_titles" class="form-control dt-post" placeholder="Subscription Titles" />
        </div>
        <p class="error" id="err_subscription_titles"></p>
      </div>
      
      <div class="col-sm-12">
        <label class="form-label" for="subscription_price">Subscription Price</label>
        <div class="input-group input-group-merge">
          <span id="basicSalary2" class="input-group-text"><i class='bx bx-dollar'></i></span>
          <input type="number" id="subscription_price" name="subscription_price" class="form-control onlyNumericKey" placeholder="Subscription Price" />
        </div>
        <p class="error onlynumeric" id="err_subscription_price"></p>
      </div>
      <div class="col-sm-12">
        <label class="form-label" for="subscription_description">Description</label>
        <div class="input-group input-group-merge">
          <textarea class="form-control" id="subscription_description" name="subscription_description" placeholder="Description"></textarea>
        </div>
        <p class="error" id="err_subscription_description"></p>
      </div>


      
      <div class="col-sm-12 mt-1" style="text-align: center;">
        <button type="button" class="btn btn-primary data-submit me-sm-3 me-1" onclick="saveSubscriptionPlansInfo()" id="submiteAdminButtons">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas" id="c_submiteAdminButtons">Cancel</button>

        <button type="button" class="btn btn-primary w-100" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
        <input type="hidden" value="add" id="process_type" name="process_type"/>
        <input type="hidden" value="" id="subscription_id" name="subscription_id"/>
        <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
      </div>
    </form>
    </div>
  </div> -->


<!-- View Detail -->
    

</div>
<!--/ Content -->
@endsection