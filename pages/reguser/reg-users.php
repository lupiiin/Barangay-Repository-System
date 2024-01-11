<?php
session_start();

// Define $error and $msg to avoid undefined variable error
$error = "";
$msg = "";

if (!isset($_SESSION['role'])) {
    header("Location: ../../login.php");
} else {
    ob_start();
    include('../head_css.php');
?>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php
        include "../connection.php"; // Include the database connection code
        ?>
        <?php include('../header.php'); ?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php include('../sidebar-left.php'); ?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Register User
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="panel panel-default">
                            <div class="panel-heading">Reg Users</div>
                            <div class="panel-body">
                                <?php
                                if ($error) {
                                    echo '<div class="errorWrap"><strong>ERROR</strong>:' . htmlentities($error) . '</div>';
                                } else if ($msg) {
                                    echo '<div class="succWrap"><strong>SUCCESS</strong>:' . htmlentities($msg) . '</div>';
                                }
                                ?>
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Middlename</th>
                                            <th>Username</th>
                                            <th>Contact no</th>
                                            <th>Address</th>                           
                                            <th>Reg Date</th>
                                            <!-- Add the necessary actions header here -->
                                        </tr>
                                    </thead>
                                    <tbody>
    <?php
    // Assuming $con is your database connection
    $sql = "SELECT * FROM tblusers";
    $query = $con->query($sql);
    $cnt = 1;
    if ($query->num_rows > 0) {
        while ($result = $query->fetch_assoc()) {
    ?>
            <tr>
                <td><?php echo htmlentities($cnt); ?></td>
                <td><?php echo htmlentities($result['Firstname']); ?></td>
                <td><?php echo htmlentities($result['Lastname']); ?></td>
                <td><?php echo htmlentities($result['Middlename']); ?></td>
                <td><?php echo htmlentities($result['Username']); ?></td>
                <td><?php echo htmlentities($result['ContactNo']); ?></td>
                <td><?php echo htmlentities($result['Address']); ?></td>   
                <td><?php echo htmlentities($result['RegDate']); ?></td>
                <!-- Add the necessary actions column here -->
            </tr>
    <?php
            $cnt = $cnt + 1;
        }
    }
    ?>
</tbody>
                                </table>
                            </div>
                        </div><!-- /.box -->
                    </div> <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- jQuery 2.0.2 -->
        <script src="https://code.jquery.com/jquery-2.0.2.min.js"></script>
        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>

        <?php
        include "../footer.php";
        ?>
        <script type="text/javascript">
            <?php
            if (!isset($_SESSION['staff'])) {
            ?>
                $(function() {
                    $("#zctb").dataTable({ // Change from "table" to "zctb"
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
                    $("#zctb").dataTable({ // Change from "table" to "zctb"
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
<?php
}
?>
