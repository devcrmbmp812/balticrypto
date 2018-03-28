@extends('layouts.master')
@section('title') BCT Coin Home Page @endsection
@section('style')
    <style type="text/css">
        button.btn.btn-warning {
            color: #fff;
        }

        .badge-warning {
            color: #fff !important;
        }

        .btndashboard {
            width: 120px;
        }

        @media only screen and (max-width: 768px) {
            .width50 {
                width: 50%;
            }
        }
    </style>

@endsection
@section('content')
    <?php
    // check admin or user
    $slug = Sentinel::getUser()->roles()->first()->slug;
    ?>
        <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">User Kyc List</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">User Kyc List</a>
                    </li>
                </ol>
            </div>
            <div class="col-sm-12">
                @if(session('error'))<br>
                <div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                @if(session('success'))<br>
                <div class="alert alert-success">{{ session('success') }}</div><br>@endif
                <div class="card">
                    <div class="card-body table-responsive">
                        <div class="col-md-12 ">
                            <h4>User Kyc List</h4>
                        </div>
                        <div class="mb-4"></div>
                        <!-- <table class="table table-striped data-table"> -->
                        <table id="data-table" class="data-table table table-striped data-table" cellspacing="0" width="100%">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Kyc Image First</th>
                                <th scope="col">Kyc Image Second</th>
                                <th scope="col">Kyc Status</th>
                                <th scope="col">View Kyc</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
?>
                            @foreach($user_data as $user)
                            @if($user->kyc_image_one != null || $user->kyc_image_two != null)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->kyc_image_one != null)
                                            <img src="{{url('assets/images/user/kyc')}}/{{ $user->kyc_image_one }}" class="kyc-doc">
                                        @else
                                            <img style="height:50px"  src="{{url('assets/images/user/kyc/no-image-available.png')}}">
                                        @endif

                                    </td>
                                    <td>
                                        @if($user->kyc_image_one != null)
                                        <img src="{{url('assets/images/user/kyc')}}/{{ $user->kyc_image_two }}" class="kyc-doc">
                                         @else
                                            <img style="height:50px"  src="{{url('assets/images/user/kyc/no-image-available.png')}}">
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->kyc_status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif($user->kyc_status == 1)
                                            <span class="badge badge-success">Accepted</span>
                                        @else
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->kyc_image_one != null && $user->kyc_image_one != null)
                                             <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#info-model{{ $user->id }}">View Kyc</button>
                                        @else
                                            -
                                        @endif

                                    </td>
                                </tr>
                                @endif
<div class="modal fade bd-example-modal-lg" id="model-kyc-document" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                               
                                    <div class="modal-dialog modal-lg">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    
                                                 <div id="largekyc">   

                                                 </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>


                                <div class="modal fade" id="info-model{{$user->id}}" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            Username
                                                        </div>
                                                        <div class="col-md-4">
                                                            {{ $user->username }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            Email
                                                        </div>
                                                        <div class="col-md-4">
                                                            {{ $user->email }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4 vert-cen">
                                                            Kyc First iamge
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img style="height: 60px;" class="kyc-doc" src="{{url('assets/images/user/kyc')}}/{{ $user->kyc_image_one }}">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4 vert-cen">
                                                            Kyc Second iamge
                                                        </div>
                                                        <div class="col-md-4">
                                                            <img style="height: 60px;" class="kyc-doc" src="{{url('assets/images/user/kyc')}}/{{ $user->kyc_image_two }}"><br><br>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            Kyc Status
                                                        </div>
                                                        <div class="col-md-6">
                                                         @if($user->kyc_status == 0)

                                                                @if($slug == 4)
                                                                    <a href="{{ url('support/kycUpdate',$user->id) }}/1" class="btn btn-info ">Accept</a>
                                                                    <a href="{{ url('support/kycUpdate',$user->id) }}/2" class="btn btn-info ">Reject</a>
                                                                @else
                                                                    <a href="{{ url('admin-kycUpdate',$user->id) }}/1" class="btn btn-info ">Accept</a>
                                                                    <a href="{{ url('admin-kycUpdate',$user->id) }}/2" class="btn btn-info ">Reject</a>
                                                                @endif

                                                         @elseif($user->kyc_status == 2)
                                                            Rejected
                                                         @else
                                                            Accepted
                                                         @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
@section('script')

    <script src="{{ url('assets/js/clipboard.min.js') }}"></script>
    <script>
        $(document).ready(function () {

            $('.data-table').DataTable();
        });
    </script>

    <script>
        $(".kyc-doc").click(function () {
            //alert();
            var kycimage = $(this).attr("src");
            $("#largekyc").html("<img src='"+kycimage+"' class='img-fluid'>");
            $("#model-kyc-document").modal("show");
            //$('.data-table').DataTable();
        });
    </script>
    

@endsection