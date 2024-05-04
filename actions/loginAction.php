<?php
if (isset($_POST["connecter"])) {
    if (empty($_POST["login"])) {
        $errorMsg = "Votre login ne peut pas être vide.";
    } elseif (empty($_POST["password"])) {
        $errorMsg = "Votre mot de passe ne peut pas être vide.";
    } else {
        $login = $_POST["login"];
        $password = $_POST["password"];

        // Include MySQL connection file
        include "../includes/mysql_conn.php";

        // Check if connection is successful
        if ($conn === false) {
            $errorMsg = "Erreur de connexion à la base de données: " . mysqli_connect_error();
        } else {
            // Prepare SQL statement
            $sql = "SELECT COUNT(*) AS count FROM Utilisateur WHERE Login = ? AND Mp = ?";
            $stmt = mysqli_prepare($conn, $sql);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ss", $login, $password);

            // Execute query
            mysqli_stmt_execute($stmt);

            // Get result
            mysqli_stmt_bind_result($stmt, $count);

            // Fetch result
            mysqli_stmt_fetch($stmt);

            // Check if login is successful
            if ($count > 0) {
                $_SESSION['login'] = $login;
                echo "<script>window.location.href = '../Home/'</script>";
            } else {
                $errorMsg = "Login ou mot de passe incorrect.";
                session_destroy();
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
