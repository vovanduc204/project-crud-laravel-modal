<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Free Web tutorials">
	<meta name="keywords" content="HTML,CSS,XML,JavaScript">
	<meta name="author" content="John Doe">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

	<title>Document</title>
</head>
<body>
	
	<!--Start Add Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		 <div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <form action="{{action('EmployeeController@store')}}" method="POST">
			    	{{csrf_field()}}
				    <div class="modal-body">
							<div class="form-group">
							    <label > First Name</label>
							    <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
							    
							</div>
							<div class="form-group">
							   <label > Last Name</label>
							    <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
							</div>
							<div class="form-group">
							    <label > Address</label>
							    <input type="text" name="address" class="form-control" placeholder="Enter Address">
							</div>
							<div class="form-group">
							    <label > Mobile</label>
							    <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number">
							</div>
							
				    </div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Save Data</button>
				    </div>
			    </form>
		    </div>
		</div>
	</div>
<!--End Add Modal -->


<!--Start Edit Modal -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		 <div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <form action="/employee" method="POST" id="editForm">
			    	{{csrf_field()}}
			    	{{ method_field('PUT') }}
				    <div class="modal-body">
							<div class="form-group">
							    <label > First Name</label>
							    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name">
							    
							</div>
							<div class="form-group">
							   <label > Last Name</label>
							    <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name">
							</div>
							<div class="form-group">
							    <label > Address</label>
							    <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
							</div>
							<div class="form-group">
							    <label > Mobile</label>
							    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number">
							</div>
							
				    </div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Update Data</button>
				    </div>
			    </form>
		    </div>
		</div>
	</div>
<!--End Edit Modal -->


<!--Start Delete Modal -->
	<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		 <div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			    <form action="/employee" method="POST" id="deleteForm">
			    	{{csrf_field()}}
			    	{{ method_field('DELETE') }}
				    <div class="modal-body">
							
							<input type="hidden" name="_method" value="DELETE">
							<p>Are you sure ? You want to delete data .</p>
				    </div>
				    <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Delete Data</button>
				    </div>
			    </form>
		    </div>
		</div>
	</div>
<!--End Delete Modal -->


	<div class="container">
		<h1> !! Welcome !! </h1>
		<h1>Laravel CRUD: with Bootstrap Modal </h1>
		@if (count($errors) > 0 )
        <div class="alert alert-danger">
        	<ul>
        		@foreach($errors->all as $error)
        		<li>{{$error}}</li>
        		@endforeach
        	</ul>
        </div>
        @endif
        @if(\Session::has('success'))
			<div class="alert alert-success">
				<p> {{\Session::get('success')}} </p>
			</div>
        @endif
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	  	Add Data
		</button>
		<hr>
		<table id="datatable" class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">	ID	</th>
		      <th scope="col">	First Name	</th>
		      <th scope="col">	Last Name	</th>
		      <th scope="col">	Address	</th>
		      <th scope="col">	Mobile	</th>
		      <th scope="col">	Action	</th>
		    </tr>
		  </thead>
		  <tbody>
			@foreach($emps as $empdata)
		    <tr>
		      <th scope="row">{{$empdata->id}}</th>
		      <td>{{$empdata->fname}}</td>
		      <td>{{$empdata->lname}}</td>
		      <td>{{$empdata->address}}</td>
		      <td>{{$empdata->mobile}}</td>
		      <td>
		      	<a href="#" class="btn btn-success" id="edit">Edit</a>
		      	<a href="#" class="btn btn-danger" id="delete">Delete</a>
		      </td>
		    </tr>
			@endforeach
		  </tbody>
		</table>

	</div>
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<!-- important -->
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>

<script type="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#datatable').DataTable();
		table.on('click', '#edit',function(event) {
			event.preventDefault();
			$tr=$(this).closest('tr');
			if ($($tr).hasClass('child')) {
				$tr=$tr.prev('.parent');
			}
			var data= table.row($tr).data();
			// console.log(data);

			$('#fname').val(data[1]);
			$('#lname').val(data[2]);
			$('#address').val(data[3]);
			$('#mobile').val(data[4]);

			$('#editForm').attr('action', 'employee/' + data[0]);
			$('#editModal').modal('show');
		});
		table.on('click', '#delete',function(event) {
			event.preventDefault();
			$tr=$(this).closest('tr');
			if ($($tr).hasClass('child')) {
				$tr=$tr.prev('.parent');
			}
			var data= table.row($tr).data();
			// console.log(data);
			$('#deleteForm').attr('action', 'employee/' + data[0]);
			$('#deleteModal').modal('show');
		});
	})
</script>













</body>
</html>