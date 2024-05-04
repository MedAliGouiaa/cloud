<?php
include("conn.php");

function temps_ecoule($date_post)
{
    // Convertir la date de la publication en un objet DateTime
    $date_post = new DateTime($date_post->format('Y-m-d H:i:s'));
    // Obtenir la date et l'heure actuelles
    $date_actuelle = new DateTime();
    // Calculer la différence entre les deux dates
    $difference = $date_actuelle->diff($date_post);

    // Générer le texte de temps écoulé en fonction de la différence
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

if (isset($_GET['id'])) {
    $avisid = isset($_GET['id']) ? $_GET['id'] : null;

    // Second SQL query
    $sql2 = "SELECT 
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
                T1.Id = '" . $avisid . "'";

    $result2 = mysqli_query($conn, $sql2);
    if ($result2 === false) {
        die(mysqli_error($conn));
    }
    
    while ($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
        $name = $row2["NomAnonyme"] ;
        echo '<div class="card mb-2"><div class="card-body p-2 p-sm-3"><div class="media forum-item"><a href="#" data-toggle="collapse" data-target=".forum-content">';
        echo '<img src="' . $row2["Pic"] . '" class="mr-3 rounded-circle" width="50" alt="User" /></a><div class="media-body">';
        echo '<h6><a href="#" data-toggle="collapse" data-target=".forum-content" class="text-body"><br><u>' . $row2["CatName"] . '</u>:' . $row2["titre"] . '</a></h6> ';
        echo '<p class="text-secondary">' . $row2["Description"] . '</p>';
        echo '<p class="text-muted"><a href="javascript:void(0)">' . $row2["NomAnonyme"] . '</a> a publié <span class="text-secondary font-weight-bold">' . temps_ecoule($row2["Date"]) . '</span></p></div>';
        echo '<div class="text-muted small text-center align-self-center">';
        echo '<span class="d-none d-sm-inline-block">';
        echo '<button>';
        echo '<i class="fa fa-thumbs-up"></i>';
        echo '</button>';
        echo '<button>';
        echo '<i class="fa fa-thumbs-down"></i>';
        echo '</button>';
        echo '</span>';
        echo '</div></div></div></div>';
    }

    // First SQL query
    $sql1 = "SELECT 
                T1.Id,
                T1.Commentaire,
                T1.Date,
                T1.PostId,
                T1.UtilisateurId,
                T4.Pic,
                T1.Like,
                T1.Dislike,
                T5.NomAnonyme
            FROM Avis AS T1
            JOIN Utilisateur AS T4 ON T1.UtilisateurId = T4.Id
            JOIN Profile AS T5 ON T1.UtilisateurId = T5.UtilisateurId
            WHERE T1.PostId = '" . $avisid . "'";

    $result1 = mysqli_query($conn, $sql1);

    if ($result1 === false) {
        die(mysqli_error($conn));
    }

    while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
        echo "<span style='font-size:20px;'>&#11185;</span>";
        echo '<div class="card mb-2" style="margin-left: 20px;"><div class="card-body p-2 p-sm-3"><div class="media forum-item"><a href="#" data-toggle="collapse" data-target=".forum-content">';
        echo '<img src="' . $row1["Pic"] . '" class="mr-3 rounded-circle" width="50" alt="User" /></a><div class="media-body">';
        echo '<br>';
        echo '<p class="text-secondary">' . $row1["Commentaire"] . '</p>';
        echo '<p class="text-muted"><a href="javascript:void(0)">' . $row1["NomAnonyme"] . '</a> a publié <span class="text-secondary font-weight-bold">' . temps_ecoule($row1["Date"]) . '</span></p></div>';
        echo '<div class="text-muted small text-center align-self-center">';
        echo '<span class="d-none d-sm-inline-block">';
        echo '<button>';
        echo '<i class="fa fa-thumbs-up"></i>';
        echo '</button>';
        echo '<button>';
        echo '<i class="fa fa-thumbs-down"></i>';
        echo '</button>';
        echo '</span>';
        echo '</div></div></div></div>';

    }
    echo '<hr>
    <div class="gx-blog-cmt-form m-t-15" style="margin-left: 10px;">
    <div class="gx-blog-reply-wrapper mt-50">
        <h6 class="gx-blog-dgx-title m-b-15">Partagez vos réflexions sur le problème de <u>' . $name . '</u> :</h6>
        <form class="gx-blog-form" action="#" method="post">
            <div class="col-md-12">
                <div class="gx-text-leave m-t-15">
                    <textarea placeholder="Message"  name="x"></textarea>
                    <center>
                        <button type="submit" class="gx-btn-primary gx-model">
                            Répondre
                        </button>
                    </center>
                </div>
            </div>
        </form>
    </div>
</div>';
}

// Close MySQL connection
$conn->close();
?>
