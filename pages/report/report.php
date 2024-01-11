<!DOCTYPE html>
<html>

    <?php
    session_start();
    if(!isset($_SESSION['role']))
    {
        header("Location: ../../login.php"); 
    }
    else
    {
    ob_start();
    include('../head_css.php'); ?>

<style>
        .form-group {
            margin-top: 15px;
            margin-left: 10px;
            margin-bottom: 0;
            
        }
    </style>

    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <?php 
        
        include "../connection.php";
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
                        Reports
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                            <div class="box">
                                <div class="box-header">
                                <div class="form-group">     
    <label class="control-label">Data:</label>
    <form action="export.php" method="post">
    <select name="Data" class="form-control1 input-sm">
        <option selected="" disabled="">-Select-</option>
        <option value="Income">Resident Income Level</option>
        <option value="Education">Resident Educational Attainment</option>
        <option value="zone">Population per Zone</option>
        <option value="Age">Age</option>
        <option value="All">All</option>
    </select>
    <button class="btn btn-primary btn-sm" type="submit" name="export"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button>
</form>

</div>                        
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                
                                <div class="row">                     
                                    <div class="col-md-12 col-sm-12 col-xs-12">                     
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Resident Income Level
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-bar-chart4"></div>
                                            </div>
                                        </div>          
                                    </div>   
                                    <div class="col-md-6 col-sm-12 col-xs-12">                     
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               Resident Educational Attainment
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-donut-chart"></div>
                                            </div>
                                        </div>            
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">                     
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                               Population per Zone
                                            </div>
                                            <div class="panel-body">
                                                <div id="morris-bar-chart3"></div>
                                            </div>
                                        </div>            
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">                     
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Age
                                        </div>
                                        <div class="panel-body">
                                            <div id="morris-bar-chart2"></div>
                                        </div>
                                    </div>            
                                </div> 


                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                            


                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <?php }
        include "../footer.php"; 

        include "donut-chart.php";
        include "bar-chart.php"; 
        ?>



    </body>
</html>