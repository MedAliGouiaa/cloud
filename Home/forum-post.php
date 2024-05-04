<?php
// Start the session
session_start();

// Include the database connection file
include "../includes/conn.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST['category'] = "Sociale";
    // Check if all form fields are filled
    if (!empty($_POST['category']) && !empty($_POST['title']) && !empty($_POST['rules'])) {
        // Get the form data
        $category = $_POST['category'];
        $title = $_POST['title'];
        $description = $_POST['rules'];

        // Check if the category is "Autre" and if the "Titre de discussion" field is empty
        if ($category == "Autre" && empty($_POST['autre'])) {
            echo '<script>alert("Veuillez remplir le champ Titre de discussion lorsque vous sélectionnez la catégorie Autre.")</script>';
        } else {
            if(empty($title)){$title=null;}
            // Insert into Discussion table
            $sql_insert_discussion = "INSERT INTO Disccusion (titre, Date, CategorieId, CatAutreTitre) 
                                      VALUES (?, NOW(), ?, null)";
            $stmt_insert_discussion = mysqli_prepare($conn, $sql_insert_discussion);
            mysqli_stmt_bind_param($stmt_insert_discussion, "si", $title, $category_id);
            mysqli_stmt_execute($stmt_insert_discussion);
            $discussion_id = mysqli_insert_id($conn);

            // Insert into Post table
            $sql_insert_post = "INSERT INTO Post (Description, UtilisateurId, DisccusionId, Dislike, Like) 
                                VALUES (?, ?, ?, 0, 0)";
            $stmt_insert_post = mysqli_prepare($conn, $sql_insert_post);
            mysqli_stmt_bind_param($stmt_insert_post, "sii", $description, $_SESSION['user_id'], $discussion_id);
            
            // Execute the statement
            if (mysqli_stmt_execute($stmt_insert_post)) {
                echo '<script>alert("Discussion publiée avec succès.")</script>';
            } else {
                echo '<script>alert("Erreur lors de la publication de la discussion.")</script>';
            }

            // Free the statement resources
            mysqli_stmt_close($stmt_insert_discussion);
            mysqli_stmt_close($stmt_insert_post);
        }
    } else {
        if (empty($_POST['category'])) {
            echo '<script>alert("Veuillez sélectionner une catégorie.")</script>';
        } elseif (empty($_POST['title'])) {
            echo '<script>alert("Veuillez remplir le champ Titre de discussion.")</script>';
        } elseif (empty($_POST['rules'])) {
            echo '<script>alert("Veuillez remplir le champ Description de discussion.")</script>';
        } else {
            // Process form submission
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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

                <body>

                    <div class="col-xl-6 col-lg-8 col-md-12 order-lg-1 order-2" style="width: 80%;margin-top: 22px;">
                        <div class="gx-forum-post gx-card p-24">
                            <div class="gx-inner-form">
                                <h4 class="main-heding mt-0" style="margin-left: 21%;">Démarrer votre propre discussion
                                    :</h4>
                                <p style="margin-left: 21%;font-size: 16px;">Initiez de nouvelles conversations et
                                    partagez vos idées avec notre communauté.<br>
                                    Lancez une discussion, posez des
                                    questions, ou montrez votre point de vue sur un sujet .</p>
                                    <form class="gx-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-field">
        <div class="br-select">
            <div class="br-input">
                <label class="label-heading">Sélectionner une catégorie</label>
                <br>
                <div id="id_filter_1" class="drop-down">
                    <div class="header">
                        <div class="filter_selected"></div>
                        <i class="ri-arrow-drop-down-line"></i>
                    </div>
                    <div class="filters">
                        <div class="filter" style="display: none;" name="category" value="1" selected disabled hidden >--</div>
                        <?php
                        // Assuming you have already established a database connection
                                                        
                        // Define your SQL query to select all category names
                        $sql = "SELECT Id, CatName FROM Categorie";

                        // Execute the query
                        $result = mysqli_query($conn, $sql);

                        // Check if the query was successful
                        if ($result !== false) {
                            // Fetch associative array of category names
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Output each category name within a <div> element with class "filter"
                                echo '<div class="filter" onclick="selectCategory(this)" value="' . $row['Id'] . '">' . $row['CatName'] . '</div>';
                            }

                            // Free the result set
                            mysqli_free_result($result);
                        } else {
                            // If the query fails, display an error message
                            die("Query failed: " . mysqli_error($conn));
                        }

                        // Close the database connection
                        mysqli_close($conn);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="autreInput" class="form-field" style="display: none;">
        <label for="autre">Nommez votre nouvelle catégorie</label>
        <input type="text" id="autre" name="autre">
    </div>
    <!-- Hidden input field to store the selected category value -->
    <input type="hidden" id="selectedCategory" name="category" value="">
    <div class="form-field">
        <label class="label-heading">Titre de discussion</label>
        <br>
        <input type="text" name="title" placeholder="De quoi s'agit dans cette discussion en une courte phrase ?">
    </div>
    <div class="form-field">
        <label class="label-heading">Description de discussion</label>
        <br>
        <textarea id="rules" placeholder="Fournir une description détaillée..." name="rules"></textarea>
    </div>
    <div class="form-field-buttons">
        <button type="submit" class="gx-btn-primary gx-model">Publier</button>
    </div>
</form>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    </main>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">

    </script>
    <script src="https://kit.fontawesome.com/9e5ba2e3f5.js" crossorigin="anonymous"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
