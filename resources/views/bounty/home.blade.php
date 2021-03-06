@extends('layouts.master')
@section('title') BCT Coin Bounty @endsection

@section('content')

    <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">User Details</h4>
            </div>
        </div>

      <div>
        <div>
            @if($service == 'facebook')
            <div class="row">
                <div class="col-md-6">
                     <table class="table">
                    <tr>
                        <td>Name</td>
                        <td>{{ $details->user['name']}}</td>
                    </tr>
                     <tr>
                        <td>Gender</td>
                        <td> {{ $details->user['gender'] }}</td>
                    </tr>

                    <tr>
                        <td>Share Functionality</td>
                        <td><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="btn btn-success">Share</a></td>
                    </tr>
                </table>
                </div>


                <div class="col-md-6">
                    <a href="{{ url('screen-upload','facebook') }}"><button class="btn btn-success">Upload Screenshots</button></a>
                    <hr>
                    <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
                        <thead>
                            <th>Sr No.</th>
                            <th>Document</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                     <?php $i = 1;?>
                    @foreach($fb_data as $key)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="{{ url('/') }}/upload/bounty/{{ $key->document }}" height="70px"></td>
                        <td>
                            @if($key->status == 0)
                            Pending
                            @elseif($key->status == 1)
                            Approve
                            @elseif($key->status == 2)
                           Rejected
                            @else
                            @endif
                        </td>
                        <td>
                             @if($key->status == 0)
                          <a href="{{ url('del_bounty',$key->id) }}"><button class="btn btn-danger">Delete</button></a>
                            @elseif($key->status == 1)
                            Approve
                            @elseif($key->status == 2)
                           Rejected
                            @else
                            @endif

                            </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                    </div>
            </div>


            @endif @if($service == 'twitter')

              <div class="row">
                     <div class="col-md-6">
                          <table class="table">
                    <tr>
                        <td>UserName</td>
                        <td>{{ $details->nickname }}</td>
                    </tr>
                     <tr>
                        <td>Total Tweets</td>
                        <td>{{ $details->user['statuses_count']}}</td>
                    </tr>

                     <tr>
                        <td>Followers</td>
                        <td>{{ $details->user['followers_count']}}</td>
                    </tr>

                      <tr>
                        <td>Following</td>
                        <td>{{  $details->user['friends_count']}}</td>
                    </tr>
                      <tr>
                        <td><a href="http://goo.gl/HYs3Le" target="_blank" class="btn btn-success">Tweet</a></td>
                    </tr>
                </table>
                    </div>
                     <div class="col-md-6">
                          <a href="{{ url('screen-upload','twitter') }}"><button class="btn btn-success">Upload Screenshots</button></a>
                          <hr>
                    <table id="data-table" class="table table-striped data-table" cellspacing="0" width="100%">
                        <thead  class="thead-dark">
                            <th  scope="col">Sr No.</th>
                            <th scope="col">Document</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </thead>
                        <tbody>
                     <?php $i = 1;?>
                    @foreach($tw_data as $key)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="{{ url('/') }}/upload/bounty/{{ $key->document }}" height="70px"></td>
                        <td>
                            @if($key->status == 0)
                            Pending
                            @elseif($key->status == 1)
                            Approve
                            @elseif($key->status == 2)
                           Rejected
                            @else
                            @endif
                        </td>
                        <td>

                            @if($key->status == 0)
                         <a href="{{ url('del_bounty',$key->id) }}"><button class="btn btn-danger">Delete</button></a>
                            @elseif($key->status == 1)
                            Approve
                            @elseif($key->status == 2)
                           Rejected
                            @else
                            @endif
                            </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                    </div>
             </div>



         @endif
        </div>
    </div>

    </div></div>

@endsection
@section('script')

<script type="text/javascript">
      $(document).ready(function () {

            $('#data-table').DataTable();
        });
</script>

@endsection
