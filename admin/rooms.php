<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Rooms</title>
    <?php require('inc/links.php'); ?>
</head>
<body class="bg-light">

    <?php require('inc/header.php'); ?>

    <div class="container-fluid">
        <div class="rows">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class='mb-4'>Rooms</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#add-room">
                                Add
                            </button>
                        </div>

                        <div class="table-responsive-lg" style="height: 450px; overflow-y: scroll;">
                            <table class="table table-hover border text-center">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Area</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="room-data"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add room modal -->
    <div class="modal fade" id="add-room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="add_room_form" autocomplete="off">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Room</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Name</label>
                                <input type="text" name="name" class="form-control shadow-none" required>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Area</label>
                                <input type="text" min="1" name="area" class="form-control shadow-none" required>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price</label>
                                <input type="number" min="1" name="price" class="form-control shadow-none" required>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Quantity</label>
                                <input type="number" min="1" name="quantity" class="form-control shadow-none" required>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Adult (Max.)</label>
                                <input type="number" min="1" name="adult" class="form-control shadow-none" required>
                            </div>  
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Children (Max.)</label>
                                <input type="number" min="1" name="children" class="form-control shadow-none" required>
                            </div> 
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Features</label>
                                <div class="row">
                                    <div class="col-md-4 mb-1">
                                        <label>
                                            <input type="checkbox"name="bedroom" value="bedroom" class="form-check-input shadow"/>bedroom
                                        </label>
                                        <label>
                                            <input type="checkbox"name="balcony" value="balcony"class="form-check-input shadow"/>balcony
                                        </label>
                                        <label>
                                            <input type="checkbox"name="kitchen" value="kitchen"class="form-check-input shadow"/>kitchen
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-bold">Facilities</label>
                                <div class="row">
                                    <div class="col-md-6 mb-1">
                                        <label>
                                            <input type="checkbox" name="wifi" value="wifi" class="form-check-input shadow"/>wifi
                                        </label>
                                        <label>
                                            <input type="checkbox" name="AC" value="AC" class="form-check-input shadow"/>AC
                                        </label>
                                        <label>
                                            <input type="checkbox" name="TV" value="TV" class="form-check-input shadow"/>TV
                                        </label>
                                        <!-- Add more facilities checkboxes as needed -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="form-label fw-bold">Description</label>
                                <textarea name="description"   rows="4" class="form-control" required></textarea>
                            </div>
                        </div>          
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn text-secondary shadow" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn custom-bg text-white shadow">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Manage room images modal  -->

    <!-- Modal -->
    <div class="modal fade" id="room-images" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Room Name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="border-bottom border-3 pb-3 mb-3">
                <form id="add_image_form">
                    <label class="form-label fw-bold">
                        Add image
                    </label>
                    <input type="file" name="image" accepts=".jpg, .png, .webp, .jpeg" class="form-control shadow mb-3" required>
                    <button type="submit" class="btn custom-bg text-white shadow-none">ADD</button>
                    <input type="hidden" name="room_id">
                </form>
            </div>
            <div class="table-responsive-lg" style="height: 350px; overflow-y: scroll;">
                <table class="table table-hover border text-center">
                    <thead>
                        <tr class="bg-dark text-light sticky-top">
                            <th scope="col" width="60%">IMAGE</th>
                                <th scope="col">THUMB</th>
                                <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody id="room-image-data"></tbody>
                </table>
            </div>
        </div>
        </div>
    </div>
    </div>


    <?php require('inc/scripts.php');?>

    <script src="scripts/rooms.js"></script>
</body>
</html>
