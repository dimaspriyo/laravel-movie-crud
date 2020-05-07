<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<title>Laravel Movie CRUD</title>

<link rel="stylesheet" type="text/css"
href="{{ asset('bootstrap/css/bootstrap.css') }}">

<link rel="stylesheet" type="text/css"
	href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

<style type="text/css">
body .container {
	padding-top: 20px;
}
</style>






<script src="https://code.jquery.com/jquery-3.5.0.min.js"
	integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
	crossorigin="anonymous"></script>
<script type="text/javascript"
	src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});
</script>


</head>
<body>

	<div class="container">

		<div class="jumbotron d-flex justify-content-center mb-3 pt-4" style="height: 100px">
			<h2>Laravel Movie CRUD</h2>
		</div>

		<h2 class="text-center"> Update Form </h2>
		<div class="row justify-content-center">
			
		<form class="form-horizontal w-50" action="{{ url('movies/'.$movie->id) }}" method="POST">
			@csrf
			{{ method_field('PATCH') }}
				@if (session('failed'))
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"
						aria-hidden="true">&times;</button>
					<h5>
						<i class="icon fas fa-check"></i> Alert!
					</h5>
					{{ $failed }}
				</div>
				@endif


				  @if ($errors->any())
				  <div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
				  	<table>
						@foreach ($errors->all() as $error)
							
						@endforeach
						<tr>
							<td>{{ $error }} </td>
						</tr>	
					</table>	  
				</div>
				  @endif
				

					<div class="form-group row">
						<label class="col-sm-3 form-label"> Movie Name </label>
						<div class="col-sm-7">
						<input type="text" class="form-control" name="name" value="{{ $movie->name }}">
							
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 form-label"> Genre </label>
						<div class="col-sm-7">
							<select name="genre">

								@if ($movie->genre == 'horror')
								<option value="horror" checked="checked">Horror</option>
								@else
								<option value="horror">Horror</option>
								@endif
								

								@if ($movie->genre == 'comedy')
								<option value="comedy" checked="checked">Comedy</option>
								@else
								<option value="comedy">Comedy</option>
								@endif
								
								@if ($movie->genre == 'romance')
								<option value="romance" checked='checked'>Romance</option>
								@else
								<option value="romance">Romance</option>
								@endif

								@if ($movie->genre == 'action')
								<option value="action" checked='checked'>Action</option>		
								@else
								<option value="action">Action</option>
								@endif
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 form-label"> Release Year </label>
						<div class="col-sm-7">
							<input type="text" class="form-control"name="year" required="required" value="{{ $movie->year }}">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 form-label"> Remake </label>
						<div class="col-sm-7">

							@if ($movie->remake == 'yes')
							<label class="radio-inline"> <input type="radio"
								name="remake" value="yes" checked="checked"> Yes
							</label>
							@else
							<label class="radio-inline"> <input type="radio"
								name="remake" value="yes"> Yes
							</label>  
							@endif
							
							@if ($movie->remake == "no")
							<label class="radio-inline"> <input type="radio"
								name="remake" value="no" checked="checked"> No
							</label>								
							@else
							<label class="radio-inline"> <input type="radio"
								name="remake" value="no"> No
							</label>
							@endif

						</div>
					</div>

					<div class="form-group row">

						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>

					</div>
			</form>

		</div>

	</div>
</body>
</html>
