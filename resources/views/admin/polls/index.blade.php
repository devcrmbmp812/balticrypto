@extends('layouts.master')
@section('title') BCT Coin | Polls @endsection
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
?>
        <div class="dashboard-body">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Polls</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ URL('admin/dashboard')}}"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Polls</a>
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
                            <h4>Polls</h4>
                        </div>
                       
                        <div class="btn-group" >
                            <a href="{{route('polls.create')}}" id="sample_editable_1_new" class="btn btn-info btn-lg" >
                                Add New
                                <i class="fa fa-plus"></i>
                            </a>
                        </div>
                           
                        <div class="mb-4"></div>
                        <!-- <table class="table table-striped data-table"> -->
                        <table id="data-table" class="data-table table table-striped data-table" cellspacing="0" width="100%">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Sr.</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">Right Count</th>
                                <th scope="col">Wrong Count</th>
                                <th scope="col">Total Count</th>
                                <th scope="col">View Polls</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
?>
                            @foreach($polls as $poll)
                           
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $poll->question }}</td>
                                    <td>{{ $poll->answer }}</td>
                                    <td>{{ $poll->r_count }} </td>
                                    <td>{{ $poll->w_count }} </td>
                                    <td>{{ $poll->total_count }} </td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#info-model{{ $poll->id }}">View </button> 

                                        <a  class="btn btn-info btn-lg" href="{{route('polls.edit',$poll->id)}}" >Edit </a>
                                         <a href="{{ route('polls.destroy',$poll->id) }}" onclick="return confirm('Are you sure you want to delete this?')"><button class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp;&nbsp;</button></a>
                                        
                                    </td>
                                </tr>
                              


                                <div class="modal fade" id="info-model{{$poll->id}}" role="dialog">
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
                                                            Question
                                                        </div>
                                                        <div class="col-md-4">
                                                            {{ $poll->question }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            Option
                                                        </div>
                                                        <div class="col-md-4">
                                                        <?php 
                                                            $op_arr=explode("|",$poll->options);
                                                            for($i=0;$i<= count($op_arr)-2;$i++)
                                                            {
                                                                echo "<p>".($i+1)." - ".$op_arr[$i]."</p>";
                                                            }
                                                        ?>
                                                            
                                                        </div>
                                                    </div> 
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            Answer
                                                        </div>
                                                        <div class="col-md-4">
                                                             {{ $poll->answer }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4 vert-cen">
                                                           Right Count
                                                        </div>
                                                        <div class="col-md-4">
                                                            {{ $poll->r_count }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4 vert-cen">
                                                            Wrong Count
                                                        </div>
                                                        <div class="col-md-4">
                                                             {{ $poll->w_count }}
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                           Total 
                                                        </div>
                                                        <div class="col-md-6">
                                                         {{ $poll->total }}
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
@endsection