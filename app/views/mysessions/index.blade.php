@extends('layouts.base')

@section('title')
	Sessions
@stop

@section('content')
<div class="page-title"> 
	@include('layouts.success_flash')
	<i class="icon-custom-left"></i>
	<h3>
		<span class="semi-bold">Sessions</span>
	</h3>
</div>

<div class="span12">
	<div class="grid-body addPD">
		<div class="row-fluid">
			<a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" >
				<div class="">
					<button class="btn btn-primary btn-cons right"  id="chat-menu-toggle" class="chat-menu-toggle" href="#sidr" type="button">
						<i class="icon-plus"></i>
							Add New Session
					</button>
				</div>
			</a>
		</div>
	</div>
       
</div>
  
<!-- body content -->
<div class="row-fluid">
     <div class="span12">
          <div class="grid simple ">
			<div class="grid-title">
				<h4>Session <span class="semi-bold">List</span></h4>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
					<a href="#grid-config" data-toggle="modal" class="config"></a>
					<a href="javascript:;" class="reload"></a>
					<a href="javascript:;" class="remove"></a>
				</div>
			</div>
            
			<div class="grid-body postion ">
            
			<div class="download-icon">
				<ul class="nav quick-section ">
					<li class="quicklinks Seticon"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#"> <i class="icon-cloud-download"></i> </a>
						<ul class="dropdown-menu  pull-right setUl" role="menu" aria-labelledby="dropdownMenu">
							<li><a href="/"> CSV </a> </li>
							<li><a href="/">Excel</a> </li>
							<li><a href="/"> PDF </a> </li>
							<li><a href="/"> Copy </a> </li>
						</ul>
					</li>
					<li class="quicklinks"> <span class="h-seperate"></span></li>
				</ul>
			</div>
              
			<table cellpadding="0" cellspacing="0" border="0" class="table table-striped" id="example2" width="100%" >
				<thead>
					<tr>
						<th>ID  </th>
						<th> Title </th>
						<th> Description  </th>
						<th> Room  </th>
						<th> Action </th>
					</tr>
				</thead>
				
				<tbody>
				
				@if(!empty($results))
					@foreach ($results as $result) 
						<tr class="odd gradeX">
							<td>{{{ $result->id }}}</td>
							<td>{{{ $result->session_title }}}</td>
							<td>{{{ $result->description }}}</td>
							<td>{{{ $result->room }}}</td>
							<td class="action">
								
								<a href="{{ URL::action('MysessionsController@edit',$result->id ) }}">
									<span class="icon-plus-sign-alt"></span>
								</a>

								&nbsp;
								

								{{ Form::open(array('route' => array('session.destroy', $result->id), 'method' => 'delete', 'style'=>'display:inline-block')) }}
									
			        				<button  class="btn btn-link" type="submit" >
			        					<a class="icon-trash"></a>
			        				</button>
			    				{{ Form::close() }}

							</td>
						</tr>
					@endforeach
				@endif 
               	</tbody>
			</table>
			</div>
		</div>
     </div>
</div>
  
  
</div>
</div>
</div>
<!-- END PAGE -->

<div id="sidr" class="sidr right rightSilder" >
	@include('layouts.error_flash')
	<h6> Add New Sessions </h6>

 	<div class="row-fluid">
 		{{ Form::open(array('route' => 'session.store', 'class' => 'form-horizontal')) }}
      	<div class="span12">
           	<div class="grid simple">
                <div class="grid-body no-border"> <br>
                 	<div class="row-fluid">
                      	<div class="span12">

							<div class="control-group">
								<label class="control-label"> 
									Session Title:   
									<span> * </span> 
								</label>
								<div class="controls">
								  	{{  Form::text('session_title', '', array('class'=>'span12') ) }}
								  	<span class="help-inline">
								  		{{ $errors->first('session_title','<span class="error">:message</span>'); }}
							  		</span>
								</div>
							</div>

							
							<div class="control-group">
								<label class="control-label"> 
									Description:   
									<span> * </span> 
								</label>
								<div class="controls">
								  	{{  Form::textarea('description', '', array('class'=>'span12', 'rows'=>6) ) }}
								  	<span class="help-inline">
								  		{{ $errors->first('description','<span class="error">:message</span>'); }}
							  		</span>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label"> 
									Room:   
									<span> * </span> 
								</label>
								<div class="controls">
								  	{{  Form::text('room', '', array('class'=>'span12') ) }}
								  	<span class="help-inline">
								  		{{ $errors->first('room','<span class="error">:message</span>'); }}
							  		</span>
								</div>
							</div>

							</div>
                         </div>
                    </div>
               </div>
          </div>
                    
		<div class="modal-footer">
			
			<div class="">
				<a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" >
					<button class="btn btn-success btn-cons right"  id="chat-menu-toggle" class="chat-menu-toggle" href="#sidr" type="button">
					    Cancel
					</button>
				</a>
				<button type="submit" class="btn btn-primary btn-cons" > Save Changes  </button>
				
			</div>
			
		</div>
		{{ Form::close() }}
	</div>
	<!-- END CHAT -->


<?php $errorMsg = $errors->all(); ?>
@if(!empty($errorMsg))
<script type="text/javascript">  
	
	$(document).ready(function(){

		// console.log('hello');
		$('.bodyclass').css({ "width": "1007px", "position": "absolute", "right": "650px" });
		$('.bodyclass').addClass('breakpoint-768');
		$('#sidr').css({ "display": "block", "right": "0px" });
		
	});
	 
</script> 
@endif 

@stop
