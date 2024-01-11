<?php
include "../connection.php";
if (isset($_POST['btn_add'])) {
    $ddl_pos = $_POST['ddl_pos'];
    $txt_cname = $_POST['txt_cname'];
    $txt_contact = $_POST['txt_contact'];
    $txt_address = $_POST['txt_address'];
    $txt_sterm = $_POST['txt_sterm'];
    $txt_eterm = $_POST['txt_eterm'];

    $name = basename($_FILES['txt_image']['name']);
    $temp = $_FILES['txt_image']['tmp_name'];
    $imagetype = $_FILES['txt_image']['type'];
    $size = $_FILES['txt_image']['size'];

    if (isset($_SESSION['role'])) {
        $action = 'Added Official named ' . $txt_cname;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    $q = mysqli_query($con, "SELECT * from tblofficial where sPosition = '" . $ddl_pos . "' and termStart = '" . $txt_sterm . "' and termEnd = '" . $txt_eterm . "' ");
    $ct = mysqli_num_rows($q);


    if ($ct != 0) {
        if ($name != "") {
            if (($imagetype == "image/jpeg" || $imagetype == "image/png" || $imagetype == "image/bmp") && $size <= 2048000) {
                if (move_uploaded_file($temp, 'image/' . $image)) {
                    $txt_image = $image;
                    $query = mysqli_query($con, "INSERT INTO tblofficial (sPosition,completeName,pcontact,paddress,termStart,termEnd,status,image) 
        values ('$ddl_pos', '$txt_cname', '$txt_contact', '$txt_address', '$txt_sterm', '$txt_eterm', 'Ongoing Term','$txt_image')") or die('Error: ' . mysqli_error($con));
                }
            } else {
                $_SESSION['filesize'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        } else {
            $txt_image = 'default.png';

        $query = mysqli_query($con, "INSERT INTO tblofficial (sPosition,completeName,pcontact,paddress,termStart,termEnd,status,image) 
        values ('$ddl_pos', '$txt_cname', '$txt_contact', '$txt_address', '$txt_sterm', '$txt_eterm', 'Ongoing Term','$txt_image')") or die('Error: ' . mysqli_error($con));

        }
        if($query == true)
            {
                $_SESSION['added'] = 1;
                header ("location: ".$_SERVER['REQUEST_URI']);
            }
    }
    else{
        $_SESSION['duplicateuser'] = 1;
        header ("location: ".$_SERVER['REQUEST_URI']);
    }

    
}
if (isset($_POST['btn_save'])) {
    $txt_id = $_POST['hidden_id'];
    $txt_edit_cname = $_POST['txt_edit_cname'];
    $txt_edit_contact = $_POST['txt_edit_contact'];
    $txt_edit_address = $_POST['txt_edit_address'];
    $txt_edit_sterm = $_POST['txt_edit_sterm'];
    $txt_edit_eterm = $_POST['txt_edit_eterm'];


    if (isset($_SESSION['role'])) {
        $action = 'Update Official named ' . $txt_edit_cname;
        $iquery = mysqli_query($con, "INSERT INTO tbllogs (user,logdate,action) values ('" . $_SESSION['role'] . "', NOW(), '" . $action . "')");
    }

    $update_query = mysqli_query($con, "UPDATE tblofficial set completeName = '" . $txt_edit_cname . "', pcontact = '" . $txt_edit_contact . "', paddress = '" . $txt_edit_address . "', termStart = '" . $txt_edit_sterm . "', termEnd = '" . $txt_edit_eterm . "' where id = '" . $txt_id . "' ") or die('Error: ' . mysqli_error($con));

    if ($update_query == true) {
        $_SESSION['edited'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}

if (isset($_POST['btn_end'])) {

    $txt_id = $_POST['hidden_id'];

    $end_query = mysqli_query($con, "UPDATE tblofficial set status = 'End Term' where id = '$txt_id' ") or die('Error: ' . mysqli_error($con));

    if ($end_query == true) {
        $_SESSION['end'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}

if (isset($_POST['btn_start'])) {

    $txt_id = $_POST['hidden_id'];

    $start_query = mysqli_query($con, "UPDATE tblofficial set status = 'Ongoing Term' where id = '$txt_id' ") or die('Error: ' . mysqli_error($con));

    if ($start_query == true) {
        $_SESSION['start'] = 1;
        header("location: " . $_SERVER['REQUEST_URI']);
    }
}

if (isset($_POST['btn_delete'])) {
    if (isset($_POST['chk_delete'])) {
        foreach ($_POST['chk_delete'] as $value) {
            $delete_query = mysqli_query($con, "DELETE from tblofficial where id = '$value' ") or die('Error: ' . mysqli_error($con));

            if ($delete_query == true) {
                $_SESSION['delete'] = 1;
                header("location: " . $_SERVER['REQUEST_URI']);
            }
        }
    }
}


?>