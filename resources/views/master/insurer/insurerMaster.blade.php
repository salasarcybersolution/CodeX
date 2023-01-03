@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  
    
    <div style="float: right;margin-top: -10px;">
       <a href="{{url('Master/insurer-master/add')}}" type="button" class="btn btn-primary" > Add New Insurer </a>
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
          <th>Insurer</th>
          <th>Initial</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach($insurers as $insurer){ ?>
            
        
        <tr>
          <td><?php echo $i;$i++; ?></td>
          <td><?php echo $insurer->insurer_name; ?></td>
          <td><?php echo $insurer->initial; ?></td>
          <td><?php 
              if ($insurer->status == 1) { ?>
                <a href="javascript:void(0)" class="btn btn-primary btn-xs" >Active</a>
              <?php }else { ?>
                  <a href="javascript:void(0)" class="btn btn-danger btn-xs" >Inactive</a>
              <?php } ?>
          </td>
          <td>
              <a href="{{url('Master/insurer-master/edit/'.Crypt::encrypt($insurer->insurer_master_id))}}" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>        
</div>
@endsection