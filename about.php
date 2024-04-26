<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - About</title>
    <?php require('inc/links.php'); ?>
    <style>
        .box:hover{
            border-top-color:var(--teal) !important;
        }
    </style>
</head>
<body class="bg-light">
    <!-- header file is require -->
    <?php require('inc/header.php'); ?>
    <!-- header file require end-->

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center" >About Us</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, ea? Laboriosam, ratione explicabo vitae dignissimos veritatis, sapiente tempora <br> quam animi corrupti cum quisquam voluptas veniam unde error totam</p>
    </div>
    
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-log-6 col-md-5 mb-4 order-lg-1 order-2">
                <h3 class="mb-3">Loreum ispum dolar sit</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorem odit itaque molestias officia, reiciendis optio voluptate, dicta recusandae consequatur quibusdam sunt explicabo dolorum vitae! Vitae nihil reprehenderit assumenda deleniti quis!</p>
            </div>
            <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-1">
                <img src="./images/about/about.jpg" class="w-100">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4  text-center box">
                    <img src="./images/about/hotel.svg" alt="" width="70px">
                    <h4 class="mt-3">100+ Rooms</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4  text-center box">
                    <img src="./images/about/customers.svg" alt="" width="70px">
                    <h4 class="mt-3">200+ Customers</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4  text-center box">
                    <img src="./images/about/rating.svg" alt="" width="70px">
                    <h4 class="mt-3">100+ Reviews</h4>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4  text-center box">
                    <img src="./images/about/staff.svg" alt="" width="70px">
                    <h4 class="mt-3">200+ Staffs</h4>
                </div>
            </div>
        </div>
    </div>

    <h3 class="my-5 f2-bold text-center">Management Team</h3>
    <div class="container px-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper mb-5">
              <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="./images/about/team.jpg" class="w-100">
                <h5 class="mt-2">John Doe</h5>
              </div>
              
              <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="./images/about/team.jpg" class="w-100">
                <h5 class="mt-2">John Doe</h5>
              </div>
              
              <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="./images/about/team.jpg" class="w-100">
                <h5 class="mt-2">John Doe</h5>
              </div>
              
              <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="./images/about/team.jpg" class="w-100">
                <h5 class="mt-2">John Doe</h5>
              </div>
              
              <div class="swiper-slide bg-white text-center overflow-hidden rounded">
                <img src="./images/about/team.jpg" class="w-100">
                <h5 class="mt-2">John Doe</h5>
              </div>
              
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!--Footer-->
    <?php require('inc/footer.php'); ?>
    <!--Footer end-->

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
        spaceBetween:40,
          pagination: {
            el: ".swiper-pagination",
          },
          breakpoints:{
                320:{
                    slidesPerView:1,
                },
                640:{
                    slidesPerView:1,
                },
                768:{
                    slidesPerView:3,
                },
                1024:{
                    slidesPerView:4,
                },
            }
        });
      </script>
</body>
</html>