<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">

<form class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Resident Information</h4>
        </div>
        <div class="modal-body">';

        $edit_query = mysqli_query($con,"SELECT * from tblresident where id = '".$row['id']."' ");
        $erow = mysqli_fetch_array($edit_query);

        echo '
            <div class="row">
                <div class="container-fluid">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">

                        <input type="hidden" value="'.$erow['id'].'" name="hidden_id" id="hidden_id"/>
                            <label class="control-label">Name:</label><br>
                            <div class="col-sm-4">
                                <input name="txt_edit_lname" class="form-control input-sm" type="text" value="'.$erow['lname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_fname" class="form-control input-sm" type="text" value="'.$erow['fname'].'"/>
                            </div> 
                            <div class="col-sm-4">
                                <input name="txt_edit_mname" class="form-control input-sm" type="text" value="'.$erow['mname'].'"/>
                            </div> <br>
                        </div>

                        <div class="form-group">
                            <label class="control-label" style="margin-top:10px;">Birthdate:</label>
                            <input name="txt_edit_bdate" class="form-control input-sm" type="date" value="'.$erow['bdate'].'"/> 
                        </div>

                        <div class="form-group">
                        <label class="control-label">Age:</label>
                        <input name="txt_age" class="form-control input-sm" type="text" value="'.$erow['age'].'"/>
                    </div>

                   
                    


                        <div class="form-group">
                            <label class="control-label">Sitio/Purok:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                                <option selected>'.$erow['barangay'].'</option>
                                <option>Canlalin Poblacion Albuera, Leyte</option>
                                <option>Gungab Poblacion Albuera, Leyte</option>
                                <option>Malitbog Poblacion Albuera, Leyte</option>
                                <option>Soob Poblacion Albuera, Leyte</option>
                                <option>Sto. Rosario Poblacion Albuera, Leyte</option>
                            </select>
                        </div>

                        <div class="form-group">
                                        <label class="control-label">Household #:</label>
                                        <input name="txt_householdnum" class="form-control input-sm input-size" type="number" min="1" placeholder="Household #"/>
                                    </div>


                        <div class="form-group">
                            <label class="control-label">Differently-abled Person:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                                <option selected>'.$erow['differentlyabledperson'].'</option>
                                <option>Yes</option>
                                <option>No</option>
                                <option>Prefer not to say</option>
                            </select>
                           
                        </div>

                       

                        <div class="form-group">
                            <label class="control-label">Civil Status:</label>
                            <input name="txt_edit_cstatus" class="form-control input-sm input-size" type="text" value="'.$erow['civilstatus'].'"/>
                        </div>

                      

                        <div class="form-group">
                            <label class="control-label">Nationality:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                                <option selected>'.$erow['nationality'].'</option>
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
                            <label class="control-label">Educational Attainment:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                                <option selected>'.$erow['highestEducationalAttainment'].'</option>
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
                            <label class="control-label">Land Ownership Status:</label>
                            <select name="ddl_edit_los" class="form-control input-sm">
                                <option value="'.$erow['landOwnershipStatus'].'">'.$erow['landOwnershipStatus'].'</option>
                                <option selected="" disabled="">-Select-</option>
                                <option value="Own Home">Own Home</option>
                                <option value="Live with Parents/Relatives">Live with Parents/Relatives</option>
                                <option value="Own Home">Tenant</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Gender:</label>
                            <select name="ddl_edit_gender" class="form-control input-sm">
                                <option value="'.$erow['gender'].'" selected="">'.$erow['gender'].'</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Birthplace:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                            <option selected>'.$erow['bplace'].'</option>
                            <option>Albuera Leyte</option>
                            <option>Ormoc City Leyte</option>
                            <option>Baybay City Leyte</option>
                            <option>Tacloban Leyte</option>
                            <option>Manila Leyte</option> 
                        </select>                        
                        </div>

                        

                        <div class="form-group">
                            <label class="control-label">Zone #:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                            <option selected>'.$erow['zone'].'</option>
                            <option>Zone 1</option>
                            <option>Zone 2</option>
                            <option>Zone 3</option>
                            <option>Zone 4</option>
                            <option>Zone 5</option> 
                        </select>    
                        </div>

                        <div class="form-group">
                            <label class="control-label">Total Household Member:</label>
                            <input name="txt_edit_householdmem" class="form-control input-sm" type="number" min="1" value="'.$erow['totalhousehold'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Head of the Family Connection:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                            <option selected>'.$erow['relationtohead'].'</option>
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
                            <input name="txt_edit_occp" class="form-control input-sm" type="text" value="'.$erow['occupation'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Monthly Income:</label>
                            <input name="txt_edit_income" class="form-control input-sm" type="number" min="1" value="'.$erow['monthlyincome'].'"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">Religion:</label>
                            <select name="ddl_edit_eattain" class="form-control input-sm">
                            <option value="'.$erow['religion'].'" selected>'.$erow['religion'].'</option>
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
                            <label class="control-label">House Ownership Status:</label>
                            <select name="ddl_edit_hos" class="form-control input-sm">
                                <option value="'.$erow['houseOwnershipStatus'].'" selected>'.$erow['houseOwnershipStatus'].'</option>
                                <option value="Own Home">Own Home</option>
                                <option value="Rent">Tenant</option>
                                <option value="Live with Parents/Relatives">Live with Parents/Relatives</option>
                            </select>
                        </div>

                       
                       <div class="form-group">
                            <label class="control-label">Former Address:</label>
                            <select name="ddl_edit_hos" class="form-control input-sm">
                            <option value="'.$erow['formerAddress'].'" selected>'.$erow['formerAddress'].'</option>
                            <option>Canlalin Poblacion Albuera, Leyte</option>
                            <option>Gungab Poblacion Albuera, Leyte</option>
                            <option>Malitbog Poblacion Albuera, Leyte</option>
                            <option>Soob Poblacion Albuera, Leyte</option>
                            <option>Sto. Rosario Poblacion Albuera, Leyte</option>
                        </select>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Image:</label>
                            <input name="txt_edit_image" class="form-control input-sm" type="file" />
                        </div>

                    </div>

                    </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>';?>