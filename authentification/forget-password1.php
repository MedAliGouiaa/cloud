<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <?php include "../includes/head.php"; ?>
    <!-- connection database -->
    <?php include "../includes/conn.php"; ?>
</head>


<body>
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

        <!-- main content -->
        <div class="auth-card">
            <div class="container">
                <div class="row auth-sections">
                    <div class="gx-side-overlay"></div>
                    <div class="col-xl-12">
                        <div class="gx-card p-24">
                            <div class="gx-banner" style="margin-bottom: 10px;">
                            <img src="../assets/img/logo/full-logo-2-bg.png" style="width: 200px; height: 90px">                            </div>
                            <form class="gx-form">
                                <div class="gx-inline-block"style="padding-bottom: 50;">
                                    <label>Email ou Nom d'utilisateur:</label>
                                    <input id="id-reset-field" type="text" placeholder="Tapez votre email ou votre nom d'utilisateur" required>
                                </div>

                                <div class="gx-signup-buttons" style="margin-bottom: 20px;">
                                    <button type="button" class="gx-btn-primary2 gx-model" style="margin-bottom: 10px;" onclick="window.location.href = 'forget-password2.html';">
                                        Recevez un code de vérification par email                                 </button>
                                        <a href="../help.html" class="back-to" style="float: left;">Aidez moi</a>
                                        <a href="../login.html" class="back-to" style="float: right;">se connecter</a>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Vendor Custom -->
    <script src="../../assets/js/vendor/jquery-3.6.4.min.js"></script>
    <script src="../../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/vendor/prism.js"></script>
    <!-- Main Custom -->
    <script src="../../assets/js/main.js"></script>
</body>

</html>