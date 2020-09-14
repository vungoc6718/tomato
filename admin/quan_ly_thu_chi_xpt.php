<?php 
include 'security.php';
include 'includes/header.php';
include 'includes/navbar_ketoan.php';
 ?>


<div class="container-fluid">
<h1 class="h3 mb-2 text-gray-800">Quản Lý Thu Chi</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">    
      <a class="btn btn-info"  href="quan_ly_thu_chi.php" >Back</a>
 	  
  </div>
  <div class="table-responsive" >

      	<?php  
      		
      		$query = "
          SELECT thu_tien_hoc.id,MaThu,thu_tien_hoc.NgayThang,hoc_sinh.MaHocSinh,TenHocSinh,SoTien,NoiDung,NguoiThu,hoc_sinh.NgaySinh,Lop,MaPH,SDT,hoc_sinh.DiaChi 
              FROM thu_tien_hoc 
              INNER JOIN hoc_sinh on thu_tien_hoc.MaHocSinh = hoc_sinh.MaHocSinh 
              
          ";
      		$query_run= mysqli_query($connection,$query);
      	?>
     
  <div class="card-body">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           <th>STT </th>
           <th>Mã Thu </th>
           <th>Ngày Tháng</th> 
           <th>Mã Học Sinh</th>
           <th>Tên Học Sinh</th>
           <th>Lớp</th>    
           <th>Số Tiền</th> 
           <th>Nội Dung</th>
           <th>Người Thu</th>
           <th>Xuất Phiếu Thu</th> 
          </tr>
        </thead>
        <tbody>

        <?php 
        $serial_number=0;
        
        if(mysqli_num_rows($query_run)>0)
        {
          while ($row=mysqli_fetch_assoc($query_run)) 
          {
             $serial_number++;
            ?>      
            <tr>
                  <td> <?php echo $serial_number; ?></td>
                  <td> <?php echo $row['MaThu']; ?></td> 
                  <td> <?php echo $row['NgayThang']; ?></td> 
                  <td> <?php echo $row['MaHocSinh']; ?></td>
                  <td> <?php echo $row['TenHocSinh']; ?></td> 
                  <td> <?php echo $row['Lop']; ?></td> 
                  <td> <?php echo number_format($row['SoTien']); ?></td>     
                  <td> <?php echo $row['NoiDung']; ?></td>
                  <td> <?php echo $row['NguoiThu']; ?></td>
                   <td>
                      <form action="quan_ly_thu_chi_pdf.php" method="POST">
                        <input type="hidden" name="id_thu" value="<?php echo $row['id']; ?>">
                        <input type="submit" name="xuat_phieu_thu" value="Xuất Phiếu Thu" class="btn btn-primary">
                        
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