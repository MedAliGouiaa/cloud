<?php
session_start();

// Replace the SQL Server connection with a MySQL connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Destroy session and unset session variables
session_destroy();
session_start();
unset($_SESSION['form_data1']);

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

        <!-- Header -->
        <?php include "../includes/navbar.php"; ?>
        <div class="auth-card">
            <div class="container">
                <div class="row auth-sections">
                    <div class="gx-side-overlay"></div>
                    <div class="col-xl-12">
                        <div class="gx-card p-24" style="width: auto; height: 102%;">
                            <div class="gx-banner" style="margin-bottom: 5px;">
                                <img src="../assets/img/logo/full-logo-2-bg.png" style="width: 200px; height: 90px">
                            </div>
                            <form class="gx-form" method="post">
                                <!-- Form fields and other HTML content -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <ul>
                <ul style="position: fixed; bottom: 0; right: 0;">
                    <li style="margin-bottom: 5px; margin-right: 10px;font-size: 12px;">FurumFusion &#9658; Register</li>
                </ul>
        </div>

    </main>

    <!-- Vendor Custom -->
    <script src="../assets/js/vendor/jquery-3.6.4.min.js"></script>
    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/prism.js"></script>
    <script src="../includes/javascripts.js"></script>
    <!-- Main Custom -->
    <script src="../assets/js/main.js"></script>
</body>
<style>
    /* Your CSS styles */
</style>

</html>

<?php
// Close the MySQL connection
mysqli_close($conn);
?>
