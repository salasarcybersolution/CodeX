@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div style="float: right;margin-top: -10px;">
         <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BankModal">Add New Bank</button>
    </div>

               <div class="row mb-2">
                  <div class="col-md-6">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                           <li class="breadcrumb-item">
                              <a href="#">Bank</a>
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
  <h5 class="card-header">Bank List</h5>
  <div class="card-datatable table-responsive">
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>Bank Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($banks as $bank){ ?>
            
        <tr>
          <td><?php echo $bank->id; ?></td>
          <td><?php echo $bank->bank; ?></td>
          <td>
              <a href="javascript:void(0)" onclick="loadUpdateForm('{{$bank->id}}','{{$bank->bank}}')" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                <a href="{{url('Master/delete-bank-name/'.Crypt::encrypt($bank->id))}}" title="delete" class="btn btn-sm btn-icon item-delete"><i class="bx bx-trash me-1"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<!-- add foem in popuo -->
<div class="modal fade" id="BankModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-small" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3" >Add Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="needs-validation" novalidate class="add-new-record pt-0 row g-2" id="form-add-new-recordBank" name="form-add-new-recordBank" action="{{url('Master/saveBankData')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 field">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="bank" class="form-label">Bank Name</label>
                        <input type="text"  id="bank" name="bank" class="form-control" required>
                         <div class="invalid-feedback"> Please Enter Bank Name. </div>
                        @error('bank')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                 <!--    <div class="row">
                      <div class="col mb-0">
                          <label for="active" class="form-label">Active</label>
                          <input type="checkbox" name="status" value="1">
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
              <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
          </form>
            </div>
          </div>
        </div>

        <!-- close add form section  -->
  <!-- Update form section Popup -->
        <div class="modal fade" id="updateBank" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-small" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Update Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="needs-validation" novalidate  class="add-new-record pt-0 row g-2"  id="form-add-new-recordBankUp" name="form-add-new-recordBankUp" action="{{url('Master/update-bank-name')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 field">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="bank" class="form-label">Bank Name</label>
                        <input type="text" value="" id="bankName" name="bank" class="form-control" required >
                        <div class="invalid-feedback"> Please Enter Bank Name. </div>
                        @error('bank')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
              <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
              <input type="hidden" value="" id="bank_id" name="bank_id"/>
              
          </form>
            </div>
          </div>
        </div>
<!-- close form section -->
<!-- close common model load  -->

</div>

<!--/ Content -->
@endsection