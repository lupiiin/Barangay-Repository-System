<?php
include "../connection.php";

if (isset($_POST['btn_add'])) {
    // Retrieve form data
    $position = mysqli_real_escape_string($con, $_POST['ddl_pos']);
    $name = mysqli_real_escape_string($con, $_POST['txt_cname']);
    $contact = mysqli_real_escape_string($con, $_POST['txt_contact']);
    $address = mysqli_real_escape_string($con, $_POST['txt_address']);
    $start_term = mysqli_real_escape_string($con, $_POST['txt_sterm']);
    $end_term = mysqli_real_escape_string($con, $_POST['txt_eterm']);

    // Insert data into the database
    $sql = "INSERT INTO tblofficial (sPosition, completeName, pcontact, paddress, termStart, termEnd, status) 
            VALUES ('$position', '$name', '$contact', '$address', '$start_term', '$end_term', 'Ongoing Term')";

    // Execute the SQL query
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Data successfully inserted
        // Redirect to a new page or the same page
        header("Location: officials.php");
        exit();
    } else {
        // Error in inserting data
        // You can redirect or show an error message here
        echo '<script>alert("Error adding official!");</script>';
    }
}
?>


<!-- Rest of your HTML code for the modal remains unchanged -->
<!-- Add this in the <head> section of your HTML -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Bootstrap Typeahead CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.css">

    <!-- Include Bootstrap Typeahead JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<!-- ========================= MODAL ======================= -->
<div id="addCourseModal" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Manage Officials</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Positions:</label>
                                <select name="ddl_pos" class="form-control input-sm">
                                    <option selected="" disabled="">-- Select Positions -- </option>
                                    <option value="Captain">Barangay Captain</option>
                                    <option value="Kagawad(Ordinance)">Barangay Kagawad(Ordinance)</option>
                                    <option value="Kagawad(Public Safety)">Barangay Kagawad(Public Safety)</option>
                                    <option value="Kagawad(Tourism)">Barangay Kagawad(Tourism)</option>
                                    <option value="Kagawad(Budget & Finance)">Barangay Kagawad(Budget & Finance)
                                    </option>
                                    <option value="Kagawad(Agriculture)">Barangay Kagawad(Agriculture)</option>
                                    <option value="Kagawad(Education)">Barangay Kagawad(Education)</option>
                                    <option value="Kagawad(Infrastructure)">Barangay Kagawad(Infrastructure)</option>
                                    <option value="SK Chairman">SK Chairman</option>
                                    <option value="Secretary">Barangay Secretary</option>
                                    <option value="Treasurer">Barangay Treasurer</option>
                                </select>
                            </div>
                            <div class="form-group">
    <label>Name:</label>
    <input name="txt_cname" class="form-control input-sm typeahead" type="text" placeholder="Lastname, Firstname Middlename" />
</div>


                            <div class="form-group">
                                <label>Contact #:</label>
                                <input name="txt_contact" class="form-control input-sm" type="number"
                                    placeholder="Contact #" />
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <select name="txt_address" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Sitio-</option>
                                        <option>Canlalin Poblacion Albuera, Leyte</option>
                                        <option>Gungab Poblacion Albuera, Leyte</option>
                                        <option>Malitbog Poblacion Albuera, Leyte</option>
                                        <option>Soob Poblacion Albuera, Leyte</option>
                                        <option>Sto. Rosario Poblacion Albuera, Leyte</option>

                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Start Term:</label>
                                <input id="txt_sterm" name="txt_sterm" class="form-control input-sm" type="date"
                                    placeholder="Start Term" />
                            </div>
                            <div class="form-group">
                                <label>End Term:</label>
                                <input name="txt_eterm" class="form-control input-sm" type="date"
                                    placeholder="End Term" />
                            </div>
                            <div class="form-group">
                                    <label class="control-label">Image:</label>
                                    <input name="txt_image" class="form-control input-sm" type="file" />
                                </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add" value="Add Officials" />
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('input[name="txt_sterm"]').change(function () {
            var startterm = document.getElementById("txt_sterm").value;
            console.log(startterm);
            document.getElementsByName("txt_eterm")[0].setAttribute('min', startterm);
        });
    });
</script>
<script>
$(document).ready(function(){
    var names = [];

    // Assuming $con is your database connection
    <?php
    $sql = "SELECT CONCAT(Lastname, ' ,', Firstname, ' ', Middlename) AS FullName FROM tblusers";
    $query = $con->query($sql);
    if ($query->num_rows > 0) {
        while ($result = $query->fetch_assoc()) {
            echo 'names.push("'.addslashes($result['FullName']).'");';
        }
    }
    ?>

    // Initialize Typeahead
    $('.typeahead').typeahead({
        source: names
    });
});
</script>

