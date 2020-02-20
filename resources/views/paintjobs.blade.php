@extends('layout')
@section('content')
<div class="title">
	<p>Paint Jobs</p>
</div>
<div id="paintjobs">
	<div id="ongoing">
		<p>Paint Jobs in Progress</p>
		<table>
			<thead>
				<tr>
					<td>Plate No.</td>
					<td>Current Color</td>
					<td>Target Color</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				@foreach($progress as $pj)
				<tr>
					<td>{{$pj->plate}}</td>
					<td>{{$colors[$pj->last_color]}}</td>
					<td>{{$colors[$pj->new_color]}}</td>
					<td>
						<a href="{{route('paintjob.update',['id'=>$pj->id])}}">Mark as Completed</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div id="queue">
		<p>Paint Queue</p>
		<table>
			<thead>
				<tr>
					<td>Plate No.</td>
					<td>Current Color</td>
					<td>Target Color</td>
				</tr>
			</thead>
			<tbody>
				@if(isset($pending))
				@foreach($pending as $pj)
				<tr>
					<td>{{$pj->plate}}</td>
					<td>{{$colors[$pj->last_color]}}</td>
					<td>{{$colors[$pj->new_color]}}</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
<?php $total=0 ?>
@foreach($stats as $stat)
<?php
	$breakdown[$stat['new_color']] = $stat['total'];
	$total+=$stat['total'];
?>
@endforeach
<div id="stats">
	<p>SHOP PERFORMANCE</p>
	<div>
		<p>Total Cars Painted:<span id="total">{{$total}}</span></p>
		<h4>Breakdown:
			<p>Blue<span id="b">{{$breakdown['b'] ?? 0}}</span></p>
			<p>Red<span id="r">{{$breakdown['r'] ?? 0}}</span></p>
			<p>Green<span id="g">{{$breakdown['g'] ?? 0}}</span></p>
		</h4>
	</div>
</div>

@endsection