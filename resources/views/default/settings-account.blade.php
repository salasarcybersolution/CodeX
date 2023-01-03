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
    <div class="row">
      <div class="col-md-12">
        @include('default.settings-menu') 
        <div class="card mb-4">
          <!-- Account -->
          <form id="formAccountSettings" method="POST" action="{{url('Home/updateInfo')}}" enctype="multipart/form-data" >
          <h5 class="card-header">Profile Details</h5>
          <div class="card-body">
            <div class="d-flex align-items-start align-items-sm-center gap-4">
              <img src="{{asset('public/profile_img/'.$userInfo->img_name)}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
              <div class="button-wrapper">
                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                  <span class="d-none d-sm-block">Upload new photo</span>
                  <i class="bx bx-upload d-block d-sm-none"></i>
                  <input type="file" id="upload" name="profile_image" class="account-file-input" hidden accept="image/png, image/jpeg" />
                </label>
                <button type="button" class="btn btn-label-secondary account-image-reset mb-4" onclick="resetImage()">
                  <i class="bx bx-reset d-block d-sm-none"></i>
                  <span class="d-none d-sm-block">Reset</span>
                </button>

                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
              </div>
              <input type="hidden" value="{{$userInfo->img_name}}" id="upload_old" name="upload_old">
            </div>
          </div>
          <hr class="my-0">
          <div class="card-body">
            
               <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="first_name" class="form-label">First Name</label>
                      <input class="form-control" type="text" id="first_name" name="first_name" value="{{$userInfo->first_name}}"/>
                    </div>
                    <div class="col-md-6">
                      <label for="last_name" class="form-label">Last Name</label>
                      <input class="form-control" type="text" id="last_name" name="last_name" value="{{$userInfo->last_name}}"/>
                    </div>
               </div> 
               <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="firstName" class="form-label">User Name</label>
                      <input class="form-control" type="text" id="user_name" name="user_name" value="{{$userInfo->user_name}}" disabled />
                    </div>
                    <div class="col-md-6">
                      <label for="lastName" class="form-label">Email</label>
                      <input class="form-control" type="text" id="email" name="email" value="{{$userInfo->email}}" disabled />
                    </div>
               </div> 
               <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="firstName" class="form-label">Phone No</label>
                      <input class="form-control" type="text" id="phone_no" name="phone_no" value="{{$userInfo->phone_no}}"/>
                    </div>
                    <div class="col-md-6">
                      <label for="lastName" class="form-label">Address</label>
                      <input class="form-control" type="text" id="address" name="address" value="{{$userInfo->address}}"/>
                    </div>
               </div>
               <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="firstName" class="form-label">City</label>
                      <select id="city_id" name="city_id" class="select2 form-select">
                        <option value="">Select City</option>
                        <?php foreach ($cities as $value) { ?>
                        <option value="{{$value->id}}" <?php if($value->id == $userInfo->city_id){ ?>selected <?php } ?>>{{$value->city}}</option>
                        <?php } ?>
                      </select>
                    </div>
                   
               </div> 

               <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mt-2">
                          <button type="button" class="btn btn-primary me-2" onclick="updateProfile()" id="submiteAdminButtons">Save changes</button>
                          <button type="reset" class="btn btn-label-secondary" id="c_submiteAdminButtons">Cancel</button>

                           <button type="button" class="btn btn-primary me-2" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Save changes</button>
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
