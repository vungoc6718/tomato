<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="container-fluid">
<!--DataTables -->

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Sửa Tài Khoản</h6>
	</div>
	<div class="card-body">
		<?php

				
				if(isset($_POST['edit_btn']))
				{
					$email = $_POST['edit_email'];

					$query = "SELECT * FROM register WHERE email = '$email' ";
					$query_run= mysqli_query($connection,$query);
					foreach ($query_run as $row) 
					{
						 ?>
			
						<form action="code.php" method="POST">

							<div class="form-group">
								<label> Email </label>
								<input type="text" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control" placeholder ="Enter email" >
							</div>
							<div class="form-group">
								<label> Username </label>
								<input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control" placeholder ="Enter username" >
							</div>
							
							<div class="form-group">
								<label> Password </label>
								<input type="text" name="edit_password" value="<?php echo $row['password'] ?>" class="form-control" placeholder ="Enter password" >
							</div>
							<div class="form-group">
								<label> Usertype </label>
								<select name="update_usertype" class="form-control">
									<option value="superadmin"> superadmin</option>
									<option value="admin"> admin </option>						
									<option value="accountant"> accountant </option>
									<option value="teacher"> teacher </option>
									<option value="student"> student </option>
									<option value="parents"> parents </option>
									
								</select>
							</div>
							<button type="submit" name="updatebtn" class="btn btn-primary"> Update</button>
							<a href="register.php" class="btn btn-danger"> CANCEL </a>	
						</form>
						<?php 
					}
				}	
						 ?>
	</div>
</div>
</div>

<?php 
include 'includes/scripts.php';
include 'includes/footer.php';
 ?> 