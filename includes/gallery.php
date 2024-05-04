<div class="gallery">
    <img src="../assets/img/busnessman/avatar.png" alt="Main Photo" class="main-photo" onclick="openGallery()" style="border: 2px solid #259dc6;">
</div>

<div id="popup" class="popup" onclick="closeGallery()">
    <span class="close" onclick="closeGallery()">&times;</span>
    <div class="popup-content">
        <?php
        // Include database connection
        include "conn.php";

        $sql = "SELECT PicUrl FROM Pictures";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<img src="' . $row["PicUrl"] . '" alt="Popup Image" class="popup-image" onclick="changeImage(\'' . $row["PicUrl"] . '\')">';
            }
            mysqli_free_result($result);
        } else {
            echo "No images found.";
        }

        // Close database connection
        mysqli_close($conn);
        ?>
    </div>
</div>

<!-- JavaScript code -->
<script>
    function openGallery() {
        document.getElementById("popup").style.display = "block";
    }

    function closeGallery() {
        document.getElementById("popup").style.display = "none";
    }

    function changeImage(src) {
        var mainPhoto = document.querySelector('.main-photo');
        mainPhoto.src = src;
        mainPhoto.style.width = '120px';
        mainPhoto.style.height = '120px';
        closeGallery();

        // Appending selected photo URL to the current URL
        var newUrl = window.location.href.split('?')[0] + '?url=' + encodeURIComponent(src);
        window.history.pushState({ path: newUrl }, '', newUrl);
    }
</script>

<!-- CSS code -->
<style>
    .popup {
        display: none;
        position: fixed;
        z-index: 999;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 45%;
        height: 60%;
        overflow: auto;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 15px;
    }

    .popup-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        height: 100%;
        padding: 20px;
    }

    .popup img {
        width: 120px;
        height: 120px;
        margin: 10px;
        border-radius: 50%;
        cursor: pointer;
    }

    .close {
        color: white;
        position: absolute;
        top: 20px;
        right: 20px;
        font-size: 30px;
        cursor: pointer;
    }

    .main-photo {
        width: 120px;
        height: 120px;
        cursor: pointer;
        border-radius: 50%;
    }
</style>
