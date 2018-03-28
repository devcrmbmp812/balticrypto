@extends('layouts.master')
@section('title') BCT Coin Upload @endsection

@section('content')

    <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Bounty</h4>
            </div>

        </div>

        <form class="form-horizontal theme-form mt-5 row"  action="{{ url('screen_upload')}}" method="post" enctype= "multipart/form-data">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="user_id" value="{{Sentinel::getUser()->id}}">

			<div class="container">
				<div class="col-md-6">
				    <div class="form-group">
				        <label>Upload ScreenShots</label>
				        <div class="input-group">
				            <span class="input-group-btn">
				                <span class="btn btn-default btn-file">
				                    Browse… <input type="file" id="imgInp" name="imgInp">
				                </span>
				            </span>

				        </div>
				        <img id='img-upload'/>
				    </div>
				</div>

			    <input type="hidden" value="{{ $serv }}" name="service" />

				<div class="col-md-6">
				    <div class="form-group">
				    	<div class="input-group">
				            <span class="input-group-btn">
				                <span class="btn btn-default btn-file">
									<input class="btn btn-success" type="submit" name="" value="Submit">
				                </span>
				            </span>

				        </div>

				    </div>
				</div>
			</div>
        </form>

    </div></div>

@endsection
