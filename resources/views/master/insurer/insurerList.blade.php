@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  
    
    <div style="float: right;margin-top: -10px;">
       <a href="{{url('Master/addInsurer')}}" type="button" class="btn btn-primary" > Add Insurer User </a>
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
          <th>Name</th>
          <th>User Name</th>
          <th>Email</th>
          <th>Contact No</th>
          <th>City</th>
          <th>State</th>
        </tr>
      </thead>
       <tbody>

        <?php 
            $count = '1';
            foreach ($insurers as $key => $value): ?>
           <tr>
            <td>{{$count}}</td>
            <td>{{ucwords($value->first_name.' '.$value->last_name)}}</td>         
            <td>{{$value->user_name}}</td> 
            <td>{{$value->email}}</td>
            <td>{{$value->phone_no}}</td> 
            <td>{{getCityName($value->city_id)}}</td> 
            <td>{{$value->status}}</td>         
           </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>        
</div>
@endsection