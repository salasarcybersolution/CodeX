@extends('template_main')
@section('content')
  <!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}} /</span> {{$subtitle}}
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
    <div class="row">
      <div class="col-md-12">
        @include('default.settings-menu') 
        <div class="card mb-4">
          <!-- Account -->
          <form id="formAccountSettings" method="POST" action="{{url('Home/updatePassword')}}" enctype="multipart/form-data">
          <h5 class="card-header">Change Password</h5>
          <hr class="my-0">
          <div class="card-body">
            <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="first_name" class="form-label">Current Password</label>
                              <input class="form-control" type="password" id="old_password" name="old_password" placeholder="*****"/>
                              <p class="error" id="err_old_password"></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="first_name" class="form-label">New Password</label>
                              <input class="form-control" type="password" id="new_password" name="new_password" placeholder="*****"/>
                              <p class="error" id="err_new_password"></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-12">
                              <label for="first_name" class="form-label">Confirm New Password</label>
                              <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="*****"/>
                              <p class="error" id="err_confirm_password"></p>
                            </div>
                        </div> 
                         <div class="row mb-3">
                              <div class="col-md-6">
                                  <div class="mt-2">
                                    <button type="button" class="btn btn-primary me-2" onclick="updatePassword()" id="submiteAdminButtons">Save changes</button>
                                    <button type="reset" class="btn btn-label-secondary" id="c_submiteAdminButtons">Cancel</button>
                                    <button type="button" class="btn btn-primary me-2" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Save changes</button>
                                  </div>
                              </div>
                         </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3">
                          <div class="col-6 mb-4">
                              <p class="fw-semibold mt-2">Password Requirements:</p>
                              <ul class="ps-3 mb-0">
                                <li class="mb-1">
                                  Minimum 8 characters long - the more, the better
                                </li>
                                <li class="mb-1">At least one lowercase character</li>
                                <li>At least one number, symbol, or whitespace character</li>
                              </ul>
                            </div>
                            <div class="col-6 text-center mt-4 mx-3 mx-md-0">
                              <img src="{{asset('public/assets/img/illustrations/sitting-girl-with-laptop-light.png')}}" class="img-fluid" alt="Api Key Image"  width="350">
                            </div>
                        </div>
                    </div>
               </div>

          </div>
           <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
        </form>
          <!-- /Account -->
        </div>
      </div>
    </div>
</div>
          <!--/ Content -->

         
@endsection
