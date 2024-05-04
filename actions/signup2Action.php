<?php
$errorMsg = "";
if (isset($_POST["signup2"])) {
    if (empty($_POST["login"])) {
        $errorMsg = "Veuillez fournir votre login.";
    } else if (empty($_POST["email"])) {
        $errorMsg = "Veuillez fournir votre adresse e-mail.";
    } else if (empty($_POST["password"])) {
        $errorMsg = "Veuillez fournir votre mot de passe.";
    } else if (empty($_POST["confirm_password"])) {
        $errorMsg = "Veuillez confirmer votre mot de passe.";
    } else if ($_POST["password"] !== $_POST["confirm_password"]) {
        $errorMsg = "Le mot de passe et le mot de passe de confirmation ne correspondent pas.";
    } else if (empty($_POST["telephone"])) {
        $errorMsg = "Veuillez fournir votre numéro du téléphone.";
    } else if (!isset($_GET['url'])) {
        $errorMsg = "Problème avec la photo.";
    } else {
        // Include MySQL connection file
        include "../includes/mysql_conn.php";

        // Check if connection is successful
        if ($conn === false) {
            $errorMsg = "Erreur de connexion à la base de données: " . mysqli_connect_error();
        } else {
            // Prepare SQL statement to check if login exists
            $sqlChecklogin = "SELECT COUNT(*) AS loginCount FROM Utilisateur WHERE Login = ?";
            $stmtChecklogin = mysqli_prepare($conn, $sqlChecklogin);
            mysqli_stmt_bind_param($stmtChecklogin, "s", $_POST["login"]);

            // Execute the prepared statement
            if (mysqli_stmt_execute($stmtChecklogin) === false) {
                $errorMsg = "Erreur lors de la vérification de l'existence du login: " . mysqli_error($conn);
            } else {
                // Fetch result
                mysqli_stmt_bind_result($stmtChecklogin, $loginCount);
                mysqli_stmt_fetch($stmtChecklogin);

                if ($loginCount > 0) {
                    $errorMsg = "Le login existe déjà.";
                } else {
                    $login = $_POST["login"];
                    $mp = $_POST["password"];
                    $bannir = 0; // Assuming default value
                    $valider = 1; // Assuming default value
                    $role = 0; // Assuming default value
                    $pic = $_GET['url']; // Assuming default value

                    // Prepare SQL statement to insert user data into Utilisateur table
                    $sqlInsert = "INSERT INTO Utilisateur (Login, Mp, Bannir, Valider, Role, Pic) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmtInsert = mysqli_prepare($conn, $sqlInsert);
                    mysqli_stmt_bind_param($stmtInsert, "ssiiis", $login, $mp, $bannir, $valider, $role, $pic);

                    // Execute the prepared statement
                    if (mysqli_stmt_execute($stmtInsert) === false) {
                        $errorMsg = "Erreur lors de l'insertion des données d'utilisateur: " . mysqli_error($conn);
                    } else {
                        // Get the last inserted user ID
                        $utilisateurId = mysqli_insert_id($conn);

                        // Get other user data
                        $nom = $_SESSION['form_data1']['nom'];
                        $prenom = $_SESSION['form_data1']['prenom'];
                        $email = $_POST["email"];
                        $numTel = $_POST["telephone"];
                        $sexe = $_SESSION['form_data1']['sexe'];
                        $dateNaiss = $_SESSION['form_data1']['date_naissance'];
                        $situSocial = $_SESSION['form_data1']['situation_sociale'];
                        $profession = $_SESSION['form_data1']['profession'];
                        include ("../includes/anymous.php");
                        $nomAnonyme = $random_name;

                        // Prepare SQL statement to insert user profile data into Profile table
                        $sqlInsertProfile = "INSERT INTO Profile (UtilisateurId, Nom, Prenom, Email, NumTel, Sexe, DateNaiss, SituSocial, Profession, NomAnonyme) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $stmtInsertProfile = mysqli_prepare($conn, $sqlInsertProfile);
                        mysqli_stmt_bind_param($stmtInsertProfile, "isssisssss", $utilisateurId, $nom, $prenom, $email, $numTel, $sexe, $dateNaiss, $situSocial, $profession, $nomAnonyme);

                        // Execute the prepared statement
                        if (mysqli_stmt_execute($stmtInsertProfile) === false) {
                            $errorMsg = "Erreur lors de l'insertion des données de profil: " . mysqli_error($conn);
                        } else {
                            // Data inserted successfully
                            echo "Inscription réussie.";
                        }

                        // Close statement
                        mysqli_stmt_close($stmtInsertProfile);
                    }

                    // Close statement
                    mysqli_stmt_close($stmtInsert);
                }
            }
        }

        // Close connection
        mysqli_close($conn);
    }

    // Display error message
    if (!empty($errorMsg)) {
        echo '<script>';
        echo 'setTimeout(function() {';
        echo 'document.getElementById(\'errorMsg\').innerHTML = \'\';';
        echo '}, 2000);';
        echo '</script>';
    }
}
?>
