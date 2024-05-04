<?php session_start(); ?>
<!DOCTYPE html>
<meta charset="UTF-8">
<!-- connection database -->
<?php include "../includes/conn.php"; ?>

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <!-- links -->
    <link id="mainCss" href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
        integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <!-- header -->
    <?php include "../includes/navbar.php"; ?>


    <div class="gx-main-content" style="position:sticky; left: 0;">
        <div style="position:sticky; left: 0;">
            <div class="row sections blog-list" style="position:sticky; left: 0;">
                <?php include "../includes/categories.php"; ?>
                <div class="col-xl-6 col-lg-8 col-md-12 order-lg-1 order-2" style="width: 80%;margin-top: 22px;">
                    <div class="gx-card p-24">
                        <div class="top-heading">
                            <div class="gx-list-inner">
                                <div class="gx-heading">
                                    <h1><?php
                                    $catname = isset($_GET['id']) ? $_GET['id'] : 'Tous';
                                    echo $catname; ?></h1>
                                </div>
                                <button type="button" class="gx-btn-primary gx-model"
                                    onclick="window.location.href = 'forum-post.php';">
                                    Nouvelle discussion
                                </button>

                            </div>
                            <div class="qx-list-ai m-t-10">
                                <?php include "../includes/posts.php"; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer><?php include "../includes/footer.php"; ?></footer>
    <!-- Vendor Custom -->
    <script src="../assets/js/vendor/jquery-3.6.4.min.js"></script>

    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/prism.js"></script>
    <!-- Main Custom -->
    <script src="../assets/js/main.js"></script>
    <script src="../includes/javascripts.js"></script>

</body>



</html>
<?php if ($conn) {
    mysqli_close($conn);
} ?>
