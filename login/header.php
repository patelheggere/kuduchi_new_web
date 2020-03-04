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
        include("../config/config.php");
        date_default_timezone_set('Asia/Kolkata'); 
        ?>
        <table width="100%" border = "1" align="center" >

            <tr>
                <td align ="center">
                    <div>
                        <a href="../login/welcome.php"><h4>Register</h4></a>     
                    </div>

                </td>
                <td align ="center">
                    <div>
                        <a href="../login/Edit.php"><h5>Edit</h5></a>     
                    </div>

                </td>
                <td align ="center">
                    <div>
                        <a href="../login/view.php"><h5>View</h5></a>     
                    </div>

                </td>
                <td align ="center">
                    <div>
                        <a href="../login/Search.php"><h5>Search</h5></a>     
                    </div>

                </td>
                </div>  
            </tr>

        </table>   
    </body>
</html>
