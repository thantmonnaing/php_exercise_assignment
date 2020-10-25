<?php 
	require('frontend_header.php');
?>

<div class="jumbotron jumbotron-fluid subtitle">
	<div class="container">
		<h1 class="text-center text-white"> Create Account </h1>
	</div>
</div>

<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-8">
			<?php if(isset($_SESSION['password'])){ ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  	<p> <?= $_SESSION['password']; ?> </p>

					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    	<span aria-hidden="true">&times;</span>
					  	</button>
					</div>
			<?php } unset($_SESSION['password']); ?>

			<form action="signup.php" method="POST">
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1" for="inputName"> Name</label>
							<input class="form-control py-4" id="inputName" type="text" placeholder="Enter Name" name="name" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1" for="phone">Phone Number</label>
							<input class="form-control py-4" id="phone" type="text" placeholder="Enter Phone Number" name="phone" />
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="small mb-1" for="inputEmailAddress">Email</label>
					<input class="form-control py-4" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1" for="inputPassword">Password</label>
							<input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
							<font id="error" color="red"></font>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
							<input class="form-control py-4" id="inputConfirmPassword" type="password" placeholder="Confirm password" name="confirm_password" />
							<font id="cerror" color="red"></font>
						</div>
					</div>					
				</div>

				<div class="form-group">
					<label class="small mb-1" for="address"> Address </label>
					<textarea class="form-control" name="address"></textarea>
				</div>

				<div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

					<button type="submit" class="btn btn-secondary mainfullbtncolor btn-block"> Create Account </button>
				</div>
			</form>

			<div class=" mt-3 text-center ">
				<a href="login.php" class="loginLink text-decoration-none">Have an account? Go to login</a>
			</div>
		</div>
	</div>
</div>


<?php 
	require('frontend_footer.php');
?>