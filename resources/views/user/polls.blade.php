@extends('layouts.master')
@section('title') BCT Coin  | Polls @endsection
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection
@section('content') 
<style type="text/css">
	[type="radio"]:checked,
[type="radio"]:not(:checked) {
    position: absolute;
    left: -9999px;
}
[type="radio"]:checked + label,
[type="radio"]:not(:checked) + label
{
    position: relative;
    padding-left: 28px;
    cursor: pointer;
    line-height: 20px;
    display: inline-block;
    color: #666;
}
[type="radio"]:checked + label:before,
[type="radio"]:not(:checked) + label:before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 18px;
    height: 18px;
    border: 1px solid #ffb536;
    border-radius: 100%;
    background: #fff;
}
[type="radio"]:checked + label:after,
[type="radio"]:not(:checked) + label:after {
    content: '';
    width: 12px;
    height: 12px;
    background: #0a2c3c;
    position: absolute;
    top: 3px;
    left: 3px;
    border-radius: 100%;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
}
[type="radio"]:not(:checked) + label:after {
    opacity: 0;
    -webkit-transform: scale(0);
    transform: scale(0);
}
[type="radio"]:checked + label:after {
    opacity: 1;
    -webkit-transform: scale(1);
    transform: scale(1);
}
#poll-step1, #poll-step2{
	background: #0a2c3c;
    color: white;
    font-weight: 500;
}
.form-check {
    position: relative;
    display: block;
    background: #0a2c3c24;
    padding: 20px;
}
</style>



<div class="dashboard-body">
<div class="row mt-3">
      <div class="col-sm-12">
          <h4 class="page-title">Quick polls</h4>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ URL('user/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
              </li>
              <li class="breadcrumb-item"><a href="{{ URL('quick-polls')}}">polls</a>
              </li>
          </ol>
      </div>


</div>
<div class="row">
	<div class="col-md-12">
		 <div class="card mb-6">
		 	<!-- <div class="card-header">
                <h4 class="text-center"> </h4>
            </div> -->
            <div class="card-body p-5">
            	@if(Sentinel::getUser()->show_polls==1)
					@if(count($polls->options)>0)
            	<div class="row">
            		<div class="col-sm-12">
                <h3>{{$polls->question}}</h3> 
               	<div ><ul class="alert alert-danger" id="polls_errors">we</ul></div>

						<div id="poll-first-step">
						<form id="poll-step1-form" method="post" action="{{url('quick-polls/step1')}}">
			 			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			 			<input type="hidden" name="id" value="{{ $polls->id }}">
						<!-- <div class="form-group">
				 		<p class="form-control">{{$polls->question}}</p>
						</div> -->
						<?php 
			      			$i=0;
			      			$j=0;
			      			$options=trim($polls->options,"|");
			      			$options=explode("|",$options);  
			    		?>

			    		@foreach($options as $option)
			    		<div class="form-group">
			        		<div  class="row">
			        			<div class="col-sm-12">
					        		<fieldset class="form-group row">
										<div class="col-sm-12">
        									<div class="form-check">
          										<input type="radio" class="form-check-input" name="answer"  id="<?php echo $i+1; ?>" value="<?php echo $i+1; ?>"     />
          									<label class="form-check-label" for="<?php echo $i+1; ?>">	<?php echo $option; ?>
									        </label>
        								</div>
      								</div>
    							</fieldset>
								</div>
			        		</div>
			    		</div>

			    		@endforeach

						<div class="form-group">
							<input   type="button" id="poll-step1" value="Submit" class="form-control">
						</div>
						</form>
					</div>
						@else
							<?php $j=1;?>
							<div class="form-group">
								<div  class="row">
									<div class="col-sm-12">
										<h2>No Polls Currently .</h2>
									</div>
								</div>
							</div>
						@endif
					<div id="success-msg" style="/*padding-top: 200px;*/">
					</div>
					<div id="errors-msg"  style="/*padding-top: 200px;*/">
					</div>
            </div>
        </div>
        @else
        <!-- poll over -->
        <div class="col-sm-12 mb-5 text-center">
			<h1> Your polls is over.</h1>
		</div>
		@endif
    </div>


		</div>
		<!-- <div ><ul class="alert alert-danger" id="polls_errors">we</ul></div>
		<div id="poll-first-step" style="padding-top: 200px;">
			<form id="poll-step1-form" method="post" action="{{url('quick-polls/step1')}}">
			 <input type="hidden" name="_token" value="{{ csrf_token() }}">
			 <input type="hidden" name="id" value="{{ $polls->id }}">
				<div class="form-group">
				 	<p class="form-control">{{$polls->question}}</p>
				</div>
				
				<?php 
			      $i=0;
			      $options=trim($polls->options,"|");
			      $options=explode("|",$options);  
			    ?> 
			    @foreach($options as $option)
			    <div class="form-group">
			        <div  class="row">
			          <div class="col-sm-2"></div>
			          <div class="col-sm-2">
			            <input type="radio" name="answer" value="<?php echo $i+1; ?>"     />
			            <input type="text" name="options[<?php echo $i+1; ?>][type]" class="form-control" value="<?php echo $option; ?>" required placeholder="Enter option">
			          </div>
			        </div>
			    </div>
			      <?php $i++; ?>
			    @endforeach
				<div class="form-group">
					<input type="button" id="poll-step1" value="Submit" class="form-control">
				</div>
			</form>
		</div>
		<div id="success-msg" style="padding-top: 200px;">
			
		</div>
		<div id="errors-msg"  style="padding-top: 200px;">
			
		</div> -->
	</div>	

	<div class="col-md-2"></div>	
</div>

</div>
</div>
@endsection

@section('bottom_script')
	<script type="text/javascript">
	$( "#polls_errors").hide();
		$('#poll-step1').click( function(e){
	        $( "#polls_errors").hide();
	        var formData = new FormData($("#poll-step1-form")[0]);
	        
	        $.ajax({
	            //dataType:'json',
	            async:false,
	            type:'post',
	            processData: false,
	            contentType: false,
	            headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
	            url:"{{url('quick-polls/step1')}}",
	            data: formData,
	            success: function (responseData) {
	            	
            		if(responseData==0)
            		{
            			$("#poll-first-step").hide();
	            		$("#errors-msg").append("<h1>Sorry your Answer is wrong.</h1>");
	            		$("#errors-msg").show();
            		}
            		else
            		{
	            		$("#poll-first-step").hide();
	            		$("#success-msg").append(responseData);
	            		$("#success-msg").show();
            		}
	            },
	            error: function (responseData) {
	                $("#polls_errors").html('');
	                var errors = $.parseJSON(responseData.responseText);
	                var i=1;
	                $.each( errors['errors'], function( key, value ) {

	                    $("#polls_errors").append('<li>'+ i++ +'.'+ value+'</li><br>' );
	                    $( "#polls_errors").show();
	                });
	            }
	        });
	    });

	    function setSecondPoll(){
	    	$.ajax({
	    		type:'get',
	    		url:'{{url("quick-poll/get-second-poll")}}',
	    		success:function(data){
	    			$("#success-msg").hide();
	    			$("#poll-first-step").html('');
	    			$("#poll-first-step").append(data);
	    			$("#poll-first-step").show();
	    		}
	    	});
	    }

	    
	    // $('#poll-step2').click( function(e){
	    	function checkPollStep2(){

	        $( "#polls_errors").hide();
	        var formData = new FormData($("#poll-step2-form")[0]);
	        console.log("step2");
	        $.ajax({
	            //dataType:'json',
	            async:false,
	            type:'post',
	            processData: false,
	            contentType: false,
	            headers: "{{csrf_token()}}",
	            url:"{{url('quick-polls/step2')}}",
	            data: formData,
	            success: function (responseData) {
            		if(responseData==0)
            		{
            			$("#poll-first-step").hide();
	            		$("#errors-msg").append("<h1>Sorry your Answer is wrong.</h1>");
	            		$("#errors-msg").show();
            		}
            		else
            		{
            			$("#success-msg").html('');
	            		$("#poll-first-step").hide();
	            		$("#success-msg").append(responseData);
	            		$("#success-msg").show();
            		}
	            },
	            error: function (responseData) {
	                $("#polls_errors").html('');
	                var errors = $.parseJSON(responseData.responseText);
	                var i=1;
	                $.each( errors['errors'], function( key, value ) {

	                    $("#polls_errors").append('<li>'+ i++ +'.'+ value+'</li><br>' );
	                    $( "#polls_errors").show();
	                });
	            }
	        });
	    }
	</script>
@endsection
