@extends('layouts.masterHome')
@section('content')
@section('title') Team information @endsection
@include('layouts.bottom_fix')
    <div class="dashboard-body">
        <div class="team-top">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            <h2 class="text-center">Management</h2>
                        </div>
                    </div>

                    @foreach($founders as $key )
                    <div class="col-md-6 col-lg-4">
                        <div class="team-box">
                            <div class="pic">
                                <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="{{$key->name}}">
                                <div class="social_media_team">
                                    <ul class="team_social">
                                        <li><a href="{{'mailto:'.$key->email}}"><i class="fa fa-envelope"></i></a></li>
                                        <li><a href="{{$key->fblink}}"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="{{$key->telegram}}"><i class="fa fa-send"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-prof">
                                <h3 class="post-title details-font color-darkblue">{{$key->name}}</h3>
                                <h3 class="designation">{!! $key->designation!!}</h3>
                                <img src="assets/images/poly.png"/>
                                {!! $key->description !!}
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="team-second">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            <h2 class="text-center">Technical Team</h2>
                        </div>
                    </div>
                    @foreach($technical as $key )
                        <div class="col-md-6 col-lg-4">
                            <div class="team-box">
                                <div class="pic">
                                    <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="{{$key->name}}">
                                    <div class="social_media_team">
                                        <ul class="team_social">
                                            <li><a href="{{'mailto:'.$key->email}}"><i class="fa fa-envelope"></i></a></li>
                                            <li><a href="{{$key->fblink}}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="{{$key->telegram}}"><i class="fa fa-send"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-prof">
                                    <h3 class="post-title details-font color-darkblue">{{$key->name}}</h3>
                                    <h3 class="designation">{!!$key->designation!!}</h3>
                                    <img src="assets/images/poly.png"/>
                                    {!! $key->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="team-third">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title mt-5">
                                    <h2 class="text-center">Creative Team</h2>
                                </div>
                            </div>
                            @foreach($creative as $key )
                                <div class="col-md-6 col-lg-4">
                                    <div class="team-box">
                                        <div class="pic">
                                            <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="{{$key->name}}">
                                            <div class="social_media_team">
                                                <ul class="team_social">
                                                    <li><a href="{{'mailto:'.$key->email}}"><i class="fa fa-envelope"></i></a></li>
                                                    <li><a href="{{$key->fblink}}"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="{{$key->telegram}}"><i class="fa fa-send"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="team-prof">
                                            <h3 class="post-title details-font color-darkblue">{{$key->name}}</h3>
                                            <h3 class="designation">{!!$key->designation!!}</h3>
                                            <img src="assets/images/poly.png"/>
                                            {!! $key->description !!}
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="team-second">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            <h2 class="text-center">Support</h2>
                        </div>
                    </div>
                    @foreach($support as $key )
                        <div class="col-md-6 col-lg-4">
                            <div class="team-box">
                                <div class="pic">
                                    <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="{{$key->name}}">
                                    <div class="social_media_team">
                                        <ul class="team_social">
                                            <li><a href="{{'mailto:'.$key->email}}"><i class="fa fa-envelope"></i></a></li>
                                            <li><a href="{{$key->fblink}}"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="{{$key->telegram}}"><i class="fa fa-send"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="team-prof">
                                    <h3 class="post-title details-font color-darkblue">{{$key->name}}</h3>
                                    <h3 class="designation">{!! $key->designation !!}</h3>
                                    <img src="assets/images/poly.png"/>
                                    {!! $key->description !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="team-last">
            <div  class="container">
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="title mt-5">
                                    <h2 class="text-center">Advisors</h2>
                                </div>
                            </div>
                            @foreach($advisors as $key )
                                <div class="col-md-6 col-lg-4">
                                    <div class="team-box">
                                        <div class="pic">
                                            <img src="{{asset('assets/images/user/team_member').'/'.$key->image}}" alt="{{$key->name}}">
                                            <div class="social_media_team">
                                                <ul class="team_social">
                                                    <li><a href="{{'mailto:'.$key->email}}"><i class="fa fa-envelope"></i></a></li>
                                                    <li><a href="{{$key->fblink}}"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="{{$key->telegram}}"><i class="fa fa-send"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="team-prof">
                                            <h3 class="post-title details-font color-darkblue">{{$key->name}}</h3>
                                            <h3 class="designation">{!! $key->designation!!}</h3>
                                            <img src="assets/images/poly.png"/>
                                            {!! $key->description !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>
    .inner-page .header-bottom {
        background: #cacaca;
    }
    .inner-page ~ .dashboard-body {
        background-color: #cacaca;
    }
</style>
@endsection