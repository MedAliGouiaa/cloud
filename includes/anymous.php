<?php
include("conn.php");

// Retrieve a random adjective
$sql_adjective = "SELECT `Adjective` FROM `AnonymousNames` ORDER BY RAND() LIMIT 1";
$result_adjective = mysqli_query($conn, $sql_adjective);
if (!$result_adjective) {
    die("Error: " . mysqli_error($conn));
}
$row_adjective = mysqli_fetch_assoc($result_adjective);
$adjective = $row_adjective['Adjective'];
mysqli_free_result($result_adjective);

// Retrieve a random noun
$sql_noun = "SELECT `Noun` FROM `anames` ORDER BY RAND() LIMIT 1";
$result_noun = mysqli_query($conn, $sql_noun);
if (!$result_noun) {
    die("Error: " . mysqli_error($conn));
}
$row_noun = mysqli_fetch_assoc($result_noun);
$noun = $row_noun['Noun'];
mysqli_free_result($result_noun);

// Generate a random number between 10 and 99
$random_number = rand(10, 99);

// Combine parts to form a random name
$random_name = $adjective . $noun . $random_number;
?>
