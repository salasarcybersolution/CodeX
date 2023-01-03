@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">

    <span class="text-muted fw-light"></span> 
    <div style="float: right;margin-top: -10px;">
    <a href="{{url('Master/add-sub-part')}}"><button type="button" class="btn btn-primary">Add New Sub Part</button></a>
    </div>


   <div class="row mb-2">
    <div class="col-md-6">
       <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-style1">
             <li class="breadcrumb-item">
                <a href="#">Subpart</a>
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
  <h5 class="card-header">Sub Part List</h5>
  <div class="card-datatable table-responsive">
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th>No.</th>
          <th>Part Name</th> 
          <th>Sub Part Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($Subpart as $value) { ?>
        
      
        <tr>
          <td><?php echo $value->subpart_id; ?></td>
          <td>
            <?php  if (isset($value->getpartName->part_name)) {
            echo $value->getpartName->part_name;
          }  ?>
            
          </td>
          <td><?php echo $value->subpart_name; ?></td>    
            <td>
              <a href="{{url('Master/esitSubpart/'.Crypt::encrypt($value->subpart_id))}}"  title="edit" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                <a href="{{url('Master/deleteSubpart/'.Crypt::encrypt($value->subpart_id))}}" title="delete" class="btn btn-sm btn-icon item-delete"><i class="bx bx-trash me-1"></i></a>
          </td>
        <!--  <td>
              <a href="javascript:void()" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
          </td>  -->
        </tr>
        <?php  } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>




        
</div>
@endsection