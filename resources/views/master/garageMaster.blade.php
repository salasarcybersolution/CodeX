@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}} </span> 
    <div style="float: right;margin-top: -10px;">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#BankModal">
  Add New Record
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
  <div class="row">
    
  <div class="col-12">
  <div class="card">
  <h5 class="card-header">Garage Master List</h5>
  <div class="card-datatable table-responsive">
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>Workshop</th>
          <th>Contact Person</th>
          <th>Mobile</th>
          <th>Authorized</th>
          <th>Remark</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($garages as $garage){ ?>
            
        
        <tr>
          <td><?php echo $garage->id; ?></td>
          <td><?php echo $garage->workshop; ?></td>
          <td><?php echo $garage->contact_person; ?></td>
          <td><?php echo $garage->mobile; ?></td>
          <td><?php if($garage->authorized == 1){echo 'Yes';}else{echo 'No';} ?></td>
          <td><?php echo $garage->remark; ?></td>
          <td><?php if($garage->status == 1){echo 'Active';}else{echo 'Deactive';} ?></td>
          
          <td>
              <a href="javascript:void(0);" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
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

@if (session('create_bank_error'))      
<script type="text/javascript">
    $('#BankModal').modal('show');
</script>
@endif
<div class="modal fade" id="BankModal" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Garage Master</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form class="add-new-record pt-0 row g-2" id="form-add-new-record" action="{{url('Master/saveGarageData')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="workshop" class="form-label">Workshop</label>
                        <input type="text"  id="workshop" name="workshop" class="form-control" require placeholder="Enter workshop Name">
                        @error('workshop')
                        <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                          <label for="contact_person" class="form-label">Contact Person</label>
                          <input type="text" id="contact_person" name="contact_person" class="form-control" require placeholder="Contact Person">
                          @error('contact_person')
                          <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                        </div>
                    </div>
                    
                    
                    
                    
                  </div>
                  <div class="col-md-4">
                    
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
                         <input type="checkbox" id="authorized" name="authorized" value="1" placeholder="Authorized">
                         <label for="authorized" class="form-label">Authorized</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                         <input type="checkbox" id="status" name="status" value="1" placeholder="Active">
                         <label for="status" class="form-label">Active</label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col mb-0">
                          <label for="remark" class="form-label">Remark</label>
                          <textarea name="remark" class="form-control"></textarea>
                          @error('remark')
                          <div class="alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
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
        



<!-- View Detail -->
 

</div>

<!--/ Content -->
@endsection