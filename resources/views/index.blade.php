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


		<div class="row justify-content-center">

		<form class="form-horizontal w-50" action="{{ url('') }}" method="post">

			@if (session('success'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert"
						aria-hidden="true">&times;</button>
					<h5>
						<i class="icon fas fa-check"></i> Alert!
					</h5>
					{{ $success }}
				</div>
			@endif

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
							<input type="text" class="form-control" name="name">
							
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 form-label"> Genre </label>
						<div class="col-sm-7">
							<select name="genre">
								<option value="horror">Horror</option>
								<option value="comedy">Comedy</option>
								<option value="romance">Romance</option>
								<option value="action">Action</option>
							</select>
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 form-label"> Release Year </label>
						<div class="col-sm-7">
							<input type="text" class="form-control"name="year" required="required">
						</div>
					</div>

					<div class="form-group row">
						<label class="col-sm-3 form-label"> Remake </label>
						<div class="col-sm-7">
							<label class="radio-inline"> <input type="radio"
								name="remake" value="yes"> Yes
							</label> <label class="radio-inline"> <input type="radio"
								name="remake" value="no" checked="checked"> No
							</label>

						</div>
					</div>

					<div class="form-group row">

						<div class="col-sm-12 text-center">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>

					</div>
			</form>

		</div>


		<div class="row mt-3 justify-content-center">

			<div class="w-100">
				<table id="example" class="table table-striped table-bordered">



					<thead>

						<tr>

							<th>No</th>
							<th>Name</th>
							<th>Genre</th>
							<th>Year</th>
							<th>Remake</th>
							<th>Action</th>

						</tr>

					</thead>

					<tbody>
					@foreach ($movies as $movie)
					<tr> 
						<td>{{$movie->id}}</td>
						<td>{{$movie->name}}</td>
						<td>{{$movie->genre}}</td>
						<td>{{$movie->year}}</td>
						<td>{{$movie->remake}}</td>
						<td>
						
						<a href="{{ route('movie.edit',['id' => $movie->id]) }}">
						<button type="button" class="btn btn-primary">Edit</button>
						</a>
						
					<form onsubmit="return confirm('Delete this {{ $movie->name }} movie ? ')" action="{{ route('movie.delete', ['id' => $movie->id]) }}" method="GET">
						<input type="submit" class="btn btn-danger" value="delete"></button>
						</form>
						</td>
						</tr>
					@endforeach
					</tbody>



				</table>
			</div>
		</div>

	</div>
</body>
</html>
