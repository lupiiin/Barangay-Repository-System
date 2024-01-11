<?php

echo '
	<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                        <div class="pull-left info">
                            <h4>Hello, ' . $_SESSION['role'] . '</h4>

                        </div>
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    ';
if ($_SESSION['role'] == "Administrator") {
    echo '
                    <ul class="sidebar-menu">
                            <li>
                                <a href="../dashboard/dashboard.php">
                                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="../officials/officials.php">
                                    <i class="fa fa-user"></i> <span>Barangay Officials</span>
                                </a>
                            </li>
                           
                            <li>
                                <a href="../household/household.php">
                                    <i class="fa fa-home"></i> <span>Household</span>
                                </a>
                            </li>
                            <li>
                                <a href="../resident/resident.php">
                                    <i class="fa fa-users"></i> <span>Resident</span>
                                </a>
                            </li>
                         
                           
                            <li>
                                <a href="../activity/activity.php">
                                    <i class="fa fa-calendar"></i> <span>Announcement</span>
                                </a>
                            </li>

                            <li>
                                 <a href="../reguser/reg-users.php">
                                    <i class="fa fa-users"></i> <span>Reg Users</span>
                                 </a>

                             </li>


                            <li>
                                <a href="../report/report.php">
                                    <i class="fa fa-file"></i> <span>Report</span>
                                </a>
                            </li>
                            <li>
                                <a href="../logs/logs.php">
                                    <i class="fa fa-history"></i> <span>Logs</span>
                                </a>
                            </li>                            
                            
                    </ul>';

} else {
    echo '
                           <ul class="sidebar-menu">
                              <li>
                                    <a href="../resident/profile.php">
                                    <i class="fa fa-calendar"></i> <span>Profile</span>
                                     </a>
                              </li>
                                <li>
                                    <a href="../activity/user1.php">
                                        <i class="fa fa-calendar"></i> <span>Announcement</span>
                                    </a>
                                </li>

                                <li>
                                    <a href=".php">
                                        <i class="fa fa-calendar"></i> <span>Barangay Officials</span>
                                    </a>
                                </li>

                           
                            </ul>';
}
echo '
                </section>
                <!-- /.sidebar -->
            </aside>
	';
?>