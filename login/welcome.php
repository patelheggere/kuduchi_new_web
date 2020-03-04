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
        <script src="../js/tabjs.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
        <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
        <!--          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.css">
                <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>-->
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    </head>
    <body>
        <?php include_once '../login/header.php'; ?> 
        <?php
        if (isset($_POST['registersub'])) {

            $name = trim($_POST["uname"]);
            $epic = trim($_POST["epic"]);
            $mobile = trim($_POST["mobile"]);
            $village = trim($_POST["village"]);
            $religion = trim($_POST["religion"]);
            $caste = trim($_POST["caste"]);
            $purpose = trim($_POST["purpose"]);
            $indication = trim($_POST["indication"]);
            $status = trim($_POST["status"]);
            $depart = trim($_POST["depart"]);
            $created = time();
            $updated = time();
            $booth = trim($_POST['booth']);
            $entered_by = trim($_POST['username']);
            $created = date("Y-m-d");
            $updated = date("Y-m-d");

            // Create connection
            $conn = new mysqli($servername, $uname, $pwd, $dbname);
// Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            /* change character set to utf8 */
            if (!$conn->set_charset("utf8")) {
                //printf("Error loading character set utf8: %s\n", $conn->error);
            } else {
                //printf("Current character set: %s\n", $conn->character_set_name());
            }

            $sql = "INSERT INTO users_table (name, epic, mobile, village, religion, caste, purpose, indication, status, department, remarks,created, entered_by, updated_by, booth_no, visit_count) VALUES "
                    . "                     ('$name', '$epic', '$mobile', '$village', '$religion','$caste', '$purpose', '$indication','$status', '$depart','remarks','$created', '$entered_by', '$entered_by', '$booth',0)";

            if ($conn->query($sql) === TRUE) {

                $id = $conn->insert_id;
                // $sql = "UPDATE users_table SET visit_count='$name' WHERE epic='$epic'";

                $query = "select * from users_table where epic='$epic'";
                $res = mysqli_query($conn, $query) or die(mysqli_error());
                //$id = $res['sl_no'];
                // $row = mysqli_fetch_array($res, MYSQLI_BOTH)
                $co = mysqli_num_rows($res);
                //echo "Counr:".$co;
                if ($co > 0) {
                    //$sql = "UPDATE users_table SET visit_count=2 WHERE epic = 'IEL23235'";
                    $sql2 = "UPDATE users_table SET visit_count='$co' WHERE epic='$epic'";
                    $res2 = mysqli_query($conn, $sql2) or die(mysqli_error());
                    if ($res2) {
                        //echo "\n Updated count:".$co."\n ".$epic;
                    } else {
                        //   echo 'Error';
                    }
                }


                // $id = $conn->insert_id;
                //echo "\n New record created successfully with ID :$id";
                if ($status != "") {
                    $first = "ನಿಮ್ಮ ಕೆಲಸದ ವಿವರ ";
                    $last = " ಇ೦ತಿ ನಿಮ್ಮ ಪಿ. ರಾಜೀವ್ ";
                    $message = $first . $status . $last;
                    SendSms($mobile, $message);
                }
                ?>
            <html>  <body >
                    <button onclick="javascript:reloadUrl();">Back </button>
                    <div align = "center">   
                        <form onclick="window.print()">

                            <table border="0" align = "center">

                                <tbody>
                                    <tr>
                                        <td><?php echo "Acknowldement Number:" ?></td>
                                        <td><b><?php echo $id; ?></b></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo "Name" ?></td>
                                        <td><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo "Place" ?></td>
                                        <td><?php echo $village; ?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo "Purpose" ?></td>
                                        <td><b><?php echo $purpose; ?></b></td>
                                    </tr>

                                </tbody>
                                <input type="submit" value="Print">
                            </table>
                        </form>
                    </div>
                </body>
            </html>

            <?php
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function SendSms($mobile, $msg) {


        //Your authentication key
        $authKey = "98994Ah6HOa2yH5b24cb5b";

//Multiple mobiles numbers separated by comma
        $mobileNumber = $mobile;

//Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "PRAJIV";

//Your message to send, Add URL encoding here.
        $message = urlencode($msg);

//Define route 
        $route = "4";
        $unicode = "1";
//Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route,
            'unicode' => $unicode
        );

//API URL
        $url = "http://bulksms.srushti.info/api/sendhttp.php";

// init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
        ));


//Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
        $output = curl_exec($ch);

//Print error if any
        if (curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
            ?>
            <script type="text/javascript">
                window.alert('SMS Have not sent');
            </script>
            <?php
        }

        curl_close($ch);
        ?>
        <script type="text/javascript">
            //window.alert('SMS sent Successfully');
        </script>
        <?php
//echo $output;
    }
    ?> <script type="text/javascript">

//                    window.location = '../login/Edit.php';
        window.location.refresh();

    </script> <?php ?>

    <div>
        <form class="form-horizontal contactform" method="post" name="f" accept-charset="utf-8">
            <fieldset>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="epic">EPIC:
                        <input type="text" placeholder="EPIC Number" id="epic" class="form-control" name="epic" required="">
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <label>ಹೆಸರು:
                        <input type="text" placeholder="ಹೆಸರು" id="uname" class="form-control" name="uname" >
                    </label>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-lg-12 control-label" for="mobile">ಮೊಬೈಲ್ ಸ೦ಖ್ಯೆ:
                        <input type="text" placeholder="ಮೊಬೈಲ್ ಸ೦ಖ್ಯೆ" id="mobile" class="form-control" name="mobile" >
                    </label>
                </div>

                <br>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="village">ಊರು:
                </div>

                <div>
                    <select id="village" style="width:300px;">
                        <!-- Dropdown List Option -->
                    </select>
                </div>

                </label>

                <br>

                <div class="form-group">
                    <label class="col-lg-12 control-label" for="booth">Booth/Ward No:
                        <input type="text" placeholder="Booth or Ward number" id="booth" class="form-control" name="booth" >
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="religion">ಧರ್ಮ:
                        <input type="text" placeholder="ಧರ್ಮ" id="caste" class="form-control" name="religion">
                    </label>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-lg-12 control-label" for="caste">ಜಾತಿ:
                        <input type="text" placeholder="ಜಾತಿ" id="caste" class="form-control" name="caste">
                    </label>
                </div>
                <br>

                <div class="form-group">
                    <label class="col-lg-12 control-label" for="purpose">ಉದ್ದೇಶ:
                        <input type="textarea"  placeholder="ಉದ್ದೇಶ" id="purpose" class="form-control" name="purpose" style="width:50%;"  >
                    </label>
                </div>
                <br>  

                <div class="form-group">
                    <label class="col-lg-12 control-label" for="indication">Indication:
                        <select name="indication" >
                            <option value ="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="X">X</option>
                            <option value="Y">Y</option>
                            <option value="Z">Z</option>
                        </select>

                    </label>
                </div>
                <br>  

                <div class="form-group">
                    <label class="col-lg-12 control-label" for="status">ಈಗಿನ ಸ್ಥಿತಿ:
                        <input type="text" placeholder="ಸ್ಥಿತಿ" id="status" class="form-control" name="status">
                    </label>
                </div>
                <br>  
                <div class="form-group">
                    <label class="col-lg-12 control-label" for="depart">ಇಲಾಖೆ:
                        <input type="text" placeholder="ಇಲಾಖೆ" id="depart" class="form-control" name="depart">
                    </label>
                </div>
                <br>  
                <input type="hidden" value="<?php echo $username ?>" name="username"/>
                <div class="form-group">
                    <div class="col-lg-12">
                        <button class="btn btn-primary" type="submit" name="registersub">ನೋ೦ದಾಯಿಸಿ</button> 
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var village = ["ಕುಡಚಿ",
                "ಗುಂಡವಾಡ",
                "ಶಿರಗೂರ",
                "ಖೇಮಲಾಪೂರ",
                "ಸಿದ್ದಾಪೂರ",
                "ಪರಮಾನಂದವಾಡಿ",
                "ಯಲ್ಪಾರಟ್ಟಿ",
                "ಯಬರಟ್ಟಿ",
                "ಕೋಳಿಗುಡ್ಡ",
                "ಹಾರೂಗೇರಿ",
                "ಬಡಬ್ಯಾಕೂಡ",
                "ಅಲಖನೂರ",
                "ಸುಟ್ಟಟ್ಟಿ",
                "ನಿಲಜಿ",
                "ಮೊರಬ",
                "ಬೆಕ್ಕೇರಿ",
                "ನಿಡಗುಂದಿ",
                "ಅಳಗವಾಡಿ",
                "ಬಸ್ತವಾಡ",
                "ಖನದಾಳ",
                "ಇಟನಾಳ",
                "ಸವಸುದ್ದಿ",
                "ದೇವಾಪೂರಹಟ್ಟಿ",
                "ಕಟಕಬಾವಿ",
                "ಹಿಡಕಲ್",
                "ಮುಗಳಖೋಡ",
                "ಪಾಲಬಾಂವಿ",
                "ಸುಲ್ತಾನಪೂರ",
                "ಕಪ್ಪಲಗುದ್ದಿ",
                "ಹಂದಿಗುಂದ",
                "ಮರಾಕುಡಿ"];
            $("#village").select2({
                data: village
            });
        });
    </script>
</body>
</html>
