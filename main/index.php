<html>
<head>
    <meta charset="UTF-8">
    <title>Barangay Repository System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="../js/morris/morris-0.4.3.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <link href="../css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../css/select2.css" rel="stylesheet" type="text/css" />
    <script src="../js/jquery-1.12.3.js" type="text/javascript"></script>
    <style>
        .no-print{
            display:none;
        }
        .dataTables_filter input { 
        padding-top: 20px;
        padding-bottom: 20px;}
        body {
            background-color: beige; /* Set the background color */
        }
        .navbar-nav > li > a {
            color: blue !important;
            font-size: 18px;
        }
        .container-box {
            width: 80%; /* Adjust the width as needed */
            margin: 0 auto;
            padding: 20px;
            background-color: beige;
            border: 1px solid beige;
            border-radius: 5px;
            margin-top: 20px;
        }

        .container-box h3 {
            color: #333;
            text-align: center;
        }
        .container-box h3 {
            color: maroon; 
            font-family: Cooper Black; 
            font-size: 50px; 
            line-height: 1.6; 
        }
        .container-box h4 {
            color: #333;
            text-align: center;
        }
        .container-box h4 {
            color: #333; 
            font-family: Amasis MT Pro Black; 
            font-size: 20px; 
            line-height: 1.6; 
        }
        .container-box h5 {
            color: #333;
            text-align: center;
        }
        

       
    </style>
</head>
<body>
<nav class="navbar navbar-inverse" style="border-radius:0px; padding: 15px; background-color: white;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img alt="Brand" src="../img/bargo.png" style="width:50px; margin-top:-15px; "></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="about.php"><b>Description</b></a></li>
        <li><a href="registration.php"><b>Register</b></a></li>
        <li><a href="../pages/resident/login.php"><b>ResidentsLogin</b></a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="wrapper row-offcanvas row-offcanvas-left">
        <div class="container-box">
        
<h3><b>W E L C O M E, </b>to <br> Barangay Poblacion Repository System

</h3>
<h4>"Stay Connected, Stay Informed: Your One-Stop Hub for Important Announcements in Our Community."</h4>
<br>
<br>
<br>

<h5>Click this  <a href="about.php">discription</a>  to know more.</h5>


        
        </div>
    </div>


</body>
<script type="text/javascript">
  $(function() {
      $("#table").dataTable({
         "aoColumnDefs": [ { "bSortable": false, "aTargets": [ 0,5 ] } ],"aaSorting": [],
         "dom":' <"search"f><"top"l>rt<"bottom"ip><"clear">'
      });
  });

  $(document).ready(function () {             
  $('.dataTables_filterinput[type="search"]').css(
     {'width':'350px','display':'inline-block'}
  );
});
</script>


</html>