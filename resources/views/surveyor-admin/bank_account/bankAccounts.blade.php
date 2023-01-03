@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
              <div  style="float: right;margin-top: -10px;">
                <a href="{{url('surveyor/addBankAccounts')}}"><button class="dt-button btn btn-primary" type="button">
                 <span><i class="bx bx-plus me-sm-2"></i> <span class="d-none d-sm-inline-block">Add New Bank</span></span>
                 </button>
              </a>
            </div>

               <div class="row mb-2">
                  <div class="col-md-6">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                           <li class="breadcrumb-item">
                              <a href="#">Banck Account</a>
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
                <th>Bank Name</th>
                <th>Account holder name</th>
                <th>Account No.</th>
                <th>IFSC</th>
                <th>MICR</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0;
             $status =  array('1' =>'Active','0'=>'Deactive');   
             foreach ($list as $value) { $i++; ?>
            <tr>
                <td>{{$i}}</td>
                <td>{{$value->bank_name}}</td>
                <td>{{$value->account_holder_name}}</td>
                <td>{{$value->ac_no}}</td>
                <td>{{$value->ifsc}}</td>
                <td>{{$value->micr}}</td>
                <td <?php if($value->status == '0'){ ?>class="text-danger"<?php } ?> >{{$status[$value->status]}}</td>
                <td>
                   <a href="{{url('surveyor/editServeyor/'.Crypt::encrypt($value->id))}}" class="btn btn-sm btn-icon item-edit"><i class="bx bxs-edit"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
         
    </table>
  </div>
</div>

<!-- View Detail -->
</div>
<!--/ Content -->
@endsection