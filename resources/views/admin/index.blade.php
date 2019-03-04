@extends('admin.layouts.app') 
@section('content')
<div id="page-wrapper" class="gray-bg dashbard-1">
	<div class="content-main">

		<!--banner-->
		<div class="banner">

			<h2>
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
			</h2>
		</div>
		<!--//banner-->
		<!--content-->
		<div class="content-top">


			<div class="col-md-4">
				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Balance</h5>
						<label>{{$data['balance']}}</label>
					</div>
					<div class="col-md-6 top-content1">
						<div id="demo-pie-1" class="pie-title-center" data-percent="{{$data['b']}}"> <span class="pie-value"></span> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Credit</h5>
						<label>{{$data['credit']}}</label>
					</div>
					<div class="col-md-6 top-content1">
						<div id="demo-pie-2" class="pie-title-center" data-percent="{{$data['c']}}"> <span class="pie-value"></span> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="content-top-1">
					<div class="col-md-6 top-content">
						<h5>Debit</h5>
						<label>{{$data['debit']}}</label>
					</div>
					<div class="col-md-6 top-content1">
						<div id="demo-pie-3" class="pie-title-center" data-percent="{{$data['d']}}"> <span class="pie-value"></span> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-8 content-top-2">
				<!---start-chart---->
				<!----->
				<div class="content-graph">
					<div class="content-color">
						<div class="content-ch">
							<p><i></i>Credit </p>
							<div class="clearfix"> </div>
						</div>
						<div class="content-ch1">
							<p><i></i>Debit</p>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="graph-container">
						<div id="graph-lines"> </div>
						<div id="graph-bars"> </div>
					</div>

				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="content-top">
			<div class="col-md-12">
				<div class="content-top-1">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h5 class="panel-title">Recent Transactions</h5>
						</div>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">S/N</th>
										<th scope="col">Name</th>
										<th scope="col">Amount</th>
										<th scope="col">Type</th>
										<th scope="col">Date</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 1 
@endphp @foreach ($data['transactions'] as $transaction)
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
 
@section('scripts')
<!--graph-->
<link rel="stylesheet" href="{{asset('css/graph.css')}}">
<!--//graph-->
<script src="{{asset('js/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{asset('js/flot.resize.js')}}"></script>

<script>
	// console.log(d);
	$(document).ready(function () {
		var d;
		$.ajax({
			url:'/api/data',
			type:'get',
			dataType: 'json',
			success:function(data){
				// console.log(data);
				drawLineGraph(data);
			}
		})
		
		
				// Lines Graph #############################################
				function drawLineGraph(data1){
					var data = [{
						data: data1.data[0].data,
						color:"rgb(10, 146, 6)"
					},
					{
						data: data1.data[1].data,
						color:"#FBB03B",
						points:{radius:4, fillColor:"#FBB03B"}
					}
				];
		
				$.plot($('#graph-lines'),data, {
					series: {
						points: {
							show: true,
							radius: 5
						},
						lines: {
							show: true
						},
						shadowSize: 0
					},
					grid: {
						color: '#7f8c8d',
						borderColor: 'transparent',
						borderWidth: 20,
						hoverable: true
					},
					xaxis: {
						tickColor: 'transparent',
						tickDecimals: 2
					},
					yaxis: {
						tickSize: 1000
					}
				});

								// Graph Toggle ############################################
								$('#graph-bars').hide();
			
			$('#lines').on('click', function (e) {
				$('#bars').removeClass('active');
				$('#graph-bars').fadeOut();
				$(this).addClass('active');
				$('#graph-lines').fadeIn();
				e.preventDefault();
			});
		
			$('#bars').on('click', function (e) {
				$('#lines').removeClass('active');
				$('#graph-lines').fadeOut();
				$(this).addClass('active');
				$('#graph-bars').fadeIn().removeClass('hidden');
				e.preventDefault();
			});
		
			// // Tooltip #################################################
			// function showTooltip(x, y, contents) {
			// 	$('<div id="tooltip">' + contents + '</div>').css({
			// 		top: y - 16,
			// 		left: x + 20
			// 	}).appendTo('body').fadeIn();
			// }
		
			// var previousPoint = null;
		
			// $('#graph-lines, #graph-bars').bind('plothover', function (event, pos, item) {
			// 	if (item) {
			// 		if (previousPoint != item.dataIndex) {
			// 			previousPoint = item.dataIndex;
			// 			$('#tooltip').remove();
			// 			var x = item.datapoint[0],
			// 				y = item.datapoint[1];
			// 				showTooltip(item.pageX, item.pageY, y + ' percent ' + x + '.00h');
			// 		}
			// 	} else {
			// 		$('#tooltip').remove();
			// 		previousPoint = null;
			// 	}
			// });

			}
			
			

			
			});

</script>
@endsection