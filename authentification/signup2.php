<?php
session_start();

// Include the MySQL connection file
include "../includes/mysql_conn.php";

// Check if the session data is set
if (!isset($_SESSION['form_data1'])) {
    // Redirect to the login page if session data is not set
    header("Location: /ForumFusion-partieUser/authentification/login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <!-- links -->
    <link id="mainCss" href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
        integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <main class="wrapper sb-default">
        <!-- Loader -->
        <div id="gx-overlay">
            <div class="gx-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <!-- header -->

        <?php include "../includes/navbar.php"; ?>

        <div class="auth-card">
            <div class="container">
                <div class="row auth-sections">
                    <div class="gx-side-overlay"></div>
                    <div class="col-xl-12">
                        <div class="gx-card p-24" style="width: auto; height: 102%;">

                            <form class="gx-form" method="post">
                                <center>
                                    <div class="gx-inline-block">
                                        <?php include "../includes/gallery.php"; ?>
                                    </div>
                                </center>
                                <div class="gx-inline-block">
                                    <!-- Your form fields -->
                                </div>

                                <!-- Include signup2Action.php to handle form submission -->
                                <?php include "../actions/signup2Action.php"; ?>

                                <?php if (!empty($errorMsg)): ?>
                                    <div id="errorMsg" style="color: red; margin-bottom: 10px;">
                                        <?php echo "<center>" . $errorMsg . "</center>"; ?>
                                    </div>
                                <?php endif; ?>

                                <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                                    <button type="submit" class="gx-btn-primary gx-model" name="signup2"
                                        style="width: 120px;">
                                        S'inscrire
                                    </button>
                                </div>
                                <a href="login.php" class="back-to" style="float: left;">&#11207; Retour </a>
                                <a href="help.php" class="back-to" style="float: right;">Aidez moi</a>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </main>

    <!-- Vendor Custom -->
    <script src="../assets/js/vendor/jquery-3.6.4.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/prism.js"></script>
    <!-- Main Custom -->
    <script src="../assets/js/main.js"></script>
</body>

</html>
