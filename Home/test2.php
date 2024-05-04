<!DOCTYPE html>
<html lang="en" dir="ltr">
    <!-- connection database -->   
<?php include "../includes/conn.php"; ?>

<head>
    <?php include "../includes/head.php"; ?>
</head>

<body>
    <!-- links -->
    <link id="mainCss" href="../style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />
    <!-- header -->
    <div><?php
    $serverName = "ASUS\MSSQLSERVER1";
    $connectionOptions = array(
        "Database" => "IHMdb",
        "UID" => "",
        "PWD" => ""
    );
    
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    
    if ($conn === false) {
        // If connection fails, handle the error
        die("Connection failed: " . print_r(sqlsrv_errors(), true));
    }
    
    $sql = "SELECT [Id],[Description],[IconCat],[ExempleCat],[CatName] FROM [IHMdb].[dbo].[Categorie]";
    $result = sqlsrv_query($conn, $sql);
    
    if ($result !== false) {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            echo '<li class="gx-sb-item">';
            echo '<a href="../authentification/help.html" class="gx-page-link">';
            echo ' <i class="'. $row["IconCat"] .'"></i><span class="condense"><span class="hover-title">' . $row["CatName"] . '</span></span>';
            echo '</a></li>';
        }
        sqlsrv_free_stmt($result);
    } else {
        echo "Query failed.";
    }
    
    // Close the connection
    if ($conn) {
        sqlsrv_close($conn);
    }
?></div>


    <!-- Vendor Custom -->
    <script src="../js/vendor/jquery-3.6.4.min.js"></script>

    <script src="../js/vendor/bootstrap.bundle.min.js"></script>
    <script src="../js/vendor/prism.js"></script>
    <!-- Main Custom -->
    <script src="../js/main.js"></script>
    <script src="../includes/javascripts.js"></script>
</body>

</html>
