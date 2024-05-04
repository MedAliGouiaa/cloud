<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <!-- Include CSS links -->
    <link id="mainCss" href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
        integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    
    <!-- Include navbar -->
    <?php include "../includes/navbar.php"; ?>

    <!-- Main content -->
    <div class="gx-main-content" style="position: sticky; left: 0;">
        <div style="position: sticky; left: 0;">
            <div class="row sections blog-list" style="position: sticky; left: 0;">
                <!-- Include categories -->
                <?php include "../includes/categories.php"; ?>

                <!-- Edit profile section -->
                <div class="col-xl-6 col-lg-8 col-md-12 order-lg-1 order-2" style="width: 80%; margin-top: 22px;">
                    <div class="gx-card p-24">
                        <div class="top-heading">
                            <div class="gx-list-inner">
                                <div class="gx-heading">
                                    <!-- Add any heading content here -->
                                </div>
                            </div>
                            <div class="qx-list-ai m-t-10">
                                <?php include "../includes/edit-profile.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Include any custom scripts -->
    <script type="text/javascript"></script>
    <!-- Include fontawesome library -->
    <script src="https://kit.fontawesome.com/9e5ba2e3f5.js" crossorigin="anonymous"></script>
    <!-- Include main.js -->
    <script src="../assets/js/main.js"></script>
</body>

</html>
