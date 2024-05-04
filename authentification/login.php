<?php 
session_destroy(); 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include "../includes/head.php"; ?>
    <!-- connection database -->
    <?php include "../includes/mysql_conn.php"; // Include the MySQL connection file ?>
</head>

<body>
    <!-- links -->
    <link id="mainCss" href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css"
        integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <!-- header -->
    <?php include "../includes/navbar.php"; ?>
            <!-- Loader -->
            <div id="gx-overlay">
            <div class="gx-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    <main class="wrapper">
        <!-- main content -->
        <div class="auth-card">
            <div class="container">
                <div class="row auth-sections">
                    <div class="gx-side-overlay"></div>
                    <div class="col-xl-12">
                        <div class="gx-card p-24" style="width: auto; height: 105%;">
                            <div class="gx-banner" style="margin-bottom: 10px;">
                                <img src="../assets/img/logo/full-logo-2-bg.png" style="width: 300px; height: 140px">
                            </div>
                            <form class="gx-form" method="post">
                                <div class="gx-inline-block">
                                    <label style="font-size: 16px;">
                                        Login *</label>
                                    <input style="font-size: 14px; type="text" name="login"
                                        placeholder="E.g. john_doe">

                                    <div class="gx-inline-block "
                                        style="padding-top: 8px; padding-bottom: 8px; padding-left: 0; padding-right: 0;margin-bottom: 10px;">
                                        <label>Mot de passe *</label>
                                        <input id="password-field" type="password" placeholder="E.g. ***"
                                            name="password">
                                        <i toggle="#password-field" class="toggle-password ri-eye-line"></i>
                                    </div>

                                    <?php include "../actions/loginAction.php"; ?>
                                    <?php if (!empty($errorMsg)): ?>
                                        <div id="errorMsg" style="color: red; margin-bottom: 10px;">
                                            <?php echo "<center>" . $errorMsg . "</center>"; ?>
                                        </div>
                                    <?php endif; ?>

                                    <div style="display: flex; justify-content: center; margin-bottom: 10px;">
                                        <button type="submit" class="gx-btn-primary gx-model" name="connecter"
                                            style="width: 120px;">
                                            Connecter
                                        </button>
                                    </div>

                                    <center>
                                        <div style="margin-bottom: 10px;">
                                            <a href="signup.php" class="back-to"
                                                style="color: #4991AB; font-style: italic; font-weight: bold; font-size : 17px">
                                                <u>Continuer en tant qu'invité</u>
                                            </a>
                                        </div>
                                    </center>


                                    <div style="margin-bottom: 10px;">
                                        <a href="signup.php" class="back-to" style="float: right;">Inscrire &#9656;</a>
                                    </div>

                                    <div style="margin-bottom: 10px;">
                                        <a href="help.php" class="back-to" style="float: left;">&#9666; Aidez moi</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <ul>
                <ul style="position: fixed; bottom: 0; right: 0;">
                <li style="margin-bottom: 10px; margin-right: 10px;font-size: 12px;">FurumFusion &#9658; Login</li>
                </ul>

        </div>
    </main>

    <!-- Vendor Custom -->
    <script src="../assets/js/vendor/jquery-3.6.4.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- Main Custom -->
    <script src="../assets/js/main.js"></script>
</body>

</html>
