<?php
$user_info = getUserInfo(session('user_id'));
$name = ucwords($user_info->first_name.' '.$user_info->last_name); 
$profile_image = $user_info->profile_img == "" ?  "dummy.png" : $user_info->profile_img;
$user_type = getUserType($user_info->user_type_id);
$insurers = getInsurerList(session('user_id'));
?>
<!-- <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar"> -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="bx bx-menu bx-sm"></i>
      </a>
    </div>




    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <!-- Search -->
      <div class="navbar-nav align-items-center">
        <div class="nav-item navbar-search-wrapper mb-0">
          <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
            <i class="bx bx-search bx-sm"></i>
            <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
          </a>
        </div>
        <div class="navbar-search-wrapper search-input-wrapper  d-none">
          <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
          <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
        </div>
      </div>
      <!-- /Search -->

      

      <ul class="navbar-nav flex-row align-items-center ms-auto">
        <?php if($user_type == "Surveyor Admin"){ ?>
          <li>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reportAddPopup">Add New Report</button>
          </li>
        <?php } ?>
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="{{asset('public/profile_img/'.$profile_image)}}" alt class="w-px-40 h-auto rounded-circle">
            </div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="pages-account-settings-account.html">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <img src="{{asset('public/profile_img/'.$profile_image)}}" alt class="w-px-40 h-auto rounded-circle">
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">{{$name}}</span>
                    <small class="text-muted">{{$user_type}}</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="#">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Profile</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="{{url('subscription-plan')}}">
                <i class="bx bx-user me-2"></i>
                <span class="align-middle">My Subscription Plan</span>
              </a>
            </li>


            <li>
              <a class="dropdown-item" href="{{url('settings-account')}}">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item" href="{{url('/logout')}}">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        <!--/ User -->
      </ul>
    </div>




  </nav>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
      $(".pageloader").fadeOut("slow");
    });
  </script>

  <style type="text/css">
   .form-label{
     float: left !important;
   }
   .mb-3 p{
     float: left !important;
   }
 </style>
 <style type="text/css">
  .form-label{
   float: left !important;
 }
 .mb-3 p{
   float: left !important;
 }

 .form-control {
  border: 0px;
  border-radius: 0;
  border-bottom: 1px solid #d9dee3;
  padding-left: 0;
}

.form-control:focus{
 box-shadow: none;
}

.form-select {
  padding-left: 0;
  border: 0;
  border-bottom: 1px solid #d9dee3;
  border-radius: 0;
}

/*input[type=date]::-webkit-datetime-edit {
    color: transparent;
}
input[type=date]:focus::-webkit-datetime-edit {
    color: black !important;
}*/
.field input[type="date"] {
  color: #0000;
}
.field.populated-input input[type="date"], 
.field.focus-active input[type="date"] {
  color: #697a8d;
}


.field {
  position: relative;
}
.field label {
  position: absolute;
  left: 0;
  top: 50%;
  transform: translatey(-50%);
  transition: all 0.2s ease-in-out;
}

.populated-input label,
.focus-active label {
  top: 0;
  font-size: 0.75em;
}
.populated-input input,
.focus-active input {
  outline: none;
}

.clear-button {
  margin: 1em;
  padding: 0.5em 1em;
  background-color: transparent;
  font-size: 1em;
}
</style>
<style>
  .pageloader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: rgb(249, 249, 249);
    opacity: .8;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .sk-chase {
    width: 40px;
    height: 40px;
    position: relative;
    animation: sk-chase 2.5s infinite linear both;
  }
  .sk-chase-dot {
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    animation: sk-chase-dot 2s infinite ease-in-out both;
  }
  .sk-chase-dot:before {
    content: "";
    display: block;
    width: 25%;
    height: 25%;
    background-color: #000;
    border-radius: 100%;
    animation: sk-chase-dot-before 2s infinite ease-in-out both;
  }
  .sk-chase-dot:nth-child(1) {
    animation-delay: -1.1s;
  }
  .sk-chase-dot:nth-child(1):before {
    animation-delay: -1.1s;
  }
  .sk-chase-dot:nth-child(2) {
    animation-delay: -1s;
  }
  .sk-chase-dot:nth-child(2):before {
    animation-delay: -1s;
  }
  .sk-chase-dot:nth-child(3) {
    animation-delay: -0.9s;
  }
  .sk-chase-dot:nth-child(3):before {
    animation-delay: -0.9s;
  }
  .sk-chase-dot:nth-child(4) {
    animation-delay: -0.8s;
  }
  .sk-chase-dot:nth-child(4):before {
    animation-delay: -0.8s;
  }
  .sk-chase-dot:nth-child(5) {
    animation-delay: -0.7s;
  }
  .sk-chase-dot:nth-child(6) {
    animation-delay: -0.6s;
  }

  @keyframes sk-chase {
    100% {
      transform: rotate(360deg);
    }
  }
  @keyframes sk-chase-dot {
    80%, 100% {
      transform: rotate(360deg);
    }
  }
  @keyframes sk-chase-dot-before{50%{transform:scale(0.4)}100%,0%{transform:scale(1)}}
</style>

<div class="pageloader">
  <div class="sk-chase sk-primary">
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
    <div class="sk-chase-dot"></div>
  </div>
</div>


<!-- add foem in popuo -->
<div class="modal fade" id="reportAddPopup" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-small" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel3" >Add New Report Entry</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="needs-validation" novalidate class="add-new-record pt-0 row g-2" id="form-add-new-recordBank" name="form-add-new-recordBank" action="{{url('serveyor/add-report')}}" method="POST">
        {{ csrf_field() }}
        <div class="modal-body">

          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col mb-3 field">
                  <label for="report_type" class="form-label">Report Type</label>
                  <select id="report_type" class="form-select" name="report_type" required>
                    <option value=""></option>  
                    <option value="1">Spot Report</option>
                    <option value="2">Interim Report</option>
                    <option value="3">Final Report</option>                
                  </select>

                  <div class="invalid-feedback">Please Select Report Type</div>
                  @error('bank')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            
            <div class="col-md-12">
              <div class="row">
                <div class="col mb-3 field">
                  <label for="bank" class="form-label">Allotment Date</label>
                  <input type="date"  id="entrustedDate" name="entrustedDate" class="form-control" required>
                  <div class="invalid-feedback"> Please Enter Entrusted Date</div>
                  @error('bank')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
            <!-- <div class="col-md-12">
              <div class="row">
                <div class="col mb-3 field">
                  <label for="bank" class="form-label">Vehicle Registration No.</label>
                  <input type="text"  id="vehicle_no" name="vehicle_no" class="form-control" required>
                  <div class="invalid-feedback"> Please Enter Vehicle No.</div>
                  @error('bank')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div> -->
             <input type="hidden"  id="vehicle_no" value="1234456" name="vehicle_no" class="form-control">
            <div class="col-md-12">
              <div class="row">
                <div class="col mb-3 field">
                  <label for="insurers" class="form-label">Insurance Co. Name</label>

                  <select id="insurers" class="form-select" name="insurers" onchange="surveyorInsurerBranch(this)" required>
                   <!-- <option value="">Select</option> -->
                   <?php foreach ($insurers as $row) { ?>
                     <option value="{{ $row->insurer_id }}">{{ $row->insurer_name }}</option>
                   <?php  } ?>                       
                 </select>

                 <div class="invalid-feedback">Please Select Insurer</div>
                 @error('bank')
                 <div class="text-danger">{{ $message }}</div>
                 @enderror
               </div>
             </div>
           </div>
           <div class="col-md-12">
            <div class="row">
              <div class="col mb-3 field">
                <label for="insurer_branch" class="form-label">Appointing Office:</label>
                <select id="insurer_branch" class="form-select" name="insurer_branch" required>
                  <option value=""></option>
                </select>

                <div class="invalid-feedback">Please Select Insurer Brance</div>
                @error('bank')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col mb-3 field">
                <label for="bank" class="form-label">Appointed By</label>
                <input type="text"  id="appointed_by" name="appointed_by" class="form-control">
                <div class="invalid-feedback"> Please Enter SAppointed By</div>
                @error('bank')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col mb-3 field">
                <label for="bank" class="form-label">Insured Name</label>
                <input type="text"  id="insured_Name" name="insured_Name" class="form-control" required>
                <div class="invalid-feedback"> Please Enter Insured Name</div>
                @error('bank')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col mb-3 field">
                <label for="bank" class="form-label">Insured Mobile No.</label>
                <input type="number"  id="mobile_no" name="mobile_no" class="form-control" required>
                <div class="invalid-feedback"> Please Enter Insured Mobile No.</div>
                @error('bank')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="row">
              <div class="col mb-3 field">
                <label for="bank" class="form-label">Place of Survey (WorkShop)</label>
                <input type="text"  id="place_of_survey" name="place_of_survey" class="form-control" required>
                <div class="invalid-feedback"> Please Enter Place of Survey.</div>
                @error('bank')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          

          <div class="col-md-12">
            <div class="row">
              <div class="col mb-3 field">
                <label for="remark" class="form-label">Remark</label>
                <textarea id="remark" name="remark" class="form-control" required></textarea>
                <div class="invalid-feedback"> Please Enter Remark</div>
                @error('bank')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit"  class="btn btn-primary" name="saveContinue" value="saveContinue">Save And Continue</button>
        <button type="submit" class="btn btn-primary" name="save" value="save">Save</button>
        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
      </div>
      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
    </form>
  </div>
</div>
</div>

<script type="text/javascript">







</script>

        <!-- close add form section  -->