{{-- /*
 *  File Name              :
 *  Type                   :   
 *  Description            :   
 *  Author                 : Ashtosh Kumar Choubey
 *  Contact                : 9658476170
 *  Email                  : contact@mechlitemachines.com
 *  Date                   : 12/12/2018  
 *  Modified By            :       
 *  Date of Modification   :     
 *  Purpose of Modification: 
 * 
 */ --}}
@extends('samples') 
@section('content')
<section class="content" style="margin-left: 20px;margin-right: 20px;">
	<div class="card">
    <div class="card-header">
      <h4 class="box-title text-primary ">Please Fill Up Service Details</h4>
    </div>
    <div class="card-body">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 col-sm-12">
        <!-- general form elements -->
          <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
              @if ($errors->any())
              <ul class="alert alert-danger" style="list-style:none">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
              </ul>
              @endif
              @if(session()->has('message.level'))
              <div class="alert alert-{{ session('message.level') }} alert-dismissible" onload="javascript: Notify('You`ve got mail.', 'top-right', '5000', 'info', 'fa-envelope', true); return false;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> {{ ucfirst(session('message.level')) }}!</h4>
              {!! session('message.content') !!}
              </div>
              @endif
            </div>
          </div>
        </div>
      </div> 
	 <div class="row" id="serviceDiv">
        <div class="col-md-12" >
          <div class="card">
          
            {{ !isset($id)?Form::open(['url' => '/master/service_name','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) : Form::open(['url' => '/master/service_name/update','files' => 'true' ,'enctype' => 'multipart/form-data', 'autocomplete' => 'OFF']) }} 
            {{ csrf_field() }}
            {{ Form::hidden('id', isset($id) ? $id :'', []) }} 

            <div class="card-header">Add Service Name</div>
            <div class="card-body">
                <div class="col-md-6">
                  <label class="form-col-form-label" for="brand_id">Service Type</label>
                  {{Form::select('service_type_id',$service_type_select,isset($service_type_id)?$service_type_id: '', ['class' => 'form-control form-control ','id'=>'service_type','required', 'placeholder' => '  Service Type'] )}}
               </div>
               <div class="col-md-6">
                <label class="form-col-form-label" for="brand_id">Service Name</label>
                {{Form::text('service_name',isset($service_name)?$service_name: '', ['class' => 'form-control form-control ','id'=>'service_name','required', 'placeholder' => '  Service Name'] )}}
              </div>         
            </div>
            <div class="card-footer" align="center"><input class="btn btn-sm btn-primary" type="submit" id="add_model" value="Add"></div>
            {{ Form::close() }}
          </div>  
        </div>
      </div>
        <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Service List </div>
            <div class="card-body">
              <table id="datable_1" style="font-size: 13px;display:table-cell;" class="table  table-hover " >
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Service Type Name</th>
                  <th>Service Name</th>
                  <th>Action</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
                @foreach($service_name_list as $value)
                
                  <tr>
                     <td>{{ $value['id']  }}</td>
                      <td>{{ $value['service_type_id']  }}</td>
                    <td>{{ $value['service_name']  }}</td>
                    <td style="white-space: nowrap">
                   <a href="{{ url('/')}}/master/service_name/update/{{ $value['id'] }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a> 
                      <a style="display: none" href="{{ url('/')}}/master/service_name/trash/{{ $value['id']}} " class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');"><i class="fa fa-remove"></i></a>
                  </td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  </tr>
                   @endforeach
                    </tbody>
                {{-- <tfoot><tr><td style="overflow: auto;" colspan="3">{{ $service_name_list->links() }}</td></tr></tfoot> --}}
                   </table>
                  
            </div>
            <div class="card-footer"></div>
          </div>  
        </div>
        </div>
      </div> 
</section>
@endsection