<!DOCTYPE html>
<html lang="en">
<head>
    <?php

session_start();

?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test conn</title>
    <!-- Include Font Awesome for heart icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include php files -->
    <?php include "../includes/conn.php";    ?>
</head>
<body>
    <div>hey------------------</div>
    <?php include "../includes/head.php";    ?>

    <!-- Display signup data -->
    <div>
        <h2>Signup Data:</h2>
        <?php if(isset($_SESSION['form_data1'])): ?>
            <p>Nom: <?php echo $_SESSION['form_data1']['nom']; ?></p>
            <p>Prénom: <?php echo $_SESSION['form_data1']['prenom']; ?></p>
            <p>Date de naissance: <?php echo $_SESSION['form_data1']['date_naissance']; ?></p>
            <p>Sexe: <?php echo $_SESSION['form_data1']['sexe']; ?></p>
            <p>Situation sociale: <?php echo $_SESSION['form_data1']['situation_sociale']; ?></p>
            <p>Profession: <?php echo $_SESSION['form_data1']['profession']; ?></p>
        <?php endif; ?>

        <?php if(isset($_SESSION['form_data2'])): ?>
            <h2>Signup2 Data:</h2>
            <p>Login: <?php echo $_SESSION['form_data2']['login']; ?></p>
            <p>Email: <?php echo $_SESSION['form_data2']['email']; ?></p>
            <p>pwd: <?php echo $_SESSION['form_data2']['password']; ?></p>
            <p>Picture: <?php echo $_SESSION['form_data2']['Pic']; ?></p>
            <p>telephone: <?php echo $_SESSION['form_data2']['telephone']; ?></p>
            <!-- Display other signup2 data -->
        <?php endif; ?>
    </div>
</body>
</html>
