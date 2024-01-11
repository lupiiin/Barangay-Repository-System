<?php

echo '
	<aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        
                    </div>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    ';
if ($_SESSION['role'] == "Administrator") {
    
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
                                    <a href="../officials/official.php">
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