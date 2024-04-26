<?php
require('inc/essentials.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel : Settings</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-con">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Settings</h3>

                <!-- General Settings Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title">General Settings</h5>
                            <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#general-s">
                                Edit
                            </button>
                        </div>
                        <h6 class="card-subtitle mb-1 gw-bold">Site Title</h6>
                        <p class="card-text" id="site_title"></p>
                        <h6 class="card-subtitle mb-1 gw-bold">About Us</h6>
                        <p class="card-text" id="site_about"></p>
                    </div>
                </div>


                <!--General Setting  Modal -->
                <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form>
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit General Settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Your modal content goes here -->
                                    <div class="mb-3">
                                        <label class="form-label">Site Title</label>
                                        <input type="text" class="form-control" id="site_title_inp" name="site_title"  required>
                                    </div>  
                                    <div class="mb-3">
                                        <label class="form-label">About Us</label>
                                        <textarea class="form-control" rows="6" id="site_about_inp" name="site_about"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn custom-bg text-white shadow"  onclick="upd_general(site_title_inp.value, site_about_inp.value)">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ShutDown Section -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title">ShutDwon Setting</h5>
                            <div class="form-check form-switch">
                                <form>
                                    <input class="form-check-input" type="checkbox" id="shutdown-toggle" onchange="upd_shutdown(this.value)" >
                                </form>
                            </div>
                            
                        </div>
                        <p class="card-text" >
                            No Customer will be allowed to hotle room when shutdown is turned on.
                        </p>
                    </div>
                </div>

                 <!-- Managemnt Section -->
                 <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="card-title">Management Tema</h5>
                            <button type="button" class="btn btn-dark shadow btn-sm" data-bs-toggle="modal" data-bs-target="#team-s">
                                Add
                            </button>
                        </div>

                        <!-- fetced data is showed here -->
                        <div class="row" id="team-data">

                        </div>
                        
                    </div>
                </div>

                <!-- Maagement Team model -->
                <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="team_s_form">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Add Team Member</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Your modal content goes here -->
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" id="member_name" name="member_name_inp"  required>
                                    </div>  
                                    <div class="mb-3">
                                        <label class="form-label">Picture</label>
                                        <input type="file" class="form-control" id="member_picture" name="member_picture_inp"required accept=".jpg, .png, .webp, .jpeg">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn text-secondary shadow" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn custom-bg text-white shadow" onclick="" >Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php echo $_SERVER['DOCUMENT_ROOT'] ?>
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php');?>
    <script>
        let site_title = document.getElementById('site_title');
        let site_about = document.getElementById('site_about');
        let site_title_inp = document.getElementById('site_title_inp');
        let site_about_inp = document.getElementById('site_about_inp');

        let shutdown_toggle = document.getElementById('shutdown-toggle');

        let team_s_form = document.getElementById('team_s_form');
        let member_name_inp = document.getElementById('member_name');
        let member_picture_inp = document.getElementById('member_picture');

        let general_data;

        function get_general() {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                    general_data = JSON.parse(this.responseText);
                        site_title.innerText = general_data.site_title;
                        site_about.innerText = general_data.site_about;

                        site_title_inp.value = general_data.site_title;
                        site_about_inp.value = general_data.site_about;

                        if(general_data.shutdown == 0){
                            shutdown_toggle.checked = false;
                            shutdown_toggle.value = 0;
                        }
                        else{
                            shutdown_toggle.checked = true;
                            shutdown_toggle.value = 1;
                        }
            };
            xhr.send('get_general');
        }

        function upd_general(site_title_val,site_about_val){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                var myModal = document.getElementById('general-s')
                var modal = bootstrap.Modal.getInstance(myModal);
                modal.hide(); 

                console.log(this.responseText);
                if(this.responseText == 1){
                    // alert();
                    // console.log('data updated');
                    alert('success','Changes Saved')
                    get_general();
                }
                else{
                    // console.log('no chnages made');
                    alert('error','no changes made')
                }
            };
            xhr.send('site_title='+site_title_val+'&site_about='+site_about_val+"&upd_general");
        }

        function upd_shutdown(val){
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {

                if(this.responseText == 1  && general_data.shutdown==0){
                    alert('success','Sight has been shutdown')
                }
                else{
                    alert('success','shutdown mode off')
                }
                get_general();
            };
            xhr.send('upd_shutdown='+val);
        }

        team_s_form.addEventListener('submit',function(e){
            e.preventDefault();
            add_member();
        });
        
        function add_member(){
            let data = new FormData();
            data.append('name',member_name_inp.value);
            data.append('picture',member_picture_inp.files[0]);
            data.append('add_member','');

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "ajax/settings_crud.php", true);
            
            xhr.onload = function() {
                console.log(this.responeText);
                // var myModal = document.getElementById('general-s')
                // var modal = bootstrap.Modal.getInstance(myModal);
                // modal.hide(); 

                // if(this.responseText == 1){

                //     alert('success','Changes Saved')
                //     get_general();
                // }
                // else{

                //     alert('error','no changes made')
                // }
            };
            xhr.send(data);

        }

        window.onload = function() {
            get_general();
        };

    </script>
</body>
</html>
