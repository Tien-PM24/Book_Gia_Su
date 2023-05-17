<?php include "./header.php"; ?>
<head>
    <link rel="stylesheet" href="../../Public/Styles/Home/contact.css">
</head>
<section class="section-header bg-tertiary pb-5 pb-lg-7">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-6">
                <h1 class="display-1 font-weight-extreme" style="color: #62bfd1; font-family: 'Baloo Thambi', cursive; font-size:4rem">
                    <div>Liên hệ với tụi mình</div>
                </h1>
                <p class="lead mb-4"><i class="fas fa-phone mr-2"></i> 0365 951 542</p>
                <p class="lead">Gọi cho tụi mình hoặc ghé qua bất cứ lúc nào, tụi mình nỗ lực để trả lời tất cả các yêu cầu trong vòng 24 giờ vào ngày làm việc.</p>
            </div>
            <div class="col-12 col-md-5 d-none d-lg-block text-center">
            <img src="../../Public/Images/Course/contact.jpg" class="w-120" alt=""></div>
        </div>
    </div>
    <figure class="position-absolute bottom-0 left-0 w-100 d-none d-md-block mb-n2">
        <svg class="fill-soft" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 43.4" style="enable-background:new 0 0 1920 43.4;" xml:space="preserve">
            <path d="M0,23.3c0,0,405.1-43.5,697.6,0c316.5,1.5,108.9-2.6,480.4-14.1c0,0,139-12.2,458.7,14.3 c0,0,67.8,19.2,283.3-22.7v35.1H0V23.3z"></path>
        </svg>
    </figure>
</section>
<div class="section section-md bg-light text-dark">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10">
                <div class="text-center px-0 px-lg-5">
                    <h3 class="mb-4">Giúp tụi mình tốt hơn bằng cách đóng góp ý kiến nhé!</h3>
                    <!-- {# <p class="lead text-muted mb-5 mb-lg-6">We can help! Please fill out the form below with as much detail as possible, you can also send us an email at any time if you'd like to talk more at support@themesberg.com</p> #} -->
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label text-muted" for="firstName">First Name <span class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-alt"></i></span></div>
                                    <input class="form-control" id="firstName" placeholder="First Name" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label text-muted" for="lastName">Last Name <span class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user-alt"></i></span></div>
                                    <input class="form-control" id="lastName" placeholder="Last Name" type="text" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label text-muted" for="email">Email <span class="text-danger">*</span></label>
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-envelope"></i></span></div>
                                    <input class="form-control" id="email" placeholder="Can we get your email?" type="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label class="form-label text-muted" for="phone">Phone Number<span class="text-danger">*</span></label>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-phone-square-alt"></i></span></div>
                                    <input class="form-control" id="phone" placeholder="Phone number" type="number" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-12 mt-lg-4">
                            <div class="form-group">
                                <label class="form-label text-muted" for="message">Ý kiến bạn muốn đóng góp?<span class="text-danger">*</span></label>
                                <textarea id="message" class="form-control" placeholder="Mình muốn đóng góp ..." rows="8" required></textarea>
                            </div>
                            <div class="text-lg-center mb-2">
                                <button type="submit" class="btn btn-primary animate-up-2 mt-4"><span class="mr-2"><i class="fas fa-paper-plane"></i></span>Gửi thư</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include "./footer.php"; ?>