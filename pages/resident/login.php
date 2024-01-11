<!DOCTYPE html>
<html>
<?php
session_start();

// Establish Connection with Server by passing inputs as a parameter
$con = mysqli_connect('localhost', 'root', '', 'barangay') or die(mysqli_error());

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['btn_login'])) {
    $username = isset($_POST['txt_username']) ? $_POST['txt_username'] : "";
    $password = isset($_POST['txt_password']) ? md5($_POST['txt_password']) : "";

    $checkUserQuery = "SELECT * FROM tblusers WHERE Username = '$username' AND Password = '$password'";
    $checkUserResult = mysqli_query($con, $checkUserQuery);

    if (mysqli_num_rows($checkUserResult) > 0) {
        $_SESSION['username'] = $username;
        header("Location: profile.php"); // Redirect to the user1.php page after successful login
        exit();
    } else {
        echo "<script>alert('Invalid username or password. Please try again.');</script>";
    }
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

        .modal.fade .modal-dialog {
            -webkit-transform: translate(0, -50%);
            -ms-transform: translate(0, -50%);
            transform: translate(0, -50%);
            top: 50%;
            margin: 0 auto;
        }

        div.back-to-home {
            text-align: center;
            margin-top: 0;
        }

        div.back-to-home a {
            text-decoration: none;
            color: #337ab7;
            font-weight: bold;
            font-size: 16px;
        }

        div.back-to-home a:hover {
            color: #286090;
        }
    </style>
</head>

<body class="skin-black">
    <div class="container" style="margin-top:80px">
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
                        </div>
                        
                        <button type="submit" class="btn btn-sm btn-primary" name="btn_login">Log in</button>
                        <label id="error" class="label label-danger pull-right"></label>
                        <div class="back-to-home">
                            <a href="../../index.php"><b>Back to Home</b></a>
                        </div>
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
                            <label for="txt_username">Username</label>
                            <input type="text" class="form-control" style="border-radius:0px" name="txt_username"
                                placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="txt_mobile">Mobile Number</label>
                            <input type="text" class="form-control" name="txt_mobile" placeholder="Enter Mobile Number"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Enter Password</label>
                            <input type="password" class="form-control" style="border-radius:0px" name="txt_password"
                                placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <label for="txt_password">Confirm Password</label>
                            <input type="password" class="form-control" style="border-radius:0px"
                                name="txt_confirm_password" placeholder="Confirm Password">
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