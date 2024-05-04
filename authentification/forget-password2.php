<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="guide, doc, documentation, api doc, catalog, code documentation, doc, docs, documentation, documentation template, documentation tool, getting started, guide, help, manual, online documentation, reference, specification">
    <meta name="description" content="Guidex - Online Multipurpose Documentation HTML Template.">
    <meta name="author" content="ashishmaraviya">

    <title>Réinitialiser</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="../../assets/img/logo/full-logo.png">

    <!-- Icon CSS -->
    <link href="../../assets/css/vendor/materialdesignicons.min.css" rel="stylesheet">
    <link href="../../assets/css/vendor/remixicon.css" rel="stylesheet">

    <!-- Vendor -->
    <link href="../../assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/vendor/prism.css" rel="stylesheet">

    <!-- Main CSS -->
    <link id="mainCss" href="../../assets/css/style.css" rel="stylesheet">
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
                                <img src="../../assets/img/logo/logo-title.png" style="width: auto; height: 3em;">
                            </div>
                            <form class="gx-form">
                                <div class="gx-inline-block"style="padding-bottom: 50;">
                                    <label>Code de verification</label>
                                    <input id="code-field" type="text" placeholder="Saisissez le code de vérification reçu par email" required  maxlength="4">
                                </div>

                                <div class="gx-signup-buttons" style="margin-bottom: 10px;">
                                    <button type="button" class="gx-btn-primary2 gx-model" style="margin-bottom: 0px;">
                                        Valider le code et réinitialiser le mot de passe                                 </button>
                                    <a href="../login.html" class="back-to" style="float: right;">se connecter</a>
                                    <a href="../forget-password1.html" class="back-to" style="float: left;">  <i class="ri-arrow-left-s-line"></i>précédent</a>
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