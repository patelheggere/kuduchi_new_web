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
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="epic">EPIC:
                        <input type="text" placeholder="EPIC Number" id="epic" class="form-control" name="epic" >
                    </label>
                </div>
                <br>
                <p>OR</p>
                <br>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="mobile">ಮೊಬೈಲ್ ಸ೦ಖ್ಯೆ:
                        <input type="text" placeholder="ಮೊಬೈಲ್ ಸ೦ಖ್ಯೆ" id="mobile" class="form-control" name="mobile">
                    </label>
                </div>

                <br>
                <p>OR</p>
                <br>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="ack">ಸ್ವೀಕೃತಿ ಸ೦ಖ್ಯೆ:
                        <input type="text" placeholder="ಸ್ವೀಕೃತಿ ಸ೦ಖ್ಯೆ" id="ack" class="form-control" name="ack">
                    </label>
                </div>
                <br>
                <input type="hidden" value="<?php echo $name ?>" name="username"/>
                <div class="form-group">
                    <div class="col-lg-10">
                        <button class="btn btn-primary" type="submit" name="searchsub">Search</button> 
                    </div>
                </div>
            </fieldset>
        </form>
    </form>
</body>
</html>
