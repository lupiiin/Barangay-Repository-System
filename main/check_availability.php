<?php
require_once("includes/config.php");

// Check username availability
if (!empty($_POST["username"])) {
    $username = $_POST["username"];

    // You can add additional validation for the username if needed

    $sql = "SELECT Username FROM tblusers WHERE Username = :username";
    $query = $dbh->prepare($sql);
    $query->bindParam(':username', $username, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if ($query->rowCount() > 0) {
        echo "<span style='color:red'> Username already exists.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else {
        echo "<span style='color:green'> Username available for Registration.</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}
?>
