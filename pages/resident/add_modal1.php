<!-- ========================= MODAL ======================= -->
<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include Bootstrap Typeahead CSS -->
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.css">

<!-- Include Bootstrap Typeahead JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<div id="addCourseModal1" class="modal fade">
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Manage Residents</h4>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="container-fluid">
                            <div class="col-md-6 col-sm-12">

                                <div class="form-group">
                                    <label class="control-label">Name:</label><br>
                                    <div class="col-sm-4">
                                        <input name="txt_lname" class="form-control input-sm typeahead" type="text"
                                            placeholder="Lastname" />
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="txt_fname" class="form-control input-sm col-sm-4 typeahead"
                                            type="text" placeholder="Firstname" />
                                    </div>
                                    <div class="col-sm-4">
                                        <input name="txt_mname" class="form-control input-sm col-sm-4 typeahead"
                                            type="text" placeholder="Middlename" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Birthdate:</label>
                                    <input name="txt_bdate" id="birthdate" class="form-control input-sm input-size"
                                        type="date" placeholder="Birthdate" onchange="calculateAge()" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Age:</label>
                                    <input name="txt_age" id="age" class="form-control input-sm input-size" type="text"
                                        placeholder="Age" readonly />
                                </div>

                                <script>
                                    function calculateAge() {
                                        // Get the birthdate input value
                                        var birthdateInput = document.getElementById('birthdate').value;

                                        // Calculate the age
                                        var today = new Date();
                                        var birthdate = new Date(birthdateInput);
                                        var age = today.getFullYear() - birthdate.getFullYear();

                                        // Check if birthday has occurred this year
                                        if (today.getMonth() < birthdate.getMonth() || (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
                                            age--;
                                        }

                                        // Update the age input field
                                        document.getElementById('age').value = age;
                                    }
                                </script>



                                <div class="form-group">
                                    <label class="control-label">Sitio/Purok:</label>
                                    <select name="txt_brgy" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Sitio-</option>
                                        <option>Canlalin Poblacion Albuera, Leyte</option>
                                        <option>Gungab Poblacion Albuera, Leyte</option>
                                        <option>Malitbog Poblacion Albuera, Leyte</option>
                                        <option>Soob Poblacion Albuera, Leyte</option>
                                        <option>Sto. Rosario Poblacion Albuera, Leyte</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Household #:</label>
                                    <input name="txt_householdnum" class="form-control input-sm input-size"
                                        type="number" min="1" placeholder="Household #" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Person With Disability (PWD):</label>
                                    <select name="txt_dperson" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select-</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                        <option>Prefer not to say</option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label class="control-label">Civil Status:</label>
                                    <select name="txt_cstatus" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select</option>
                                        <option>Married</option>
                                        <option>Single</option>
                                        <option>Divorced</option>
                                        <option>Widowed</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Religion:</label>
                                    <select name="txt_religion" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Religion-</option>
                                        <option>Ang Dating Daan</option>
                                        <option>Born Again</option>
                                        <option>Foursquare Church</option>
                                        <option>Iglesia Ni Cristo (INC)</option>
                                        <option>Roman Catholic</option>
                                        <option>Pentecostal Christian</option>
                                        <option>United Church of Christ in the Philippines (UCCP)</option>
                                        <option>Other</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="control-label">Educational Attainment:</label>
                                    <select name="ddl_eattain" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Educational Attainment-</option>
                                        <option>Infant</option>
                                        <option>Elementary Level</option>
                                        <option>Elementary Graduated</option>
                                        <option>High School Level</option>
                                        <option>High school Completer</option>
                                        <option>Senior High School Level</option>
                                        <option>Senior High School Graduate</option>
                                        <option>ALS Graduate</option>
                                        <option>College Level</option>
                                        <option>College Graduate</option>
                                        <option>Vocational</option>
                                        <option>Bachelor’s degree</option>
                                        <option>Master’s degree</option>
                                        <option>Doctorate degree</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Former Address:</label>
                                    <select name="ddl_Faddress" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Former Address-</option>
                                        <option>Canlalin Poblacion Albuera, Leyte</option>
                                        <option>Gungab Poblacion Albuera, Leyte</option>
                                        <option>Malitbog Poblacion Albuera, Leyte</option>
                                        <option>Soob Poblacion Albuera, Leyte</option>
                                        <option>Sto. Rosario Poblacion Albuera, Leyte</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-md-6 col-sm-12">

                                <div class="form-group">
                                    <label class="control-label">Gender:</label>
                                    <select name="ddl_gender" class="form-control input-sm">
                                        <option selected="" disabled="">-Select Gender-</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Birthplace:</label>
                                    <select name="txt_bplace" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Birthplace-</option>
                                        <option>Albuera Leyte</option>
                                        <option>Ormoc City Leyte</option>
                                        <option>Baybay City Leyte</option>
                                        <option>Tacloban Leyte</option>
                                        <option>Manila Leyte</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Zone #:</label>
                                    <select name="txt_zone" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Zone </option>
                                        <option>Z1</option>
                                        <option>Z2</option>
                                        <option>Z3</option>
                                        <option>Z4</option>
                                        <option>Z5</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Total Household Member:</label>
                                    <input name="txt_householdmem" class="form-control input-sm" type="number" min="1"
                                        placeholder="Total Household Member" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Head of the Family Connection:</label>
                                    <select name="txt_rthead" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select-</option>
                                        <option>Head of the Family</option>
                                        <option>Husband</option>
                                        <option>Wife</option>
                                        <option>Parent</option>
                                        <option>Child</option>
                                        <option>Grandparent</option>
                                        <option>Sibling </option>
                                        <option>Extended Family </option>
                                    </select>

                                </div>

                                <div class="form-group">
                                    <label class="control-label">Occupation:</label>
                                    <input name="txt_occp" class="form-control input-sm" type="text"
                                        placeholder="Occupation" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Monthly Income:</label>
                                    <input name="txt_income" class="form-control input-sm" type="number" min="1"
                                        placeholder="Monthly Income" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Nationality:</label>
                                    <select name="txt_national" class="form-control input-sm input-size">
                                        <option selected="" disabled="">-Select Nationality-</option>
                                        <option>American</option>
                                        <option>British</option>
                                        <option>Canadian</option>
                                        <option>Chinese</option>
                                        <option>Filipino</option>
                                        <option>Indian</option>
                                        <option>Korean</option>
                                        <option>Japanese</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="control-label">House Ownership Status:</label>
                                    <select name="ddl_hos" class="form-control input-sm">
                                        <option selected="" disabled="">-Select-</option>
                                        <option value="Own Home">Own Home</option>
                                        <option value="Live with Parents/Relatives">Live with Parents/Relatives</option>
                                        <option value="Own Home">Tenant</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label class="control-label">Image:</label>
                                    <input name="txt_image" class="form-control input-sm" type="file" />
                                </div>



                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add"
                        value="Add Resident" />
                </div>
            </div>
        </div>
    </form>
</div>
