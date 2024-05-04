<?php
// Start session if not started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if 'login' session is set
if (isset($_SESSION['login'])) {
    // Get login from session
    $login = $_SESSION['login'];

    // Include database connection
    include "conn.php";

    // Prepare SQL query to select user information
    $sql = "SELECT * FROM Utilisateur AS U JOIN Profile AS P ON U.Id = P.UtilisateurId WHERE Login = :login";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':login', $login);

    // Execute statement
    if ($stmt->execute()) {
        // Check if any rows returned
        if ($stmt->rowCount() > 0) {
            // Fetch user information
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Assign user data to variables
            $nom = $row['Nom'];
            $prenom = $row['Prenom'];
            $email = $row['Email'];
            $dateNaiss = $row['DateNaiss'];
            $sexe = $row['Sexe'];
            $situationsociale = $row['SituSocial'];
            $profession = $row['Profession'];
            $pic = $row['Pic'];

            // Format date of birth
            $date_formatee = date("d/m/Y", strtotime($dateNaiss));
        } else {
            // Handle case where no matching user found
            echo "Aucun utilisateur trouvé avec le login fourni.";
        }
    } else {
        // Handle SQL execution error
        echo "Erreur lors de l'exécution de la requête SQL";
    }

    // Close database connection
    $conn = null;

} else {
    // Handle case where 'login' session is not set
    echo "Session 'login' non définie.";
}
?>
