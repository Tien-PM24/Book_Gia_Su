<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Styles/Student/Show.css">
  <link rel="stylesheet" href="../../Styles/inc_styles/style_footer.css">
  <title>trang cá nhân của học sinh</title>
  
</head>
<body>

<br>
<br>
  <body>
    <div class="container-fluid" style="padding-top: 30px;">
      <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5 ">
          <h4 id="sb" class="sb" style="font: size 45px;" >Thông tin cá nhân của bạn</h4>
          <div class="info d-flex">
          <div>
            <i class="bi bi-person">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person"
                viewBox="0 0 16 16" name="fullname">
                <path
                  d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
              </svg>
            </i> 
          </div>
          <div>
            <p><?php echo $row['Full_name'] ?></p>
          </div>
          </div>
          <br>
          <br>
          <div class="info d-flex">
          <div>
            <i class="bi bi-envelope-at">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                class="bi bi-envelope-at" viewBox="0 0 16 16" name="email">
                <path
                  d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z" />
                <path
                  d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
              </svg>
            </i>
          </div>
          <div><p><?php echo $row['Email'] ?></p></div>
          </div>
        </div>
      
        <div  class="col-sm-5" >
          <h4 name="avt" class="avt">Avatar</h4>
          
          <img style="width:250px; height: 250px;;"
          src="https://i1.wp.com/hocphp.net/wp-content/uploads/2021/01/oop-php.png?fit=1000%2C500&ssl=1" alt="" id="img-student" name="img_student">
          </div>

        </div>
    </div>

      </div>
      <br>
      <br>
      <br>
      <div class="container-fluid">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <div class="row">
        <div class="col-sm-3">
          <img style="width: 250px; height: 250px;" src="https://i1.wp.com/hocphp.net/wp-content/uploads/2021/01/oop-php.png?fit=1000%2C500&ssl=1" alt="">
          <div>
            <p>Đây là môn học tuyệt vời</p>
          </div>
        </div>
        <div class="col-sm-3">
          <img style="width: 250px; height: 250px; margin-left: 20px;" src="https://i1.wp.com/hocphp.net/wp-content/uploads/2021/01/oop-php.png?fit=1000%2C500&ssl=1" alt="">
          <div>
            <p>Đây là môn học tuyệt vời</p>
          </div>
        </div>
        <div class="col-sm-3">
          <img style="width: 250px; height: 250px;" src="https://i1.wp.com/hocphp.net/wp-content/uploads/2021/01/oop-php.png?fit=1000%2C500&ssl=1" alt="">
          <div>
            <p>Đây là môn học tuyệt vời</p>
          </div>
        </div>
        <div class="col-sm-3">
          <img style="width: 250px; height: 250px;" src="https://i1.wp.com/hocphp.net/wp-content/uploads/2021/01/oop-php.png?fit=1000%2C500&ssl=1" alt="">
          <div>
            <p>Đây là môn học tuyệt vời</p>
          </div>
        </div>
      </div>
   
    <div class="col-sm-1"></div>
  </div>
</div>

  </body>


  <footer>
  <div class="container-fliud" id="footer" >
    <div class="row" style="background-color:#27D3BF">	
      <div class="col-sm-1"></div>
        <div class="col-sm-4">
           
                <h3>Dịch vụ gia sư KingDom</h3>
                <p><img src="../images/location.png" alt="" width="30"> Địa chỉ: 101b Lê Hữu Trác, Phước Mỹ, Sơn Trà, Đà Nẵng</p>
                <p><img src="../images/gmail.png" alt="" width="30"> Email: TienPM24@gmail.com</p>
                <p><img src="../images/call.png" alt="" width="30"> Hỗ trợ học sinh: 0988888888 (Lực)</p>
                <p><img src="../images/call.png" alt="" width="30"> Hỗ trợ gia sư: 0988888888 (Tiến PM)</p>
                </div>
           
                <div class="col-sm-4">
                    <br>
                    <br>
                    <h3>Thời gian làm việc</h3>
                    <p>Thứ 2: 8h00-21h00</p>
                    <p>Thứ 3: 8h00-21h00</p>
                    <p>Thứ 4: 8h00-21h00</p>
                    <p>Thứ 5: 8h00-21h00</p>
                    <p>Thứ 6: 8h00-21h00</p>
                </div>
                <div class="left-item">
                    <img src="../../images/payment.png" alt="" >
                    <img src="../../images/Bank.png" alt="" >
                </div>        
            </div>
        </div>
    	
    <div class="col-sm-1"></div>
    <div class="row"style="background-color:#27D3BF">
      <div class="col-sm-1"></div>
      <div class="col-sm-9">
    <div class="contact_top" >
        <a>Flow us:</a> 
        <a href="https://www.facebook.com"><img src="../images/Facebook.png" alt="" width="30"> Facebook</a>
        <a href="https://www.tiktok.com"><img src="../images/Tiktok.png" alt="" width="30"> Tiktok</a>
        <a href="skype:yourusername?chat"><img src="../images/Skype.png" alt="" width="30"> Skype</a>
        <a href="https://www.youtube.com"><img src="../images/Youtube.png" alt="" width="30"> Youtube</a>
  </div>
  </div>	
  </div>
  </br>
    </div>
  </footer>
</body>
</html>



