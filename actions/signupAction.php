<?php
$errorMsg = "";
if (isset($_POST["signup1"])) {
    if (empty($_POST["nom"]) || empty($_POST["prenom"])) {
        $errorMsg = "Votre nom et/ou prénom est vide.";
    } else if (empty($_POST["day"]) || empty($_POST["month"]) || empty($_POST["year"])) {
        $errorMsg = "Votre date de naissance n'est pas complète/vide.";
    } else if ($_POST["month"] == 2 && ($_POST["day"] > 29 || ($_POST["day"] == 29 && !((($_POST["year"] % 4 == 0) && ($_POST["year"] % 100 != 0)) || ($_POST["year"] % 400 == 0))))) {
        $errorMsg = "Le jour n'est pas valide pour le mois de février.";
    } else if ((in_array($_POST["month"], array(4, 6, 9, 11)) && $_POST["day"] > 30) || ($_POST["day"] > 31)) {
        $errorMsg = "Le jour n'est pas valide pour le mois donné.";
    } else if (empty($_POST["sexe"])) {
        $errorMsg = "Spécifiez votre sexe.";
    } else if (empty($_POST["situation_sociale"])) {
        $errorMsg = "Sélectionnez votre situation sociale.";
    } else if (empty($_POST["profession"])) {
        $errorMsg = "Veuillez fournir votre profession.";
    } else {
        $_SESSION['form_data1'] = array(
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'date_naissance' => $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'],
            'sexe' => $_POST['sexe'],
            'situation_sociale' => $_POST['situation_sociale'],
            'profession' => $_POST['profession']
        );
        header("Location: /ForumFusion-partieUser/authentification/signup2.php");
        exit();
    }
    if (!empty($errorMsg)) {
        echo '<script>';
        echo 'setTimeout(function() {';
        echo 'document.getElementById(\'errorMsg\').innerHTML = \'\';';
        echo '}, 2000);';
        echo '</script>';
    }
}

?>
