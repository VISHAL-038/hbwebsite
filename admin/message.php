<?php
    require('inc/essentials.php');
    require('inc/db_config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Message</title>
    <?php require('inc/links.php'); ?>
</head>
<body>
    <?php require('inc/header.php'); ?>

    <div class="container-fluid">
        <div class="rows">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class='mb-4'>Messages</h3>
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width:1300px">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Message</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Seen</th>
                                    </tr>
                                </thead>
                                <tbody id="message"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>  

    <?php require('inc/scripts.php'); ?>
    <script src="scripts/message.js"></script>
    <script>get_message();</script>
    <script>toggleSeen();</script>
</body>
</html>
