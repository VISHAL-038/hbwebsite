<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel - About</title>
    <?php require('inc/links.php'); ?>
    <style>
      .box:hover {
        border-top-color: var(--teal) !important;
      }
    </style>
  </head>
  <body class="bg-light">
    <!-- header file is require -->
    <?php require('inc/header.php'); ?>
    <!-- header file require end-->

    <div class="my-5 px-4">
      <h2 class="fw-bold text-center">About Us</h2>
      <div class="h-line bg-dark"></div>
      <p class="text-center mt-3 ">
        OUR GOAL : "Success is not the key to happiness. Happiness is the key to
        success. If you love what you are doing, you will be successful."
      </p>
    </div>

    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-log-6 col-md-5 mb-4 order-lg-1 order-2">
          <h3 class="mb-3">Advaith</h3>
          <p>   
            Welcome to our hotel! As the owner, it is my pleasure to extend a warm
            welcome to you. Our goal is to provide you with a memorable and
            comfortable stay, whether you're here for business or leisure. At our
            hotel, we strive to exceed your expectations by offering exceptional
            service, luxurious amenities, and a welcoming atmosphere. Our team is
            dedicated to ensuring that your stay is relaxing, enjoyable, and
            unforgettable. We take pride in our commitment to excellence and are
            constantly looking for ways to enhance your experience. If there is
            anything we can do to make your stay more enjoyable, please do not
            hesitate to let us know. Thank you for choosing to stay with us. We look
            forward to welcoming you and making your stay with us a truly memorable
            one.
          </p>
        </div>
        <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-1">
          <img src="./images/about/about.jpg" class="w-100" />
        </div>
      </div>
    </div>

    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div
            class="bg-white rounded shadow p-4 border-top border-4 text-center box"
          >
            <img src="./images/about/hotel.svg" alt="" width="70px" />
            <h4 class="mt-3">100+ Rooms</h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div
            class="bg-white rounded shadow p-4 border-top border-4 text-center box"
          >
            <img src="./images/about/customers.svg" alt="" width="70px" />
            <h4 class="mt-3">200+ Customers</h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div
            class="bg-white rounded shadow p-4 border-top border-4 text-center box"
          >
            <img src="./images/about/rating.svg" alt="" width="70px" />
            <h4 class="mt-3">100+ Reviews</h4>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 px-4">
          <div
            class="bg-white rounded shadow p-4 border-top border-4 text-center box"
          >
            <img src="./images/about/staff.svg" alt="" width="70px" />
            <h4 class="mt-3">200+ Staffs</h4>
          </div>
        </div>
      </div>
    </div>

    <h3 class="my-5 f2-bold text-center">Management Team</h3>
    <div class="container px-4">
      <div class="swiper mySwiper">
        <div class="swiper-wrapper mb-5">
          <div
            class="swiper-slide bg-white text-center overflow-hidden rounded"
          >
            <img src="./images/about/team.jpg" class="w-100 h-100" />
            <h5 class="mt-2">John Doe</h5>
          </div>

          <div
            class="swiper-slide bg-white text-center overflow-hidden rounded"
          >
            <img
              src="./images/about/photo-smiling-brown-haired-charming-woman-sitting-arm-chair-opened-newspaper-hotel-room-business-people-mass-194166796.webp"
              class="w-100 h-100"
            />
            <h5 class="mt-2">Amelia</h5>
          </div>

          <div
            class="swiper-slide bg-white text-center overflow-hidden rounded"
          >
            <img src="./images/about/images (1).jpeg" class="w-100" />
            <h5 class="mt-2">Maryam</h5>
          </div>

          <div
            class="swiper-slide bg-white text-center overflow-hidden rounded"
          >
            <img src="./images/about/images.jpeg" class="w-100" />
            <h5 class="mt-2">Samira</h5>
          </div>

          <div
            class="swiper-slide bg-white text-center overflow-hidden rounded"
          >
            <img
              src="./images/about/have-seat-please-11210976.webp"
              class="w-100"
            />
            <h5 class="mt-2">Fatima</h5>
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
        spaceBetween: 40,
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
          },
          640: {
            slidesPerView: 1,
          },
          768: {
            slidesPerView: 3,
          },
          1024: {
            slidesPerView: 4,
          },
        },
      });
    </script>
  </body>
</html>
