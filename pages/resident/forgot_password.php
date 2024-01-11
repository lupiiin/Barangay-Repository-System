<!-- forgot_password.php -->

<!DOCTYPE html>
<html>
<?php
// Include your PHP logic here
session_start();

// Establish Connection with Server by passing inputs as a parameter
$con = mysqli_connect('localhost', 'root', '', 'db_barangay') or die(mysqli_error());

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Forgot Password Logic
if (isset($_POST['btn_forgot'])) {
  $mobileNumber = isset($_POST['txt_mobile']) ? $_POST['txt_mobile'] : "";
  // Perform the necessary steps for password recovery using mobile number here
  // Generate a unique token, send an SMS with a code, etc.
  // You may want to include a separate file or function for this logic.
}
// Example logic for processing forgot password form
if (isset($_POST['btn_forgot'])) {
    $mobileNumber = isset($_POST['txt_mobile']) ? $_POST['txt_mobile'] : "";
    // Perform the necessary steps for password recovery using mobile number here
    // Generate a unique token, send an SMS with a code, etc.
    // You may want to include a separate file or function for this logic.
}
?>

<head>
    <meta charset="UTF-8">
    <title>Barangay Repository System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <style>
        body {
            background-color: beige;
        }

        .forgot-password-modal {
            display: none;
        }

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -50%);
            -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
            top: 50%;
            margin: 0 auto;
        }
    </style>
</head>

<body class="skin-black">
    <div class="container" style="margin-top: 80px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center;">
                    <img src="../../img/bargo.png" style="height:150px;" />
                    <h3 class="panel-title">
                        <br>
                        <strong>
                            Barangay Poblacion Repository System
                            <br>
                            <br>Resident Login
                        </strong>
                    </h3>
                    <br>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="txt_username">Username</label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_username"
                                placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Password</label>
                            <input type="password" class="form-control" style="border-radius:0px" name="txt_password"
                                placeholder="Enter Password">
                            <div class="form-group">
                                <a href="#" id="forgotPasswordLink">Forgot Password?</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" name="btn_login">Log in</button>
                        <label id="error" class="label label-danger pull-right"></label>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Include your forgot password form or content here -->
                    <form role="form" method="post">
                        <div class="form-group">
                            <label for="txt_mobile">Mobile Number</label>
                            <input type="text" class="form-control" name="txt_mobile"
                                placeholder="Enter Mobile Number" required>
                        </div>
                        <!-- Add other forgot password fields as needed -->
                        <button type="submit" class="btn btn-primary" name="btn_forgot">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#forgotPasswordLink').click(function () {
                $('#forgotPasswordModal').modal('show');
            });
        });
    </script>
</body>

</html>
