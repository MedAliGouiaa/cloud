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
                <?php
                include_once "../includes/conn.php"; // MySQL connection

                if (isset($_GET['id'])) {
                    $categoryId = $_GET['id'];

                    $sql = "SELECT `Id`, `Description`, `IconCat`, `ExempleCat`, `CatName` FROM `Categorie` WHERE `Id` = $categoryId";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $exampleArray = explode(',', $row["ExempleCat"]);
                        if (count($exampleArray) == 3) {
                            $example1 = trim($exampleArray[0]);
                            $example2 = trim($exampleArray[1]);
                            $example3 = trim($exampleArray[2]);
                        } else {
                            echo "Error: There should be exactly three examples separated by commas.";
                        }

                        echo '<div class="col-xl-6 col-lg-8 col-md-12 order-lg-1 order-2" style="width: 80%;margin-top: 22px;">
                                <div class="gx-help-blog">
                                    <div class="row">
                                        <div >
                                            <div class="gx-card gx-help-blog-inner">
                                                <div class="gx-help-blog-contain">
                                                    <h4>'. $row["CatName"].' <i class='.$row["IconCat"] . '></i></h4>
                                                    <p>' . $row["Description"] . '</p>
                                                    <p>' . $row["Description"] . '</p>
                                                    <div class="gx-blog-sub-imgs">
                                                    <p>Voici quelques exemples de discussions dans cette catégorie : </p>
                                                 <div class="row">
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check">&nbsp;&nbsp;</i>' . $example1 . '</p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check">&nbsp;&nbsp;</i>' . $example2 . '</p>
                                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-check">&nbsp;&nbsp;</i>' . $example3 . '</p>
                                                 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div >
                                        <div class="gx-card gx-help-blog-inner">
                                        <div class="row">
                                            <div class="col-md-4 col-4">
                                            <img src="../assets/img/blog/' . $row["CatName"] . '.png" style="width:100%;"/>
                                            </div>
                                            <div class="col-md-4 col-4">
                                            <img src="../assets/img/blog/' . $row["CatName"] . '.png" style="width:100%;"/>
                                            </div>
                                            <div class="col-md-4 col-4">
                                            <img src="../assets/img/blog/' . $row["CatName"] . '.png" style="width:100%;"/>
                                            </div>
                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                        } else {
                            echo "Query failed.";
                        }
                    } else {
                        echo "Category ID not provided.";
                    }
                    mysqli_close($conn); // Close MySQL connection
                
                ?>

                <div class="gx-card gx-help-blog-inner">
                    <div class="row">
                        <div class="col-md-1 col-1">
                            <span style="font-size: 45px;">&#128519;</span>
                        </div>
                        <div class="col-md-11 col-11">
                            <p >
                                Si vous êtes indécis quant à la catégorie de vos discussions, n'hésitez pas à nous
                                contacter. Nos membres du personnel seront ravis de vous aider à choisir .
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Vendor Custom -->
    <script src="../assets/js/vendor/jquery-3.6.4.min.js"></script>

    <script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/vendor/prism.js"></script>
    <!-- Main Custom -->
    <script src="../assets/js/main.js"></script>
    <script src="../includes/javascripts.js"></script>

</body>

</html>
<div>
