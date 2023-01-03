@extends('template_main')
@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
               <div class="row mb-2">
                  <div class="col-md-6">
                     <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-style1">
                           <li class="breadcrumb-item">
                              <a href="#">Subpart</a>
                           </li>
                           <li class="breadcrumb-item active">Add</li>
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
<!-- Vehicle update form here  -->
<div class="row">
   <div class="col-12">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-lg-8 mx-auto">
                
                            @if (count($errors) > 0)   
                            @foreach ($errors->all() as $error)
                            @endforeach
                            @endif
                   <form class="needs-validation" novalidate name="bankMaster" id="bankMaster" action="{{url('Master/saveSubPartData')}}" method="post" > <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  
                   <div class="row g-3">
                     <div class="col-md-6 field">
                        <label for="bank" class="form-label">Part Name</label>
                        <select class="form-select" data-allow-clear="true" name="part_name" id="part_name" required>
                            <option value=""></option>
                            <?php foreach ($part as $value) { ?>
                              <option value="<?php echo $value->part_id; ?>"><?php echo $value->part_name; ?></option>
                           <?php }  ?>
                           
                        </select>
                         <div class="invalid-feedback"> Please Select Part Name. </div>
                          @error('part_name')
                        <div class="text-danger">{{ $message }}</div>
                         @enderror
                     </div>
                          
                       <div class="col-md-6 field">
                        <label for="ac_no" class="form-label">Sub Part Name</label>
                         <input type="text" name="sub_part" id="sub_part" class="form-control" required>
                          <div class="invalid-feedback"> Please Enter Sub Part Name. </div>
                          @error('sub_part')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                     </div>   
                  </div>
                       <div class="modal-footer">
                        <button type="submit" name="submit" value="submit" class="btn btn-primary">Save</button>
                      </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
    </form>
</div>
</div>
@endsection