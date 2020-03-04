<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <?php
        include_once '../login/header.php';
        if (isset($_POST['edit'])) 
            {
             $epic = trim($_POST["epic"]);
            $mobile = trim($_POST["mobile"]);
            $ack = trim($_POST["ack"]);
            $updated_by = trim($_POST['username']);
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            /* change character set to utf8 */
            //echo $epic;
            if (!$conn->set_charset("utf8")) {
                printf("Error loading character set utf8: %s\n", $conn->error);
            } else {
                //printf("Current character set: %s\n", $conn->character_set_name());
            }
            if ($epic != NULL) 
                {
                $query = "select * from users_table where epic='$epic'";
                $res = mysqli_query($conn, $query) or die(mysqli_error());
                if ($res)
                    {
                    $row = mysqli_fetch_array($res, MYSQLI_BOTH);
                    // $_SESSION['name'] = $row['name'];
                    $name = $row['name'];
                    $caste = $row['caste'];
                    $epic = $row['epic'];
                    $depart = $row['department'];
                    $village = $row['village'];
                    $religion = $row['religion'];
                    $mobile = $row['mobile'];
                    $purpose = $row['purpose'];
                    $indication = $row['indication'];
                    $status = $row['status'];
                    $remarks = $row['remarks'];
                    $entered_by = $row['entered_by'];
                    //$updated_by = $row['updated_by'];
                    $created = $row['created'];
                    $booth = $row['booth_no'];
                    //echo 'Appilcation status is:' . "<b>" . $row['status'] . $name . "<br>\n" . "<br>\n$purpose";
                    }
                }
            ?>
            <form class="form-horizontal contactform" action="" method="post" name="f">
                <fieldset>
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="epic">EPIC:
                            <input type="text" value = "<?php echo $epic ?>" placeholder="EPIC Number" id="epic" class="form-control" name="epic" required="">
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Name:
                            <input type="text" value = "<?php echo $name ?>"  id="uname" class="form-control" name="uname" required="This is compulsory">
                        </label>
                    </div>


                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="mobile">Mobile Number:
                            <input type="text" value = "<?php echo $mobile ?>" placeholder="Mobile Number" id="mobile" class="form-control" name="mobile" required="">
                        </label>
                    </div>

                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="village"> Village:
                            <input type="text" value = "<?php echo $village ?>" placeholder="Village" id="village" class="form-control" name="village" required="">
                        </label>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="epic">Booth/Ward No:
                            <input type="text" value = "<?php echo $booth ?>" placeholder="Booth/Ward Number" id="booth" class="form-control" name="booth" required="">
                        </label>
                    </div>
                    
                    </label>

                    <br>
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="religion">Religion:
                            <input type="text" value = "<?php echo $religion ?>" placeholder="Religion" id="caste" class="form-control" name="religion">
                        </label>
                    </div>
                    <br>

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="caste">Caste:
                            <input type="text" value = "<?php echo $caste ?>" placeholder="Caste" id="caste" class="form-control" name="caste">
                        </label>
                    </div>
                    <br>

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="purpose">Purpose:
                            <input type="textarea"  value = "<?php echo $purpose ?>" placeholder="Purpose" id="purpose" class="form-control" name="purpose" required="">
                        </label>
                    </div>
                    <br>  

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="indication">Indication:
                            <input type="text" value="<?php echo $indication ?>" id="indication" name="indication" class="form-control" />
<!--                            <select name="indication" value = "">
                                <option value ="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="X">X</option>
                                <option value="Y">Y</option>
                                <option value="Z">Z</option>
                            </select>-->

                        </label>
                    </div>
                    <br>  

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="status">Status:
                            <input type="text" value = "<?php echo $status ?>" placeholder="Status" id="status" class="form-control" name="status">
                        </label>
                    </div>
                    <br>  
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="depart">Department:
                            <input type="text" value = "<?php echo $depart ?>"  placeholder="Department" id="depart" class="form-control" name="depart">
                        </label>
                    </div>
                    <br>  
                    <input type="hidden" value="<?php echo $name ?>" name="username"/>
                    <div class="form-group">
                        <div class="col-lg-10">
                            <button class="btn btn-primary" type="submit" name="updatesubbtn">Update</button> 
                        </div>
                    </div>
                </fieldset>
            </form>
            <?php
        }

        if (isset($_POST['updatesubbtn'])) {
            ?> <script type="text/javascript">

//                    window.location = '../login/Edit.php';
                    window.location.refresh();

            </script> <?php
    }
        ?>
        <br />

        <p>Please Enter Anyone.</p> 
        <form class="form-horizontal contactform"  method="post" name="f" accept-charset="utf-8">
            <fieldset>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="epic">EPIC:
                        <input type="text" placeholder="EPIC Number" id="epic" class="form-control" name="epic" >
                    </label>
                </div>
                <br>
                <p>OR</p>
                <br>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="mobile">Mobile Number:
                        <input type="text" placeholder="Mobile Number" id="mobile" class="form-control" name="mobile">
                    </label>
                </div>

                <br>
                <p>OR</p>
                <br>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="ack">Acknowledgment Number:
                        <input type="text" placeholder="Acknowledgment Number" id="ack" class="form-control" name="ack">
                    </label>
                </div>
                <br>
                <input type="hidden" value="<?php echo $username ?>" name="username"/>
                <div class="form-group">
                    <div class="col-lg-12">
                        <button class="btn btn-primary" type="submit" name="edit">Edit</button> 
                    </div>
                </div>
            </fieldset>
        </form>

    </body>
</html>
