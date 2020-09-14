<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_superadmin.php';
 ?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Khoản</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email">
            </div>

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <label>Usertype</label>
                <input type="text" name="usertype" class="form-control" placeholder="Enter Usertype">
            </div>
            <div class="form-group">
                <label>Mã</label>
                <input type="text" name="ma" class="form-control">
            </div>
            
            <input type="hidden" name="usertype" value="admin">
        </div>
        <div class="modal-footer">           
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Tài Khoản</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Thêm Tài Khoản 
      </button>
 
  </div>

        <div class="card-body">

        <?php 
        if(isset($_SESSION['success'])&& $_SESSION['success']!='')
        {
        	echo '<h2 class="bg-primary text-white"> '.$_SESSION['success'].' </h2>';
        	unset($_SESSION['success']);
        }

        if(isset($_SESSION['status'])&& $_SESSION['status']!='')
        {
        	echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
        	unset($_SESSION['status']);
        }
         ?>

          <div class="table-responsive">

      	<?php  
      		
      		$query = "SELECT * FROM register";
      		$query_run= mysqli_query($connection,$query);
      	?>
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Email </th>
            <th> Username </th>           
            <th>Password</th>
            <th>Usertype</th>
            <th>Mã</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
     	<?php 
     		if(mysqli_num_rows($query_run)>0)
     		{
     			while ($row=mysqli_fetch_assoc($query_run)) 
     			{
     				?>			
     				<tr>
			            <td> <?php echo $row['email']; ?></td>
			            <td> <?php echo $row['username']; ?></td>			            
			            <td> <?php echo $row['password']; ?> </td>
                  <td> <?php echo $row['usertype']; ?> </td>
                  <td> <?php echo $row['Ma']; ?> </td>
			            <td>
			                <form action="register_edit.php" method="POST">
			                    <input type="hidden" name="edit_email" value="<?php echo $row['email']; ?>" >
			                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>		                    
			                </form>
			            </td>
			            <td>
			                <form action="code.php" method="POST">
			                  <input type="hidden" name="delete_email" value="<?php echo $row['email']; ?>">
			                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
			                </form>
			            </td>
			        </tr>
     	<?php			
     			}
     		}
     		else{
     			echo "No record found";
     		}	
     	 ?>
          
        
        </tbody>
      </table>

    </div>
  </div>
</div>


 <?php 
	include 'includes/scripts.php';
  	include 'includes/footer.php';
  ?>