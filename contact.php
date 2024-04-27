<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Contact</title>
    <?php require('inc/links.php'); ?>
    <style>
        
    </style>
</head>
<body class="bg-light">
    <!-- header file is require -->
    <?php require('inc/header.php'); ?>
    <!-- header file require end-->

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center" >Contact US</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">
            "Have a question or need assistance? Our dedicated team is here to help. Reach out to us for inquiries, reservations, or any special requests. Your comfort and satisfaction are our top priorities."</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109744.22709325235!2d76.6883122770574!3d30.732254422147673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1711888166252!5m2!1sen!2sin"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Adress</h5>
                    <a href="https://maps.app.goo.gl/doeAt2xUZ7bqT8tV9" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                    <i class="bi bi-geo-alt-fill"></i>
                        XYZ Chandigarh  Hotel 
                    </a>
                    <h5 class="mt-4">Call US</h5>
                    <a href="tel:+914314315353" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+914314315353
                    </a>
                    <br>
                    <a href="tel:+914314315353" class="d-inline-block  text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+914314315353
                    </a>
                    <h5 class="mt-4">Email<h5>
                    <a href="mailto:ask.hotel@gmail.com" class="d-inline-block  text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill">
                            ask.hotel@gmail.com
                        </i>
                    </a>
 
                    <h5 class="mt-4">Follow US</h5>
                    <a href="#" class="d-inline-block  text-dark fs-5 me-2">
                    <i class="bi bi-twitter-x me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block  text-dark fs-5 me-2">
                        <i class="bi bi-instagram" ></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5 ">
                     
                            <i class="bi bi-facebook me-1"></i>
                    </a>
                    
                </div>
            </div>


            <div class="col-lg-6 col-md-6  px-4">
                <div class="bg-white rounded shadow p-4">
                    <form method="POST">
                        <h5>Send a Message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Subject</label>
                            <input type="text" class="form-control" name="subject" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight:500;">Message</label>
                            <textarea class="form-control" rows="5" placeholder="Enter your address..." name="message"  required style="resize: none"></textarea>
                        </div>
                        <button type="submit" class="btn text-white custom-bg mt-3 shadow" name="send">Send</button>

                    </form>
                </div>
            </div>
            
        </div>
    </div>

    
    <!--Footer-->
    <?php require('inc/footer.php'); ?>
    <!--Footer end-->

    <?php 
        if(isset($_POST['send'])){
            $frm_data = filteration($_POST);
            $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];
            $res = insert($q, $values, 'ssss');
            if($res==1){
                alert('success','mail sent!');
            }
            else{
                alert('error','servor down try again latter');
            }
        }
    ?>
</body>
</html>