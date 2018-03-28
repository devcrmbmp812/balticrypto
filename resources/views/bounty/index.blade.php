@extends('layouts.master')
@section('title') BCT Coin Bounty @endsection

@section('content')

    <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Bounty Dashboard</h4>
            </div>
        </div>

        <hr>
        <a href="{{ url('redirect/facebook') }}"><button class="btn btn-info"><i class="fa fa-facebook-official" aria-hidden="true"></i>&nbsp;Login With Facebook</button></a>
        <a href="{{ url('redirect/twitter') }}"><button class="btn btn-info"><i class="fa fa-twitter-square" aria-hidden="true"></i>&nbsp;Login With Twitter</button></a>

        <a href="{{ url('go_to/reddit') }}"><button class="btn btn-info"> <i class="fa fa-reddit-alien" aria-hidden="true"></i>&nbsp;Reddit</button></a>

        <a href="{{ url('go_to/bitcointalk') }}"><button class="btn btn-info"> <i class="fa fa-btc" aria-hidden="true"></i>&nbsp;Bitcointalk</button></a>

        <a href="{{ url('go_to/telegram') }}"><button class="btn btn-info"> <i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Telegram</button></a>

    </div></div>

@endsection
