<!DOCTYPE html>
<html>
<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("Location: ../resident/login.php");
} else {
    ob_start();
    include('../head_css.php');
    ?>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php

        include "../connection.php";
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Barangay Officials
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="box">
                            <div class="box-body table-responsive">
                                <form method="post">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <?php
                                                if (!isset($_SESSION['staff'])) {
                                                ?>
                                                <?php
                                                }
                                                ?>
                                                <th>Position</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>Address</th>
                                                <th>Start of Term</th>
                                                <th>End of Term</th>
                                                <th style="width: 130px !important;">Image</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!isset($_SESSION['staff'])) {

                                                $squery = mysqli_query($con, "select * from tblofficial ");
                                                while ($row = mysqli_fetch_array($squery)) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['sPosition'] . '</td>
                                                            <td>' . $row['completeName'] . '</td>
                                                            <td>' . $row['pcontact'] . '</td>
                                                            <td>' . $row['paddress'] . '</td>
                                                            <td>' . $row['termStart'] . '</td>
                                                            <td>' . $row['termEnd'] . '</td>
                                                            <td style="width:80px;"><image src="image/'.basename($row['image']).'" style="width:70px;height:70px;"/></td>

                                                            
                                                        </tr>
                                                        ';

                                                    include "edit_modal.php";
                                                    include "endterm_modal.php";
                                                    include "startterm_modal.php";
                                                   
                                                }
                                            } else {
                                                $squery = mysqli_query($con, "select * from tblofficial where status = 'Ongoing Term' group by termend");
                                                while ($row = mysqli_fetch_array($squery)) {
                                                    echo '
                                                        <tr>
                                                            <td>' . $row['sPosition'] . '</td>
                                                            <td>' . $row['completeName'] . '</td>
                                                            <td>' . $row['pcontact'] . '</td>
                                                            <td>' . $row['paddress'] . '</td>
                                                            <td>' . $row['termStart'] . '</td>
                                                            <td>' . $row['termEnd'] . '</td>
                                                            <td><button class="btn btn-primary btn-sm" data-target="#editModal' . $row['id'] . '" data-toggle="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></td>
                                                            <td style="width:80px;"><image src="image/'.basename($row['image']).'" style="width:70px;height:70px;"/></td>

                                                        </tr>
                                                        ';

                                                    include "edit_modal.php";
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <?php include "../deleteModal.php"; ?>

                                </form>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->


                        <?php include "../edit_notif.php"; ?>

                        <?php include "../added_notif.php"; ?>

                        <?php include "../delete_notif.php"; ?>

                        <?php include "add_modal.php"; ?>

                        <?php include "function.php"; ?>


                    </div> <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; ?>
        <script type="text/javascript">
            <?php
            if (!isset($_SESSION['staff'])) {
            ?>
                $(function() {
                    $("#table").dataTable({
                        "aoColumnDefs": [{
                            "bSortable": false,
                            "aTargets": [0, 7]
                        }],
                        "aaSorting": []
                    });
                });
            <?php
            } else {
            ?>
                $(function() {
                    $("#table").dataTable({
                        "aoColumnDefs": [{
                            "bSortable": false,
                            "aTargets": [6]
                        }],
                        "aaSorting": []
                    });
                });
            <?php
            }
            ?>
        </script>
    </body>
</html>