@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div style="float: right;margin-top: -10px;">
     <button class="dt-button btn btn-primary" type="button"  onclick="addNewUserSurveyor({{$survey_info_id}})">
        <span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New User</span></span>
      </button>
  </div>
  
  <div class="row mb-2">
    <div class="col-md-6">
     <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-style1">
       <li class="breadcrumb-item">
        <a href="#">User List</a>
      </li>
      <li class="breadcrumb-item active">List</li>
    </ol>
  </nav>
</div>
</div> 


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
        <th>S No.</th>
        <th>Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=0;
      $status =  array('1' =>'Active','0'=>'Deactive');   
      foreach ($Users as $value) { $i++; //echo "<pre>"; print_r($value->id); ?>
      <tr>
        <td>{{$i}}</td>
        <td>{{$value->first_name}} {{$value->last_name}}</td>
        <td>{{$value->user_name}}</td>
        <td>{{$value->email}}</td>
        <td>{{$value->phone_no}}</td>
        <td <?php if($value->status == '0'){ ?>class="text-danger"<?php } ?> >{{$status[$value->status]}}</td>
        <td>
         
      </td>
     </tr>
   <?php } ?>
 </tbody>
</table> 
</div>
</div>

<!-- Add user  -->
<!-- Add From -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="addNewUserSurveyor" aria-labelledby="offcanvasBackdropLabel">
    <div class="offcanvas-header border-bottom">
      <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Add New User</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
      <p class="error" id="err_user_chk" style="text-align:center;"></p>
    <div class="offcanvas-body flex-grow-1">
      <form class="add-new-record pt-0 row g-2" id="saveSurveyorBasicInfo" action="{{url('surveyor/saveSurveyorUserInfo')}}" method="POST">
      <div class="col-sm-6 mt-4">
        <label class="form-label" for="subscription_titles">First Name</label>
        <div class="input-group input-group-merge">
          <span id="basicFullname2" class="input-group-text"><i class="bx bx-book-content"></i></span>
          <input type="text" id="first_name" name="first_name" class="form-control dt-post" placeholder="First Name" />
        </div>
        <p class="error" id="err_first_name"></p>
      </div>

     <div class="col-sm-6 mt-4">
        <label class="form-label" for="users_allowed">Last Name</label>
        <div class="input-group input-group-merge">
          <span id="basicFullname2" class="input-group-text"><i class="bx bx-book-content"></i></span>
          <input type="text" id="last_name" name="last_name" class="form-control dt-post" placeholder="Last Name" />
        </div>
        <p class="error" id="err_last_name"></p>
      </div>


      <div class="col-sm-12 mt-4">
        <label class="form-label" for="reports_allowed">User Name</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='bx bxs-user'></i></span>
          <input type="text" id="user_name" name="user_name" class="form-control dt-post" placeholder="User Name " />
        </div>
        <p class="error" id="err_user_name"></p>
      </div>

      <div class="col-sm-12 mt-4">
        <label class="form-label" for="validity_allowed">Email</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text"><i class='bx bxs-detail'></i></span>
          <input type="text" id="email" name="email" class="form-control dt-post" placeholder="Email" />
        </div>
        <p class="error" id="err_email"></p>
      </div>
      
      <div class="col-sm-12 mt-4">
        <label class="form-label" for="subscription_price">Contact No</label>
        <div class="input-group input-group-merge">
          <span id="basicSalary2" class="input-group-text"><i class='bx bx-detail'></i></span>
          <input type="text" id="phone_no" name="phone_no" class="form-control dt-post" placeholder="Contact No." />
        </div>
         <p class="error" id="err_phone_no"></p>
      </div>
      <?php $priv_array = explode(",",$surv_privileges); ?>
       <div class="col-sm-12 mt-12">
         <label class="form-label" for="subscription_privileges">Privileges</label>
         <?php foreach($priv_array as $values) { ?>
           <div class="form-check form-check-inline mt-5">
              <input class="form-check-input" name="chk" type="checkbox" id="priv_{{$values}}" value="{{$values}}" <?php if($values==1) { ?>checked<?php }?> />
              <label class="form-check-label" for="inlineCheckbox1">{{getSubscriptionPlanPriviliges($values)}}</label>
            </div>
          <?php } ?>  
            
             <input class="form-check-input"  name="privileges_val" type="hidden" id="privileges_val" value="" />
        <p class="error" id="err_priv_msg"></p>
      </div>
      <input type="hidden" id="survey_info_id" name="survey_info_id" value="{{$survey_info_id}}" class="form-control dt-post"  />
      <input type="hidden" id="city_id" name="city_id" value="{{$city_id}}" class="form-control dt-post"  />
      <input type="hidden" id="surv_privileges" name="surv_privileges" value="" class="form-control dt-post"  />

      
      <div class="col-sm-12 mt-1" style="text-align: center;">
        <button type="button" class="btn btn-primary data-submit me-sm-3 me-1" onclick="saveSurveyorBasicInfo('{{$surv_privileges}}')" id="submiteAdminButtons">Submit</button>
        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas" id="c_submiteAdminButtons">Cancel</button>

        <button type="button" class="btn btn-primary w-100" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
        <input type="hidden" value="add" id="process_type" name="process_type"/>
        <input type="hidden" value="" id="subscription_id" name="subscription_id"/>
        <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
      </div>
    </form>
    </div>
  </div>


<!-- View Detail -->
  <div class="modal fade" id="viewSubscriptionPlanInfoModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Subscription Plans</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                        <div class="col-lg mb-md-0 mb-4">
                              <div class="card">
                                <div class="card-body">
                                  <h3 class="card-title fw-bold text-center text-uppercase mt-3" id="v_subscription_titles"></h3>
                                  <div class="my-4 py-2 text-center">
                                    <img src="{{url('public/assets/img/icons/unicons/bookmark.png')}}" alt="Starter Image" height="80">
                                  </div>

                                  <div class="text-center mb-4">
                                    <div class="mb-2 d-flex justify-content-center">
                                      <sup class="h5 pricing-currency mt-3 mb-0 me-1"></sup>
                                      <h1 class="fw-bold h1 mb-0" id="v_subscription_price"></h1>
                                      <sub class="h5 pricing-duration mt-auto mb-2" id="v_subscription_type"></sub>
                                    </div>
                                    <small class="price-yearly price-yearly-toggle text-muted" id="v_users_allowed"></small>
                                  </div>

                                  <ul class="ps-3 pt-4 pb-2 list-unstyled">
                                    <li class="mb-2" id="v_subscription_description" style="text-align: justify;"></li>
                                  </ul>
                                </div>
                              </div>
                            </div>      
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>

<!-- End Add User -->

</div>
<!--/ Content -->

@endsection