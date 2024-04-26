<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Facilities</title>
    <?php require('inc/links.php'); ?>
    <style>
        .pop:hover{
            border-top-color: var(--teal) !important;
            transform: scale(1.03);
            transition: all 0.3s;
        }
    </style>
</head>
<body class="bg-light">
    <!-- header file is require -->
    <?php require('inc/header.php'); ?>
    <!-- header file require end-->

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center" >OUR FACILITIES</h2>
        <div class="h-line bg-dark"></div>
        <p class="text-center mt-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi, ea? Laboriosam, ratione explicabo vitae dignissimos veritatis, sapiente tempora <br> quam animi corrupti cum quisquam voluptas veniam unde error totam cupiditate laborum!</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="./images/facilities/Wifi.svg" width="40px" alt="">
                        <h5 class="m-0 ms-3">Free WIFI</h5>
                    </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, incidunt. Nam molestiae voluptatibus deserunt impedit eius </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="./images/facilities/TV.svg" width="40px" alt="">
                        <h5 class="m-0 ms-3">TV</h5>
                    </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, incidunt. Nam molestiae voluptatibus deserunt impedit eius </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="./images/facilities/AC.svg" width="40px" alt="">
                        <h5 class="m-0 ms-3">AC</h5>
                    </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, incidunt. Nam molestiae voluptatibus deserunt impedit eius </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="./images/facilities/massage.svg" width="40px" alt="">
                        <h5 class="m-0 ms-3">Massage</h5>
                    </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, incidunt. Nam molestiae voluptatibus deserunt impedit eius </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="./images/facilities/Fire.svg" width="40px" alt="">
                        <h5 class="m-0 ms-3">Fire Alarm</h5>
                    </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, incidunt. Nam molestiae voluptatibus deserunt impedit eius </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4 border-top border-4 pop">
                    <div class="d-flex align-items-center mb-2">
                        <img src="./images/facilities/food.png" width="40px" alt="">
                        <h5 class="m-0 ms-3">3 Time Meal</h5>
                    </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, incidunt. Nam molestiae voluptatibus deserunt impedit eius </p>
                </div>
            </div>
        </div>
    </div>

    <!--Footer-->
    <?php require('inc/footer.php'); ?>
    <!--Footer end-->
</body>
</html>