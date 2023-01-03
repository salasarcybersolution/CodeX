@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div style="float: right;margin-top: -10px;">
      <a href="{{url('surveyor/serveyorInsurerForm')}}"><button type="button" class="btn btn-primary">Add New Insurer</button></a>
    </div>
  
               <div class="row mb-2">
                  <div class="col-md-6">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                           <li class="breadcrumb-item">
                              <a href="#">Surveyor Insurer</a>
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


<div class="card">
  <div class="card-datatable table-responsive">
       <table id="example" class="table table-striped">
        <thead>
            <tr>
                <th>Sno.</th>
                <th>Insurer Name</th>
                <th>Insurer Branch</th>
                <th>Party Code</th>
                <th>TAT</th>
                <th>TDS</th>
                <th>TCS</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;
             $status =  array('1' =>'Active','0'=>'Deactive');   
             foreach ($insurers as $value) { $i++; //echo "<pre>"; print_r($value->id); ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$value->insurer_name}}</td>
                <td>{{$value->branch_name}}</td>
                 <td>{{$value->party_code}}</td>
                  <td></td>
                   <td></td>
                    <td></td>
                <td <?php if($value->status == '0'){ ?>class="text-danger"<?php } ?> >{{$status[$value->status]}}</td>
                <td>
                   <a href="{{url('surveyor/serveyorInsurerEdit/'.Crypt::encrypt($value->surveyor_insurer_id))}}" title="Edit"  class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>

                      <a href="{{url('surveyor/serveyorInsurerview/'.Crypt::encrypt($value->surveyor_insurer_id ))}}" title="View" class="btn btn-sm btn-icon item-view"><i class="fa fa-eye" aria-hidden="true"></i></a>

                  <!--  <a href="javascript:void(0)" onclick="servyorViewLoadForm('{{$value->surveyor_insurer_id }}')" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a> -->

                </td>
            </tr>
            <?php } ?>
        </tbody>
         
    </table>
  </div>
</div>


</div>
<!--/ Content -->
       <div class="modal fade" id="seryorInsurer" tabindex="-1" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-small" role="document">
        <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">View Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col mb-3">
                    <label for="bank_name" class="form-label">Name</label>
                    <input type="text" id="bank_name" name="bank_name" class="form-control"  value="" placeholder="Enter Name">
                  </div>
                </div>
                <div class="row g-2">
                  <div class="col mb-0">
                    <label for="emailLarge" class="form-label">Email</label>
                    <input type="text" id="emailLarge" class="form-control" placeholder="xxxx@xxx.xx">
                  </div>
                  <div class="col mb-0">
                    <label for="dobLarge" class="form-label">DOB</label>
                    <input type="text" id="dobLarge" class="form-control" placeholder="DD / MM / YY">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

@endsection