<?php echo '<div id="viewModal'.$row['id'].'" class="modal fade">
<form method="post"  enctype="multipart/form-data">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">View Photo for Activity '.$row['activity'].'</h4>
        </div>
        <div class="modal-body">
        <input type="hidden" name="hidden_id" value="'.$row['id'].'">
        <div class="row">';
            $p = mysqli_query($con,"SELECT * from tblactivityphoto where activityid = '".$row['id']."' ");
            while($row1 = mysqli_fetch_array($p)){
                echo '<div class="col-md-4">
                    <image src="photo/'.basename($row1['filename']).'" style="width:570px;height:580px;"/>
                </div>';
            }
        
        echo '
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close"/>
        </div>
    </div>
  </div>
</form>
</div>';?>