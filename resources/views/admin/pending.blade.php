@extends('admin.layouts.app') 
@section('style') {{--
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet" />

<link href="{{asset('css/style.min.css')}}" rel="stylesheet"> --}}
@endsection
 
@section('content')
<div id="page-wrapper" class="gray-bg dashbard-1">
    <div class="content-main">

        <!--banner-->
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Pending Transaction</span>
            </h2>

        </div>
        {{--
        <!--banner-->
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Transaction</span>
            </h2>

        </div>
        <!--banner-->
        <div class="banner">

            <h2>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
                <span>Transaction</span>
            </h2>

        </div> --}}
        <!--//banner-->
        <!--content-->
        <div class="content-top">
            <div class="col-md-12">
                <div class="content-top-1">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h5 class="panel-title">Pending Transaction</h5>
                        </div>
                        <div class="panel-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">S/N</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i = 1) @foreach ($transactions as $transaction)
                                    <tr>
                                        <th scope="row">{{$i++}}</th>
                                        <td>{{$transaction->user->name}}</td>
                                        <td>{{formatNumber($transaction->amount)}}</td>
                                        <td>{{$transaction->type}}</td>
                                        <td>{{$transaction->created_at->format('M d Y')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

@endsection
 
@section('script')

<script src="{{asset('js/custom.min.js')}}"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $('#zero_config').DataTable();

</script>
@endsection