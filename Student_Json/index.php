<?php 
	require "header.php";
?>


<div class="container" id="stu_register">
	<form action="savestudent.php" method="POST" enctype="multipart/form-data">
		<div class="row my-5">
			<div class="col-12">
				<h2 class="text-center">Add New Student</h2>
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="stu_profile">Profile</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<input type="file" class="form-control-file" id="stu_profile" name="stu_profile">
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="stu_name">Name</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<input type="text" class="form-control" id="stu_name" name="stu_name" placeholder="Enter Name">
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="stu_email">Email</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<input type="email" class="form-control" id="stu_email" name="stu_email" placeholder="Enter Email">
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label>Gender</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="stu_gender" id="stu_male" value="male" checked>
					<label class="form-check-label" for="stu_male">
						Male
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="stu_gender" id="stu_female" value="female">
					<label class="form-check-label" for="stu_female">
						Female
					</label>
				</div>
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="stu_address">Address</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<textarea class="form-control" id="stu_address" rows="5" name="stu_address"></textarea>
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<button type="submit" class="btn btn-primary" id="btn_save">Save</button>
			</div>
		</div>
	</form>
</div>


<!-- edit -->

<div class="container" id="edit_register">
	<form action="updatestudent.php" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="edit_id" id="edit_id">
		<input type="hidden" name="edit_oldprofile" id="edit_oldprofile">

		<!-- <div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="edit_profile">Profile</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10" >
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Old Profile</span>
					</div>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="edit_profile">
						<label class="custom-file-label" for="inputGroupFile04">New Profile</label>
					</div>
				</div>
				<img src="" width="100px" height="70px" id="add_image">
			</div>
		</div> -->
		<div class="row my-5">
			<div class="col-12">
				<h2 class="text-center">Update Existing Student</h2>
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="edit_profile">Profile</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10" >
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a href="#oldprofile" class="nav-link active" id="oldprofile_tab" data-toggle="tab" role="tab" aria-controls="oldprofile" aria-selected="true">Old Profile</a>
					</li>
					<li class="nav-item">
						<a href="#newprofile" class="nav-link" id="newprofile_tab" data-toggle="tab" role="tab" aria-controls="newprofile" aria-selected="false">New Profile</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="oldprofile" role="tab-panel" aria-labelledby="oldprofile_tab">
						<img src="" width="100px" height="70px" id="add_image" class="img-fluid">
					</div>
					<div class="tab-pane fade" id="newprofile" role="tab-panel" aria-labelledby="newprofile_tab">
						<input type="file" id="edit_newprofile" name="edit_newprofile">
					</div>
				</div>
			</div>
		</div>


		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="edit_name">Name</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<input type="text" class="form-control" id="edit_name" name="edit_name">
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="edit_email">Email</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<input type="email" class="form-control" id="edit_email" name="edit_email">
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label>Gender</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="edit_gender" id="edit_male" value="male" checked>
					<label class="form-check-label" for="edit_male">
						Male
					</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="edit_gender" id="edit_female" value="female">
					<label class="form-check-label" for="edit_female">
						Female
					</label>
				</div>
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<label for="edit_address">Address</label>
			</div>
			<div class="col-9 col-sm-9 col-md-10 col-lg-10">
				<textarea class="form-control" id="edit_address" name="edit_address" rows="5"></textarea>
			</div>
		</div>
		<div class="row m-4">
			<div class="col-3 col-sm-3 col-md-2 col-lg-2">
				<button type="submit" class="btn btn-primary" id="btn_update">Update</button>
			</div>
		</div>
	</form>
</div>

<div class="container-fluid">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Email</th>
				<th scope="col">Gender</th>
				<th scope="col">Address</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>
</div>

<div class="modal" tabindex="-1" id="DetailModal">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Student Information</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-4 col-sm-4 col-md-4 col-lg-4">
							<img src="" width="200px" height="200px" class="img-fluid" id="detail_image">
						</div>
						<div class="col-8 col-sm-8 col-md-8 col-lg-8">
							<h2 id="detail_name"></h2>
							<p id="detail_email"></p>
							<p id="detail_gender"></p>
							<p id="detail_address"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#edit_register").hide();
		
		getstudentlist();
		

		$("tbody").on('click','.btn_edit',function(){
			$("#edit_register").show();
			$("#stu_register").hide();
			$id = $(this).data('id');

			$.get('studentlist.json',function(response){
				var student_obj_array = response;
				$("#edit_name").val(student_obj_array[$id].name);
				$("#edit_email").val(student_obj_array[$id].email);
				$("#edit_address").val(student_obj_array[$id].address);
				$("#add_image").attr("src", student_obj_array[$id].profile);

				var gender = student_obj_array[$id].gender;
				if(gender == "male"){
					$("#edit_male").prop('checked','checked');
				}else{
					$("#edit_female").prop('checked','checked');
				}

				$("#edit_id").val($id);
				$("#edit_oldprofile").val(student_obj_array[$id].profile);
			})			
			
		})

		$("tbody").on('click','.btn_detail',function(){
			$id = $(this).data('id');			

			$.get('studentlist.json',function(response){
				var student_obj_array = response;
				$("#detail_name").text(student_obj_array[$id].name);
				$("#detail_email").text(student_obj_array[$id].email);
				$("#detail_gender").text(student_obj_array[$id].gender);
				$("#detail_address").text(student_obj_array[$id].address);
				$("#detail_image").attr("src", student_obj_array[$id].profile);
				$("#DetailModal").modal('show');
			});	
			
		});

		$("tbody").on('click','.btn_delete',function(){
			$id = $(this).data('id');

			var con = confirm("Are you sure you want to delete?");

			if(con){
				$.post('deletestudent.php',{id:$id},function(data){
					getstudentlist();
				})
			}		
			
		});

		function getstudentlist(){

			$.get('studentlist.json',function(response){

	    		console.log(typeof(response));

				var student_obj_array = response;
				var html="";
				var i = 1;
				$.each(student_obj_array,function(j,value){					
					html += `
					<tr>
					<td>${i++}</td>
					<td>${value.name}</td>
					<td>${value.email}</td>
					<td>${value.gender}</td>
					<td>${value.address}</td>
					<td>
					<button class="btn btn-warning btn_detail" data-id="${j}" data-toggle="modal" data-target="#DetailModal">Detail</button>

					<button class="btn btn-primary btn_edit" data-id="${j}">Edit</button>

					<button class="btn btn-danger btn_delete" data-id="${j}">Delete</button>
					</td>
					</tr>
					`;
				});
				$("tbody").html(html);
			});
		}
	})
</script>

<?php 
	require "footer.php";
?>