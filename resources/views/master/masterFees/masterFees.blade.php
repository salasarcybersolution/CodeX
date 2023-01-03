@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  
    
    <div style="float: right;margin-top: -10px;">
       <input type="button" class="btn btn-primary" onclick="addNewFeesSlab()" value="Add Fee Slab">
    </div>

   <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Insurer</a>
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
 <!--  <h5 class="card-header">Insurer Master List</h5> -->
  <div class="card-datatable table-responsive">
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th>Sno</th>
          <th>Slab From</th>
          <th>Slab To</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach($fees_list as $feesList){ ?>
            
        
        <tr>
          <td><?php echo $i;$i++; ?></td>
          <td><?php echo $feesList->slab_from; ?></td>
          <td><?php echo $feesList->slab_to; ?></td>
          <td><?php 
              if ($feesList->master_fees_status == 1) { ?>
                <a href="javascript:void(0)" class="btn btn-primary btn-xs" >Active</a>
              <?php }else { ?>
                  <a href="javascript:void(0)" class="btn btn-danger btn-xs" >Inactive</a>
              <?php } ?>
          </td>
          <td>
              <a href="#" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>  


<div class="offcanvas offcanvas-end" tabindex="-1" id="addNewFeesSlab" aria-labelledby="offcanvasBackdropLabel">
    <div class="offcanvas-header border-bottom">
      <h5 id="offcanvasBackdropLabel" class="offcanvas-title">Add Fees Slab</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
      <form class="add-new-record pt-0 row g-2" id="addNewFeesSlabForm" action="{{url('Master/saveMasterFees')}}" method="POST">
      
      <div class="col-sm-12 mt-3">
        <label class="form-label" for="slab_from">Slab From</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text">₹</span>
          <input type="text" id="slab_from" name="slab_from" class="form-control dt-post" placeholder="Slab From" />
        </div>
        <p class="error" id="err_slab_from"></p>
      </div>

      <div class="col-sm-12 mt-0">
        <label class="form-label" for="slab_to">Slab To</label>
        <div class="input-group input-group-merge">
          <span id="basicPost2" class="input-group-text">₹</span>
          <input type="text" id="slab_to" name="slab_to" class="form-control dt-post" placeholder="Slab To" />
        </div>
        <p class="error" id="err_slab_to"></p>
      </div>
      
       
      <div class="col-sm-12 mt-4" style="text-align: center;">
        <button type="button" class="btn btn-primary mb-2 w-100" onclick="createFeesSlab()" id="submiteAdminButtons_g">Submit</button>
        <button type="reset" class="btn btn-secondary mb-2 w-100" data-bs-dismiss="offcanvas" id="c_submiteAdminButtons_g">Cancel</button>

        <button type="button" class="btn btn-primary w-100" id="waiteAdminButtons" style="display: none;" disabled><i class="fa fa-spinner fa-spin"></i> Please wait..</button>
        <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
      </div>
    </form>
    </div>
  </div>




</div>
@endsection