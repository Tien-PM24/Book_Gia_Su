<head>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<link rel="stylesheet" href="./styles/inc_styles/style_slide.css">
  <script>
    $(document).ready(function(){
      $('.slider').flexslider({
        animation: 'slide',
        slideshowSpeed: 3000,
        pauseOnHover: true,
        controlsContainer: '.flex-container'
      });
    });  
  </script>
</head>

<body>
<div class="container">
  <div class="header-left">
    <div class="item">
      <div class="item-left"><img src="./images/math.jpg" alt="" width="150"></div>
      <div class="item-right">
        <h3>Toán Học</h3>
        <p>Các khóa học về <span>Toán</span></p>
        <button type="submit">Tham gia</button type="submit">
      </div>
    </div>

    <div class="item">
      <div class="item-left"><img src="./images/chemistry1.jpg" alt="" width="150"></div>
      <div class="item-right">
        <h3>Hóa Học</h3>
        <p>Các khóa học về <span>Hóa</span></p>
        <button type="submit">Tham gia</button type="submit">
      </div>
    </div>

    <div class="item">
      <div class="item-left"><img src="./images/physics2.jpg" alt="" width="150"></div>
      <div class="item-right">
        <h3>Vật Lý</h3>
        <p>Các khóa học về <span>Lý</span></p>
        <button type="submit" >Tham gia</button type="submit">
      </div>
    </div>

    <div class="item">
      <div class="item-left"><img src="./images/english1.jpg" alt="" width="150"></div>
      <div class="item-right">
        <h3>Tiếng Anh</h3>
        <p>Các khóa học về <span>English</span></p>
        <button type="submit">Tham gia</button type="submit">
      </div>
    </div>
	</div>
  <div class="header-right">              
    <section class="slider">
            <div class="flexslider">
            <ul class="slides">
                <li><img src="./images/background-slide5.jpg" alt="" width="860" height="520"/></li>
                <li><img src="./images/background-slide3.jpg" alt="" width="860" height="520"/></li>
                <li><img src="./images/background-slide.jpg" alt="" width="860" height="520"/></li>
                <li><img src="./images/background-slide4.jpg" alt="" width="860" height="520"/></li>
            </ul>
            </div>
    </section>
	</div>
</div>
</body>
