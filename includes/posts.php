<?php
// Include database connection
include "conn.php";

// Start the session
session_start();

// Function to calculate elapsed time
function temps_ecoule($date_post)
{
    // Convert the publication date to a DateTime object
    $date_post = new DateTime($date_post->format('Y-m-d H:i:s'));    // Get the current date and time
    $date_actuelle = new DateTime();
    // Calculate the difference between the two dates
    $difference = $date_actuelle->diff($date_post);

    // Generate the elapsed time text based on the difference
    if ($difference->y > 0) {
        return $difference->y . " an(s) ago";
    } elseif ($difference->m > 0) {
        return $difference->m . " mois ago";
    } elseif ($difference->d > 0) {
        return $difference->d . " jour(s) ago";
    } elseif ($difference->h > 0) {
        return $difference->h . " heure(s) ago";
    } elseif ($difference->i > 0) {
        return $difference->i . " minute(s) ago";
    } else {
        return "Il y a quelques instants";
    }
}

// Get the category name from the URL parameter
$catname = isset($_GET['id']) ? $_GET['id'] : 'Tous';

// Prepare the SQL query
if ($catname === "Tous") {
    $sql = "SELECT 
                T1.Id,
                T1.UtilisateurId,
                T1.DisccusionId,
                T4.Pic,
                T5.NomAnonyme,
                T2.CatName,
                T3.Date,
                T3.titre,
                T1.Description,
                T1.Like,
                T1.Dislike  
            FROM 
                Post AS T1
            JOIN
                Disccusion AS T3 ON T1.DisccusionId = T3.Id
            JOIN
                Categorie AS T2 ON T2.Id = T3.CategorieId 
            JOIN
                Utilisateur AS T4 ON T4.Id = T1.UtilisateurId
            JOIN
                Profile AS T5 ON T5.UtilisateurId = T4.Id";
} else {
    $sql = "SELECT 
                T1.Id,
                T1.UtilisateurId,
                T1.DisccusionId,
                T4.Pic,
                T5.NomAnonyme,
                T2.CatName,
                T3.Date,
                T3.titre,
                T1.Description,
                T1.Like,
                T1.Dislike  
            FROM 
                Post AS T1
            JOIN
                Disccusion AS T3 ON T1.DisccusionId = T3.Id
            JOIN
                Categorie AS T2 ON T2.Id = T3.CategorieId 
            JOIN
                Utilisateur AS T4 ON T4.Id = T1.UtilisateurId
            JOIN
                Profile AS T5 ON T5.UtilisateurId = T4.Id
            WHERE 
                T2.CatName = ?";
}

// Prepare and execute the SQL statement
$stmt = $conn->prepare($sql);
if ($catname !== "Tous") {
    $stmt->execute([$catname]);
} else {
    $stmt->execute();
}

// Fetch the results
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="col-xl-3 col-lg-4 col-md-12 gx-topic" style="width: 100%;position: sticky; left: 0;">
    <div class="gx-card topic-sidebar">
        <div class="gx-card-header">
            <h4 class="gx-card-title">Liste des Discussions</h4>
        </div>
        <div class="gx-card-content gx-topic-list">
            <nav>
                <ul class="gx-sb-list">

                    <?php foreach ($posts as $row): ?>
                        <div class="clickable-card card mb-2" style="cursor: pointer;"
                             onclick="window.location.href = '../Home/avispost.php?id=<?= $row['Id'] ?>';">
                            <div class="card-body p-2 p-sm-3">
                                <div class="media forum-item">
                                    <a href="#" data-toggle="collapse" data-target=".forum-content">
                                        <img src="<?= htmlspecialchars($row['Pic'], ENT_QUOTES, 'UTF-8') ?>"
                                             class="mr-3 rounded-circle" width="50" alt="User"/>
                                    </a>
                                    <div class="media-body">
                                        <h6><a href="#" data-toggle="collapse" data-target=".forum-content"
                                               class="text-body"><p class="text-secondary">
                                                    <br><u><?= htmlspecialchars($row['CatName'], ENT_QUOTES, 'UTF-8') ?></u>:
                                                    <?= htmlspecialchars($row['titre'], ENT_QUOTES, 'UTF-8') ?></a></h6>
                                        <?= htmlspecialchars($row['Description'], ENT_QUOTES, 'UTF-8') ?>
                                        <p class="text-muted"><a
                                                    href="javascript:void(0)"><?= htmlspecialchars($row['NomAnonyme'], ENT_QUOTES, 'UTF-8') ?></a>
                                            a publié <span
                                                    class="text-secondary font-weight-bold"><?= temps_ecoule($row["Date"]) ?></span>
                                        </p>
                                    </div>
                                    <div class="text-muted small text-center align-self-center">
                                        <span class="d-none d-sm-inline-block">
                                            <button><i class="fa fa-thumbs-up"></i></button>
                                            <button><i class="fa fa-thumbs-down"></i></button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    // Add a click event listener to the clickable-card class
    document.addEventListener('DOMContentLoaded', function () {
        var cards = document.querySelectorAll('.clickable-card');
        cards.forEach(function (card) {
            card.addEventListener('click', function () {
                // Get the URL from the card's data attribute or any other source
                var url = '../Home/avispost.php?id=<?= $row["Id"] ?>'; // Example URL

                // Navigate to the URL
                window.location.href = url;
            });
        });
    });
</script>

<!-- Vendor Custom -->
<script src="../assets/js/vendor/jquery-3.6.4.min.js"></script>
<script src="../assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="../assets/js/vendor/prism.js"></script>
<!-- Main Custom -->
<script src="../assets/js/main.js"></script>
<script src="../includes/javascripts.js"></script>
