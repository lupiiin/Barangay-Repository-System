<!DOCTYPE html>
<html>
<?php
session_start();

// Establishing Connection with Server by passing inputs as a parameter
$con = mysqli_connect('localhost', 'root', '', 'barangay') or die(mysqli_error());

// Check if the connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

date_default_timezone_set("Asia/Manila");

// error_reporting(0); // You might want to enable error reporting for debugging
if (isset($_POST['signup'])) {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
    $middlename = isset($_POST['middlename']) ? $_POST['middlename'] : "";
    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $mobile = isset($_POST['mobileno']) ? $_POST['mobileno'] : "";
    $address = isset($_POST['address']) ? $_POST['address'] : "";
    $password = isset($_POST['password']) ? md5($_POST['password']) : "";

    // Check if the username already exists
    $checkUserQuery = "SELECT * FROM tblusers WHERE Username = '$username'";
    $checkUserResult = mysqli_query($con, $checkUserQuery);

    if (mysqli_num_rows($checkUserResult) > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.');</script>";
    } else {
        // Insert user data into the database
        $insertUserQuery = "INSERT INTO tblusers(Firstname, Lastname, Middlename, Username, Address, ContactNo, Password) 
                            VALUES('$firstname', '$lastname', '$middlename', '$username', '$address', '$mobile', '$password')";
        $insertUserResult = mysqli_query($con, $insertUserQuery);

        if ($insertUserResult) {
            echo "<script>alert('Registration successful. Now you can login');</script>";
        } else {
            echo "<script>alert('Something went wrong. Please try again');</script>";
        }
    }
}
?>


<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
        url: "check_availability.php",
        data:'username='+$("#username").val(),
        type: "POST",
        success:function(data){
            $("#user-availability-status").html(data);
            $("#loaderIcon").hide();
        },
        error:function (){}
    });
}
</script>
<script type="text/javascript">
function valid() {
    if(document.signup.password.value != document.signup.confirmpassword.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.signup.confirmpassword.focus();
        return false;
    }
    return true;
}
</script>

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
    background-image: url('../img/blur-background09.jpg');;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
}

.container-box {
    border: 0px solid #f0f0f0;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    width: 50%;
    max-width: 500px; /* Adjust the max-width as needed */
}

.panel-heading {
    text-align: center;
    font-size: 30px;
}
.form {
    border: 2px;
}
.form-group {
    margin-bottom: 20px;
   
}
.form-group-a {
    margin-bottom: 10px;
   
}

.checkbox {
    margin-top: 15px;
}

.btn-block {
    background-color: #337ab7;
    color: lightblue;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.btn-block:hover {
    background-color: #286090;
 
}

div.back-to-home {
    text-align: center;
    margin-top: 0; 
}

div.back-to-home a {
    text-decoration: none;
    color: #337ab7;
    font-weight: bold;
    font-size: 20px;
}

div.back-to-home a:hover {
    color: #286090;
}


.panel-body {
    margin-top: 20px;
    background-color: #f0f0f0; 
    padding: 0px;
    border-radius: 100px;  
    display: flex;
    flex-direction: column;
    align-items: center;
}
.panel-title{
    font: arial;
}
input.form-control {
            border-radius: 3px;
            font-size: 12px;
            width: 350px;
            height: 25px;
        }


    </style>
</head>

<body class="skin-black">
    <div class="container-box">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              
                <div class="panel-body">
                <div class="panel-heading">            
                    <h3 class="panel-title">                    
                        <strong>                        
                           Resident Registration
                        </strong>
                    </h3>
                   
                </div>
                    <form method="post" name="signup" onSubmit="return valid();">
                    <div class="form-group">
                        <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="middlename" placeholder="Middle Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="address" placeholder="Sitio" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" onBlur="checkAvailability()" placeholder="Username" required="required">
                        <span id="user-availability-status" style="font-size:12px;"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required="required">
                    </div>
                    
                    <div class="form-group-a">
                        <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                    </div>
                    <div class="back-to-home">
                    <a href="about.php"><b>Back to Home</b></a>
                    </div>
                    
                    </form>
                </div>
               

            </div>
        </div>
    </div>
</body>

</html>