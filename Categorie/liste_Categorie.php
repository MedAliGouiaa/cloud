<?php session_start();?>
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

    <!-- header -->
    <?php include "../includes/navbar.php"; ?>

    <div class="gx-main-content" style="position:sticky; left: 0;">
        <div style="position:sticky; left: 0;">
            <div class="row sections blog-list" style="position:sticky; left: 0;">
                <?php include "../includes/categories.php"; ?>
                <div class="col-xl-6 col-lg-8 col-md-12 order-lg-1 order-2" style="width: 80%;margin-top: 22px;">
                    <div class="gx-help-blog">
                        <div class="row">
                            <?php
                            include_once "../includes/conn.php"; // Include MySQL connection

                            $sql = "SELECT `Id`, `Description`, `ExempleCat`, `CatName` FROM `Categorie`";
                            $result = mysqli_query($conn, $sql);

                            if ($result !== false) {
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
                                    if($row["CatName"] != "Autre"){
                                        echo '<div class="col-md-6">
                                            <div class="gx-card gx-help-blog-inner">
                                                <div class="gx-help-blog-image" style="text-align: center;">
                                                    <img src="../assets/img/blog/'. $row["CatName"] . '.png" alt="blog-4" style="width:90%;height: 300px;">
                                                    <span>' . $row["CatName"] . '</span>
                                                </div>
                                                <div class="gx-help-blog-contain">
                                                    <h4>Les disscussions ' . $row["CatName"] . ' :</h4>
                                                    <p>' . $row["Description"] . '</p>
                                                    <div class="gx-help-blog-button">
                                                        <a href="desc_liste_Categorie.php?id=' . $row["Id"] . '" class="gx-btn-blog">Lire la suite</a></div></div></div></div>';
                                    }else{
                                        echo '<div class="col-md-6" style="width: 100%;">
                                            <div class="gx-help-blog-image" style="text-align: center;">
                                                <span>' . $row["CatName"] . '</span>
                                            </div>
                                            <div class="gx-card gx-help-blog-inner" style="width: 100%;">
                                                <h5>' . $row["CatName"] . ' :</h5>
                                                <div class="gx-help-blog-contain">
                                                    <p style="max-width: 96%;">' . $row["Description"] . '</p>
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                }
                                mysqli_free_result($result);
                            } else {
                                echo "Query failed.";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "../includes/footer.php"; ?>
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
