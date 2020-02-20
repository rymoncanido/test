@extends('layout')
@section('content')
<div class="title">
	<p>New Paint Job</p	>
</div>
<div class="paint">
	<div id="left" class="gray car"></div>
	<div class="result"></div>
	<div id="right" class="gray car"></div>
</div>
<form method="POST" action="{{route('paintjob.store')}}">
	@csrf
	<p>Car Details</p>
	<div class="field">
		<label for="plateNo">Plate No.</label>
		<input id="plateNo" type="text" name="plate" required>
	</div>
	<div class="field">
		<label for="current">Current Color</label>
		<select id="current" name="last_color" required>
			<option selected disabled></option>
			<option value="r">Red</option>
			<option value="g">Green</option>
			<option value="b">Blue</option>
		</select>
	</div>
	<div class="field">
		<label for="plnewateNo">Target Color</label>
		<select id="new" name="new_color" required>
			<option selected disabled></option>
			<option value="r">Red</option>
			<option value="g">Green</option>
			<option value="b">Blue</option>
		</select>
	</div>
	<div class="field">
		<button type="submit">Submit</button>
	</div>
</form>
@endsection