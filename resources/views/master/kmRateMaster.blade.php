@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}} </span> 
    <div style="float: right;margin-top: -10px;">
      <!-- <button class="dt-button btn btn-primary" type="button"  onclick="addNewSubscriptionPlans()">
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


  <div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <!-- 1. Delivery Address -->
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label" for="fullname">Full Name</label>
                <input type="text" id="fullname" class="form-control" placeholder="John Doe" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="email">Email</label>
                <div class="input-group input-group-merge">
                  <input class="form-control" type="text" id="email" name="email" placeholder="john.doe" aria-label="john.doe" aria-describedby="email3" />
                  <span class="input-group-text" id="email3">@example.com</span>
                </div>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="phone">Contact Number</label>
                <input type="text" id="phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="alt-num">Alternate Number</label>
                <input type="text" id="alt-num" class="form-control phone-mask" placeholder="658 799 8941" />
              </div>
              <div class="col-12">
                <label class="form-label" for="address">Address</label>
                <textarea name="address" class="form-control" id="address" rows="2" placeholder="1456, Mall Road"></textarea>
              </div>
              <div class="col-md-6">
                <label class="form-label" for="pincode">Pincode</label>
                <input type="text" id="pincode" class="form-control" placeholder="658468" />
              </div>
              <div class="col-md-6">
                <label class="form-label" for="landmark">Landmark</label>
                <input type="text" id="landmark" class="form-control" placeholder="Nr. Wall Street" />
              </div>
              <div class="col-md">
                <label class="form-label" for="city">City</label>
                <input type="text" id="city" class="form-control" placeholder="Jackson" />
              </div>
              <div class="col-md">
                <label class="form-label" for="state">State</label>
                <select id="state" class="select2 form-select" data-allow-clear="true">
                  <option value="">Select</option>
                  <option value="AL">Alabama</option>
                  <option value="AK">Alaska</option>
                  <option value="AZ">Arizona</option>
                  <option value="AR">Arkansas</option>
                  <option value="CA">California</option>
                  <option value="CO">Colorado</option>
                  <option value="CT">Connecticut</option>
                  <option value="DE">Delaware</option>
                  <option value="DC">District Of Columbia</option>
                  <option value="FL">Florida</option>
                  <option value="GA">Georgia</option>
                  <option value="HI">Hawaii</option>
                  <option value="ID">Idaho</option>
                  <option value="IL">Illinois</option>
                  <option value="IN">Indiana</option>
                  <option value="IA">Iowa</option>
                  <option value="KS">Kansas</option>
                  <option value="KY">Kentucky</option>
                  <option value="LA">Louisiana</option>
                  <option value="ME">Maine</option>
                  <option value="MD">Maryland</option>
                  <option value="MA">Massachusetts</option>
                  <option value="MI">Michigan</option>
                  <option value="MN">Minnesota</option>
                  <option value="MS">Mississippi</option>
                  <option value="MO">Missouri</option>
                  <option value="MT">Montana</option>
                  <option value="NE">Nebraska</option>
                  <option value="NV">Nevada</option>
                  <option value="NH">New Hampshire</option>
                  <option value="NJ">New Jersey</option>
                  <option value="NM">New Mexico</option>
                  <option value="NY">New York</option>
                  <option value="NC">North Carolina</option>
                  <option value="ND">North Dakota</option>
                  <option value="OH">Ohio</option>
                  <option value="OK">Oklahoma</option>
                  <option value="OR">Oregon</option>
                  <option value="PA">Pennsylvania</option>
                  <option value="RI">Rhode Island</option>
                  <option value="SC">South Carolina</option>
                  <option value="SD">South Dakota</option>
                  <option value="TN">Tennessee</option>
                  <option value="TX">Texas</option>
                  <option value="UT">Utah</option>
                  <option value="VT">Vermont</option>
                  <option value="VA">Virginia</option>
                  <option value="WA">Washington</option>
                  <option value="WV">West Virginia</option>
                  <option value="WI">Wisconsin</option>
                  <option value="WY">Wyoming</option>
                </select>
              </div>
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="deliveryAdd" checked="">
                  <label class="form-check-label" for="deliveryAdd"> Use this as default delivery address </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row">
        <h5 class="card-title mb-sm-0 me-2"></h5>
        <div class="action-btns">
          <button class="btn btn-primary">
            Submit
          </button>
        </div>
      </div>
    </div>
  </div>
</div>



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

</div>
<!--/ Content -->
@endsection