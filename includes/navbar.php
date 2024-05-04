<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<header class="gx-header">
    <div class="container-fluid">
        <div class="gx-header-items" style="margin-right:-350px;">
            <div class="left-header">
                <a href="../authentification/help.html" class="gx-toggle-sidebar">
                    <img src="../assets/img/logo/full-logo-2.png" alt="full-logo" class="white-mode-logo">
                </a>
            </div>
            <style>
                .gx-header {
                    background-color: rgba(255, 255, 255, 1);
                    /* Opaque white background */
                }

                .left-header,
                .right-header {
                    display: flex;
                    align-items: center;
                }

                .header-search-box {
                    /* Centrez la boîte de recherche */
                    flex: 1;
                    display: flex;
                    justify-content: center;
                }

                .header-search-drop {
                    position: relative;
                }

                .gx-search {
                    width: 600px;
                    display: flex;
                    align-items: center;
                    border: 0;
                    /* Supprimer la bordure */
                }

                .search-input {
                    width: 600px;
                    /* Ajustez la largeur au besoin */
                    padding: 10px;
                    border-radius: 0;
                    /* Supprimer les coins arrondis */
                }

                .search-btn {
                    margin-left: 8px;
                }

                .right-header {
                    margin-left: auto;
                }

                .icon {
                    margin-right: 370px;
                    font-size: 35px;
                    color: #6C757D;
                }

                input#google::placeholder {
                    font-family: comic sans ms;
                }

                .gsc-control-wrapper-cse {
                    position: relative;
                }

                .search input {
                    border: 1px color #6C757D;
                    border-radius: 30px;
                    color: blue;
                    height: 40px;
                    padding-left: 40px;
                    width: 480px;
                    color: blue;
                }

                .contenu {
                    background-image: url();
                    background-position: center;
                    background-size: cover;
                    height: 100px;
                    padding: 0 20px;
                    text-align: center;
                    width: 110%;
                }

                .recherche {
                    position: relative;
                    top: 50%;
                    transform: translateY(-50%);
                    max-width: 610px;
                    margin: 0 auto;
                }

                li.tbl:hover {
                    background-color: grey;
                    transition-duration: .2s;
                }

                .cadre {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: flex-start;
                    list-style: none;
                    padding: 0;
                }

                input[type="search"]::placeholder {
                    color: grey;
                    font-weight: ;
                    margin-left: 20px;
                }

                .loupe {
                    position: absolute;
                    margin-left: 12px;
                    margin-top: 10px;
                    color: #6C757D;
                }


                .body {
                    background-color: transparent;
                    /* Efface la couleur de fond */
                }
            </style>

            <section class="contenu" style="margin-left: 50px;">
                <div class="recherche">
                    <div class="search">
                        <img class="loupe" src="https://www.icone-png.com/png/35/34747.png" width="3%"
                            style="color=#6C757D;" />
                        <input class="search" type="text"
                            placeholder="Rechercher une discussion ou une categorie ou un utilisateur ...">
                    </div>
                </div>
            </section>
            <style>
                .icon i {
                    font-size: 24px;
                    color: #6C757D;
                    width: 30px;
                    height: 30px;
                }
            </style>

           
            <div class="icon">
                <?php
                // Check if the login information is present in the session
                if (isset($_SESSION['login'])) {
                    // Get the login from the session
                    $login = $_SESSION['login'];
                    // Connect to the MySQL database
                    $servername = "localhost";
                    $username = "your_username";
                    $password = "your_password";
                    $dbname = "your_database";
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // Prepare SQL query to select the picture based on the login
                    $sql = "SELECT Pic FROM Utilisateur WHERE Login = ?";
                    // Prepare the SQL statement
                    $stmt = $conn->prepare($sql);
                    // Bind parameters
                    $stmt->bind_param("s", $login);
                    // Execute the statement
                    $stmt->execute();
                    // Store the result
                    $stmt->store_result();
                    // Bind the result
                    $stmt->bind_result($pic);
                    // Check if a row is returned
                    if ($stmt->num_rows > 0) {
                        // Output the user picture
                        while ($stmt->fetch()) {
                            echo '<img src="' . $pic . '" alt="User Picture" style="width: 60px; height: 60px; border-radius: 50%;">';
                        }
                    } else {
                        // Handle case where no matching user is found
                        echo "No user found with the provided login.";
                    }
                    // Close statement and connection
                    $stmt->close();
                    $conn->close();
                } 
                ?>
            </div>
        </div>
    </div>
</header>
