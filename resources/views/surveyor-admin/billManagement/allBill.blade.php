@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row mb-2">
                  <div class="col-md-6">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                           <li class="breadcrumb-item">
                              <a href="#">All Bills</a>
                           </li>
                           <li class="breadcrumb-item active">List</li>
                        </ol>
                     </nav>
                  </div>
                  <!-- <div class="col-md-6 text-end">
                     <button type="button" class="btn btn-primary btn-next">Add New</button>
                     </div> -->
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

  @if(Session::has('msg2'))
   <div class="row flasMsg">
      <div class="col-md-12">
          <div class="alert alert-danger alert-dismissible" role="alert">
              {{ Session::get('msg2') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>      
  @endif  


<div class="card">
  <div class="card-datatable table-responsive">
       <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Allotment Date</th>
                <th>Vehicle No.</th>
                <th>Insurance Company</th>
                <th>Appointed By</th>
                <th>Insured Name</th>
                <th>Insured Mobile No.</th>
                <th>Status</th>
                <th style="width:120px">Action</th>
            </tr>
        </thead>
        <tbody>
          <?php 
            foreach($sql as $row){
              // if($row->report_type == 1){
              //   $urls = 'SpotReport/policy-report/'.$row->report_id;
              //  }elseif($row->report_type == 2){
              //   $urls = 'SpotReport/policy-report/'.$row->report_id;
              //  }elseif($row->report_type == 3){
              //   $urls = 'final/policy-report/'.$row->report_id;
              //  }
          ?>
            <tr id="report_id_{{$row->report_id}}" class="test">
                <td width="150"><?php echo $row->allotment_date; ?>
                  <?php
                   if($row->report_type == 1){
                   echo '<span class="badge rounded-pill bg-label-danger">Spot</span>';
                   }elseif($row->report_type == 2){
                    echo '<span class="badge rounded-pill bg-label-warning">ReInspection</span>';
                   }elseif($row->report_type == 3){
                    echo '<span class="badge rounded-pill bg-label-success">Final</span>';
                   }
                  ?>
                </td>
                <td><?php echo $row->vehicle_registration_no; ?></td>
                <td><?php echo $row->insurer_name; ?></td>
          
                
                <td><?php echo $row->appointed_by; ?></td>
                <td><?php echo $row->insured_name; ?></td>
                <td><?php echo $row->insured_mobile_no; ?></td>
                <td>
                  <?php if($row->report_status==0){ ?>
                    <span class="badge  bg-label-warning">Pending</span>
                  <?php }elseif($row->report_status==1){ ?>
                    <span class="badge  bg-label-success">Completed</span>
                  <?php }elseif($row->report_status==2){ ?>
                    <span class="badge  bg-label-warning">Incomplete</span>
                  <?php } ?>
                </td>
                <td><button type="button" class="btn btn-primary btn-next"><a href="{{url('createBill/'.$row->report_id)}}" style="color:#fff;">Genrate Bill</a></button></td>
            </tr>
         <?php } ?>
        </tbody>
         
    </table>
  </div>
</div>



<!-- Add From -->


</div>
<!--/ Content -->
@endsection