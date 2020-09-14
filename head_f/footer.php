<?php 
include 'admin/database/dbconfig.php'; 
 $query = "SELECT * FROM thongtin_web";
          $query_run= mysqli_query($connection,$query);
?>
<div id="footer">
          <div class="container">
            <div class="row">
               <?php while ($row=mysqli_fetch_assoc($query_run)) 
          {            
            
            ?>      
              <div class="col-md-4 col-footer">
                  <div id="location-us">
                    <p class="location-us-title">Liên hệ</p>                  
                    <?php echo $row['Lienhe']; ?>
                    <p>
                      <i class="fas fa-phone"></i>
                      <strong>Hotline:</strong> <?php echo $row['Hotline']; ?></br>
                    
                      </p>                    
                    </p>
                  </div>
              </div>
              <div class="col-md-3 col-footer">
                <div id="social-network">
                  <p class="social-network-title">Facebook liên hệ</p>
                  <ul>
                    <li><a href="<?= $row['Facebook']; ?>"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="<?= $row['Youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    
                  </ul>
                  
                </div>

              </div>
                 <?php } ?>
              <div class="col-md-3 col-footer">
                <div id="guide">
                  <p class="guide-title">Hướng dẫn & quy định</p>
                  <ul>
                    <li><a href="#">Chính sách bảo mật thông tin</a></li>
                    <li><a href="#">Quy chế hoạt động</a></li>
                    <li><a href="#">Chính sách hoàng tiền</a></li>
                    <li><a href="#">Hướng dẫn đăng kí học</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-2 col-footer">
                <div id="footer-course">
                  <p class="footer-course-title">Khóa học</p>
                  <ul>
                    
                      <li><a href="#">Khóa học tiếng anh</a></li>  
                      <li><a href="#">Khóa học tiếng trung</a></li>  
                      <li><a href="#">Khóa học tiếng hàn</a></li>  
                      <li><a href="#">Khóa học tiếng nhật</a></li>  
                    
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>

      <div id="copyright">
        <div class="container">
          <p class="text-center">
            © 2019 CÔNG TY CỔ PHẦN TƯ VẤN VÀ ĐÀO TẠO TOMATO. Thiết kế web: HIG Media
        </p>
        </div>
      </div>
        
  </div>
  <!-- End Copyright Section -->
    <!-- Script -->
    <script src="js/scrip.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    