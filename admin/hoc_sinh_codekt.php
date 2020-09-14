<?php 
include 'security.php';

$connection->query("SET NAMES 'utf8'");
if (isset($_POST['add_btn'])) 
{ 
  $id = $_POST['id'];
  $ma_hs = $_POST['ma_hs'];
  $ten_hs = $_POST['ten_hs']; 
  $ngay_sinh = $_POST['ngay_sinh'];

  $lop = $_POST['lop'];
  $phu_huynh = $_POST['phu_huynh'];
  $sdt = $_POST['sdt'];
  $dia_chi = $_POST['dia_chi'];
  $ghi_chu = $_POST['ghi_chu'];  
  $tinh_trang = $_POST['tinh_trang'];

  $query = $connection->query("INSERT INTO hoc_sinh(MaHocSinh,TenHocSinh,NgaySinh,Lop,MaPH,SDT,DiaChi,GhiChu, ThangNhapHoc, NamNhapHoc, tinhtrang) VALUES('$ma_hs','$ten_hs','$ngay_sinh','$lop','$phu_huynh','$sdt','$dia_chi','$ghi_chu','$thang_nhap_hoc','$nam_nhap_hoc','$tinh_trang')", MYSQLI_STORE_RESULT);
  $query_run = mysqli_query($connection,$query);
  if ($query_run) { 
    $_SESSION['status']="Thêm Thất Bại";
    header('Location: hoc_sinhkt.php ');
  } else {
  
    $_SESSION['success']="Thêm Thành Công";
    header('Location: hoc_sinhkt.php');
    
  }
  
 }  


if(isset($_POST['update_btn']))
 { 
    
    $id =$_POST['edit_id'];
    $ma_hs = $_POST['ma_hs'];
    $ten_hs = $_POST['ten_hs']; 
    $ngay_sinh = $_POST['ngay_sinh'];

    $lop = $_POST['lop'];
    $phu_huynh = $_POST['phu_huynh'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['dia_chi'];
    $ghi_chu = $_POST['ghi_chu'];   
    $ttrang = $_POST['ttrang'];

    $query= "UPDATE hoc_sinh SET MaHocSinh ='$ma_hs', TenHocSinh='$ten_hs', NgaySinh ='$ngay_sinh', Lop ='$lop', MaPH='$phu_huynh', SDT ='$sdt', DiaChi='$dia_chi', GhiChu='$ghi_chu', ThangNhapHoc='$tnhaphoc', NamNhapHoc='$nnhaphoc', tinhtrang='$ttrang', WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);


    if ($query_run) {
    
      $_SESSION['success']= "Sửa Thành Công";
      header('Location: hoc_sinhkt.php');
    } else {
  
      $_SESSION['status']= "Sửa Thất Bại";
      header('Location: hoc_sinhkt.php');
    }
    
 }
  
  
 
$output ='';

if(isset($_POST['query'])){
  $search=$_POST['query'];
  $stmt=$connection->prepare("SELECT * FROM hoc_sinh WHERE 
MaHocSinh LIKE CONCAT('%',?,'%') OR TenHocSinh LIKE CONCAT('%',?,'%')") ;
  $stmt->bind_param("ss",$search,$search);


}
else{
  $stmt=$connection->prepare("SELECT * FROM hoc_sinh ");

}
$stmt->execute();
$result=$stmt->get_result();

if ($result->num_rows>0) {


  $output .='
  <div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead align="center">
              <tr>
              <th>STT </th>
               <th>Mã Học Sinh </th>
               <th>Tên Học Sinh </th>
               <th>Ngày Sinh </th>
               <th>Lớp </th>
               <th>Phụ Huynh </th>   
               <th>SDT </th>
               <th>Địa Chỉ </th>
               <th>Ghi Chú </th>              
           <th>Tình Trạng </th>
               <th>EDIT </th>
               <th>DELETE </th>
             </tr>
             </thead>
             <tbody>';
             while ($row=$result->fetch_assoc()) {
              $thoigian = $row['NgaySinh'];
              $date = date("d-m-Y", strtotime($thoigian));
               $output.='
          <tr>
                  <td>'.$row['id'].'</td>
                  <td>'.$row['MaHocSinh'].'</td>               
                  <td>'.$row['TenHocSinh'].'</td>
                  <td>'.$date.'</td>
                  <td>'.$row['Lop'].'</td>
                  <td>'.$row['MaPH'].'</td>
                  <td>'.$row['SDT'].'</td>
                  <td>'.$row['DiaChi'].'</td>
                  <td>'.$row['GhiChu'].'</td>                
                  <td>'.$row['tinhtrang'].'</td>
                  <td>
                      <form action="hoc_sinh_editkt.php" method="POST">
                          <input type="hidden" name="edit_id" value="'.$row['id'].'" >
                          <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>                        
                      </form>
                  </td>                 
              </tr>';              
             }
             $output.="</tbody>";
             echo $output;  
} else {
  echo "<h3> No Records Found!</h3>";
}
  

 


  ?>



   