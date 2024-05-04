<?php include "conn.php"; ?>
<div class="col-xl-3 col-lg-4 col-md-12 gx-topic" style="width: 18%;position: sticky; left: 0;">
    <div class="gx-card topic-sidebar">
        <div class="gx-card-content gx-topic-list">
            <nav>
                <ul class="gx-sb-list">
                    <style>
                        /* Styles for hover effects */
                    </style>
                    <a href="../Categorie/liste_Categorie.php" class="gx-page-link">
                        <span class="hover-tit">Liste des Categories</span>
                    </a>
                    <hr style="border-top: 1px solid #ccc;">
                    <!-- PHP code to fetch categories -->
                    <?php
                    // Include database connection
                    include "conn.php";

                    // Prepare SQL query to select category information
                    $sql = "SELECT Id, Description, IconCat, ExempleCat, CatName FROM Categorie";

                    // Prepare statement
                    $stmt = $conn->prepare($sql);

                    // Execute statement
                    if ($stmt->execute()) {
                        // Check if any rows returned
                        if ($stmt->rowCount() > 0) {
                            // Fetch category information
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<li class="gx-sb-item">';
                                echo '<a href="../Home/index.php?id=' . $row["CatName"] . '" class="gx-page-link">';
                                echo ' <div style="width:25px"></div><i class="' . $row["IconCat"] . '"></i><span class="condense"><span class="hover-title">' . $row["CatName"] . '</span></span>';
                                echo '</a></li>';
                            }
                        } else {
                            // Handle case where no categories found
                            echo "No categories found.";
                        }
                    } else {
                        // Handle SQL execution error
                        echo "Query failed.";
                    }

                    // Close statement and database connection
                    $stmt = null;
                    $conn = null;
                    ?>
                    <!-- End of PHP code for fetching categories -->
                    <hr style="border-top: 1px solid #ccc;">
                    <a href="help.html" class="gx-page-link">
                        <span class="condense">
                            <span class="hover-tit2">Mes Discussions</span>
                        </span>
                    </a>
                    <hr style="border-top: 1px solid #ccc;">
                    <li class="gx-sb-item">
                        <?php echo "<a href='../Home/index.php?id=" . $_SESSION['login'] . "' class='gx-page-link'>
                        <div style ='width:25px'></div>
                        <i class='fa fa-comments'></i>
                            <span class='condense'>
                            <span class='hover-title'>Modifier</span></a>"; ?>
                    </li>
                    <a href="../Home/edit-profile.php" class="gx-page-link">
                        <span class="condense">
                            <span class="hover-tit3">Mon profil</span>
                        </span>
                    </a>
                    <hr style="border-top: 1px solid #ccc;">
                    <li class="gx-sb-item">
                        <a href="help.html" class="gx-page-link">
                            <div style="width:25px"></div>
                            <i class="fa fa-id-card"></i>
                            <span class="condense">
                                <span class="hover-title">Mettre à jour</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- Vendor Custom -->
<script src="../js/vendor/jquery-3.6.4.min.js"></script>
<script src="../js/vendor/bootstrap.bundle.min.js"></script>
<script src="../js/vendor/prism.js"></script>
<!-- Main Custom -->
<script src="../js/main.js"></script>
<script src="javascripts.js"></script>
