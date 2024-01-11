<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../resident/login.php");
} else {
    ob_start();
    include('../head_css.php');
}
?>
<body class="skin-black">
    <?php
    include "../connection.php";
    include('../header.php');
    include('../sidebar.php');
    ?>
    <aside class="right-side">
        <section class="content-header">
            <h1>Announcement</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="box-body table-responsive">
                    <form method="post">
                        <table id="table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date of Activity</th>
                                    <th>Activity</th>
                                    <th>Description</th>
                                    <th style="width: 140px !important;">Photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $squery = mysqli_query($con, "select * from tblactivity");
                                while ($row = mysqli_fetch_array($squery)) :
                                ?>
                                    <tr>
                                        <td><?= $row['dateofactivity'] ?></td>
                                        <td><?= $row['activity'] ?></td>
                                        <td><?= $row['description'] ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-target="#viewModal<?= $row['id'] ?>" data-toggle="modal">
                                                <i class="fa fa-search" aria-hidden="true"></i> View
                                            </button>
                                        </td>
                                    </tr>
                                <?php
                                    include "view_modal1.php";
                                endwhile;
                                ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <?php include "../edit_notif.php"; ?>
            <?php include "../added_notif.php"; ?>
            <?php include "../delete_notif.php"; ?>
            <?php include "../duplicate_error.php"; ?>
            <?php include "add_modal.php"; ?>
            <?php include "function.php"; ?>
        </section>

    </aside>
    <?php 
        include "../footer.php"; ?>
<script type="text/javascript">

var select_all = document.getElementById("cbxMainphoto"); //select all checkbox
var checkboxes = document.getElementsByClassName("chk_deletephoto"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}

    <?php
    if($_SESSION['role'] == "Administrator")
    {
    ?>
        $(function() {
            $("#table").dataTable({
               "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,4 ] } ],"aaSorting": []
            });
            $(".select2").select2();
        });
    <?php
    }
    elseif(isset($_SESSION['resident']))
    {
    ?>
        $(function() {
            $("#table").dataTable({
               "aoColumnDefs": [ { "bSortable": false } ],"aaSorting": []
            });
            $(".select2").select2();
        });
    <?php
    }
    else{
    ?>
        $(function() {
            $("#table").dataTable({
               "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 4 ] } ],"aaSorting": []
            });
            $(".select2").select2();
        });
    <?php
    }
    ?>
</script>
    </body>
</html>
