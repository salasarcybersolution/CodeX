@extends('template_main') @section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}} /</span>
 <!--    <div style="float: right;margin-top: -10px;">
      <button class="dt-button btn btn-primary" type="button"  onclick="addNewSubscriptionPlans()">
        <span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Record</span></span>
      </button>
    </div> -->
  </h4> @if(Session::has('msg'))
  <div class="row flasMsg">
    <div class="col-md-12">
      <div class="alert alert-success alert-dismissible" role="alert"> {{ Session::get('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    </div>
  </div> @endif
  <div class="" id="viewSubscriptionPlanInfoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Subscription Plans Details</h5> </div> @foreach($list as $value)
        <div class="modal-body">
          <div class="row">
            <div class="col-lg mb-md-0 mb-4">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title fw-bold text-center text-uppercase mt-3" id="v_subscription_titles">NEW VERSION</h3>
                  <div class="my-4 py-2 text-center"> <img src="{{url('public/assets/img/icons/unicons/bookmark.png')}}" alt="Starter Image" height="80"> </div>
                  <div class="text-center mb-4">
                    <div class="mb-2 d-flex justify-content-center"> <sup class="h5 pricing-currency mt-3 mb-0 me-1"></sup>
                      <h1 class="fw-bold h1 mb-0" id="v_subscription_price">{{$value->subscription_price}} INR</h1> <sub class="h5 pricing-duration mt-auto mb-2" id="v_subscription_type">{{$value->subscription_type}}</sub> </div> <small class="price-yearly price-yearly-toggle text-muted" id="v_users_allowed">{{$value->users_allowed}} Users Allowed</small> </div>
                  <ul class="ps-3 pt-4 pb-2 list-unstyled">
                    <li class="mb-2" id="v_subscription_description" style="text-align: justify;">{{$value->subscription_description}}</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!--    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button> -->
        </div>
      </div>
    </div>
  </div>
  @endforeach
  <!-- Add From -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBackdrop" aria-labelledby="offcanvasBackdropLabel">
    <div class="offcanvas-header border-bottom">
      <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Add New Subscription Plans </h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
      <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('Components/saveSubscriptionPlansInfo')}}" method="POST">
        <div class="col-sm-12 mt-4">
          <label class="form-label" for="subscription_type">Subscription Type</label>
          <div class="input-group input-group-merge"> <span id="basicFullname2" class="input-group-text"><i class="bx bx-book-content"></i></span>
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
          <div class="input-group input-group-merge"> <span id="basicPost2" class="input-group-text"><i class='bx bxs-user'></i></span>
            <input type="text" id="users_allowed" name="users_allowed" class="form-control dt-post" placeholder="Users Allowed" /> </div>
          <p class="error" id="err_users_allowed"></p>
        </div>
        <div class="col-sm-12">
          <label class="form-label" for="subscription_titles">Subscription Titles </label>
          <div class="input-group input-group-merge"> <span id="basicPost2" class="input-group-text"><i class='bx bxs-detail'></i></span>
            <input type="text" id="subscription_titles" name="subscription_titles" class="form-control dt-post" placeholder="Subscription Titles" /> </div>
          <p class="error" id="err_subscription_titles"></p>
        </div>
        <div class="col-sm-12">
          <label class="form-label" for="subscription_price">Subscription Price</label>
          <div class="input-group input-group-merge"> <span id="basicSalary2" class="input-group-text"><i class='bx bx-dollar'></i></span>
            <input type="number" id="subscription_price" name="subscription_price" class="form-control onlyNumericKey" placeholder="Subscription Price" /> </div>
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
          <input type="hidden" value="add" id="process_type" name="process_type" />
          <input type="hidden" value="" id="subscription_id" name="subscription_id" />
          <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token" /> </div>
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
                  <div class="my-4 py-2 text-center"> <img src="{{url('public/assets/img/icons/unicons/bookmark.png')}}" alt="Starter Image" height="80"> </div>
                  <div class="text-center mb-4">
                    <div class="mb-2 d-flex justify-content-center"> <sup class="h5 pricing-currency mt-3 mb-0 me-1"></sup>
                      <h1 class="fw-bold h1 mb-0" id="v_subscription_price"></h1> <sub class="h5 pricing-duration mt-auto mb-2" id="v_subscription_type"></sub> </div> <small class="price-yearly price-yearly-toggle text-muted" id="v_users_allowed"></small> </div>
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
</div>
<!--/ Content -->
@endsection