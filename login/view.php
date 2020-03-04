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
        <?php include_once '../login/header.php'; ?> 
        <br />
        <form class="form-horizontal contactform"  method="post" name="f" accept-charset="utf-8">
            <fieldset>

                <form action="" method="post">
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="date">Date:
                            <input type="date" placeholder="date" id="date" class="form-control" name="date" >
                            <input type="submit" name="date_btn" id="village_btn" value="Search">
                        </label>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="village">Village:
                            <input type="text" placeholder="Village" id="village" class="form-control" name="village" >
                            <input type="submit" name="village_btn" id="village_btn" value="Search">
                        </label>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="depart">Department:
                            <input type="text" placeholder="Department" id="depart" class="form-control" name="depart" >
                            <input type="submit" name="depart_btn" id="depart_btn" value="Search">
                        </label>
                    </div>
                    <hr>

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="village_1">Village:
                            <input type="text" placeholder="village " id="village_1" class="form-control" name="village_1" >

                        </label>

                        AND 

                        <label class="col-lg-12 control-label" for="purpose">Purpose:
                            <input type="text" placeholder="purpose" id="purpose" class="form-control" name="purpose" >
                            <input type="submit" name="village_and_purpose" id="village_and_purpose" value="Search">
                        </label>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="col-lg-12 control-label" for="caste">Caste:
                            <input type="text" placeholder="caste " id="caste" class="form-control" name="caste" >

                        </label>

                        AND 

                        <label class="col-lg-12 control-label" for="purpose">Purpose:
                            <input type="text" placeholder="purpose" id="purpose" class="form-control" name="purpose" >
                            <input type="submit" name="caste_and_purpose" id="caste_and_purpose" value="Search">
                        </label>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-lg-14">
                            <button class="btn btn-primary" type="submit" name="viewsub">View All</button> 
                        </div>
                    </div>


                </form>



            </fieldset>
        </form>
    </form>
</body>
</html>
