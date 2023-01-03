




@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">{{$title}} </span> 
    <div style="float: right;margin-top: -10px;">
    <a href="{{url('Master/insurer-master/add')}}" type="button" class="btn btn-primary" > Add New Insurer </a>
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
  <h5 class="card-header">Insurer List</h5>
  <div class="card-datatable table-responsive">
    <table id="example" class="table table-striped" >
      <thead>
        <tr>
          <th>No</th>
          <th>Insurer</th>
          <th>Fee based on</th>
          <th>TAT</th>
          <th>Party Code</th>
          <th>Receiving Bank</th>
          <th>Initial</th>
          <th>TDS %</th>
          <th>TCS %</th>
          <th>Remark</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($insurers as $insurer){ ?>
            
        
        <tr>
          <td><?php //echo $insurer->id; ?></td>
          <td><?php //echo $insurer->insurer; ?></td>
          <td><?php //echo $insurer->fee_based_on; ?></td>
          <td><?php //echo $insurer->TAT; ?></td>
          <td><?php //echo $insurer->party_code; ?></td>
          <td><?php // ?></td>
          <td><?php //echo $insurer->initial; ?></td>
          <td><?php //echo $insurer->tds; ?></td>
          <td><?php //echo $insurer->tcs; ?></td>
          <td><?php //echo $insurer->remark; ?></td>
          <td><?php //echo $insurer->status; ?></td>
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
</div>
@endsection