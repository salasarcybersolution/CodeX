@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
 
   
    <div style="float: right;margin-top: -10px;">
    <a href="{{url('Master/addBranchData')}}"><button type="button" class="btn btn-primary">Add New Branch</button></a>
    </div>

   <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Branch</a>
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
  <div class="row">
    
  <div class="col-12">
  <div class="card">
  <h5 class="card-header">Branch Master List</h5>
  <div class="card-datatable table-responsive">
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>Insurer</th> 
          <th>Branch</th>
          <th>State</th>
          <th>City</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        
        <?php foreach($branches as $branch){  ?>
        <tr>
          <td>{{$branch->insurer_branch_id}}</td>
          <td>{{$branch->branch_name}}</td>
           <td>{{$branch->branch_name}}</td>
          <td>{{$branch->state_name}}</td>
          <td>{{$branch->city_name}}</td>
          <td>
           @if($branch->status == 1 )
           <a href="javascript:void(0)" class="btn btn-primary btn-xs">active</a>
           @else
            <a href="javascript:void(0)" class="btn btn-danger btn-xs" title="Inactive">Inactive</a>
            @endif
          </td>
       

          <td>
              <a href="{{url('Master/editBranchMaster/'.Crypt::encrypt($branch->insurer_branch_id))}}" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>



<!-- Add From -->
<div class="modal fade" id="BankModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Branch Master</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('Master/saveBankData')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="bank" class="form-label">Bank Name</label>
                        <input type="text"  id="bank" name="bank" class="form-control" require placeholder="Enter Bank Name">
                        @error('bank')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                          <label for="ac_no" class="form-label">A/C #</label>
                          <input type="text" id="ac_no" name="ac_no" class="form-control" require placeholder="Account Number">
                          @error('ac_no')
                          <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="ifsc_code" class="form-label">IFSC Code</label>
                        <input type="text" id="ifsc_code" name="ifsc_code" class="form-control" placeholder="IFSC Code">
                        @error('ifsc_code')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col mb-0">
                        <label for="micr" class="form-label">MICR</label>
                        <input type="text" id="micr" name="micr" class="form-control" placeholder="MICR">
                        @error('micr')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" id="address" name="address" class="form-control" placeholder="Address">
                      </div>
                    </div>
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                        @error('phone')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="col mb-0">
                        <label for="fax" class="form-label">Fax</label>
                        <input type="text" id="fax" name="fax" class="form-control" placeholder="Fax">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                          <label for="email" class="form-label">Email</label>
                          <input type="Email" id="email" name="email" class="form-control" placeholder="Email">
                          @error('email')
                          <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror                      
                        </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col mb-0">
                          <label for="contact_person" class="form-label">Contact Person</label>
                          <input type="text" id="contact_person" name="contact_person" class="form-control" placeholder="Contact Person">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                          <label for="mobile" class="form-label">Mobile</label>
                          <input type="mobile" id="mobile" name="mobile" class="form-control" placeholder="Mobile">
                          @error('mobile')
                          <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                          <label for="designation" class="form-label">Designation</label>
                          <input type="text" id="designation" name="designation" class="form-control" placeholder="Designation">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                          <label for="designation" class="form-label">Active</label>
                         
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col mb-0">
                          <label for="remark" class="form-label">Remark</label>
                          <textarea name="remark" class="form-control"></textarea>
                      </div>
                    </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
              <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
        </form>
            </div>
          </div>
        </div>
        
</div>
@endsection