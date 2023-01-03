@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

   
    <div style="float: right;margin-top: -10px;">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#partModel">Add New Part</button>
    </div>
  <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Part</a>
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
  <h5 class="card-header">Part List</h5>
  <div class="card-datatable table-responsive">
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>Part Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
        <?php foreach ($getpart as $row) {  ?>
         
       
        <tr>
          <td><?php echo $row->part_id; ?></td>
          <td><?php echo $row->part_name; ?></td>
          <td>
              <a href="javascript:void(0)" onclick="parteditdata('{{$row->part_id}}','{{$row->part_name}}')" title="edit" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
               <a href="{{url('Master/deletePart/'.Crypt::encrypt($row->part_id))}}" title="delete" class="btn btn-sm btn-icon item-delete"><i class="bx bx-trash me-1"></i></a>
          </td>

        </tr>
   <?php  }  ?>            
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
<!-- add foem in popuo -->
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
<div class="modal fade" id="partModel" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-small" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Add Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form  class="needs-validation" novalidate class="add-new-record pt-0 row g-2" id="form-add-new-record" name="form-add-new-record"  action="{{url('Master/savePartData')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 field">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="part" class="form-label">Part Name</label>
                        <input type="text"  id="part" name="part" class="form-control" required>
                       <div class="invalid-feedback"> Please Enter Part Name. </div>
                        @error('part')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                
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
        <div class="modal fade" id="updatePart" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-small" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Update Part</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form  class="needs-validation" novalidate  class="add-new-record pt-0 row g-2" id="form-add-new-record-update" name="form-add-new-record-update" action="{{url('Master/update-part-name')}}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12 field">
                    <div class="row">
                      <div class="col mb-3">
                        <label for="bank" class="form-label">Part Name</label>
                        <input type="text" value="" id="partName" name="part_name" class="form-control" require required >
                         <div class="invalid-feedback"> Please Enter Part Name. </div>
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
              <input type="hidden" value="" id="part_id" name="part_id"/>
              
          </form>
            </div>
          </div>
        </div>
<!-- close form section -->
<!-- close common model load  -->

</div>
@endsection