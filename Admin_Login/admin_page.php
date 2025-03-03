<?php
include "../SignUp/dbconnect.php";

$query = "SELECT * FROM user ";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if ($total != 0) {
?>

    <h2 align="center">Dislaying All Records</h2>
    <center>
    <table border="2" cellspacing=6 width="100%">
        <tr>
            <th width="5%">Sr_no.</th>
            <th width="10%">Name</th>
            <th width="20%">Email</th>
            <th width="35%">Password</th>
            <th width="20%">Date and Time</th>
            <th width="20%">Operations></th>
        </tr>

    <?php
    while ($result = mysqli_fetch_assoc($data)) {
        echo " <tr>
        <td>".$result['Sr_no']."</td>
        <td>".$result['Name']."</td>
        <td>".$result['Email']."</td>
        <td>".$result['Password']."</td>
        <td>".$result['Date']."</td>

       <td><a href='update.php?Sr_no=$result[Sr_no]&Name=$result[Name]&Email=$result[Email]&pass=$result[Password]'><input type='submit' value='update' class='update'></a>
 
 <a href='delete.php?Sr_no=$result[Sr_no]&Name=$result[Name]&Email=$result[Email]&pass=$result[Password]'><input type='submit' value='delete' class='delete'></a></td>
        </tr>";
    }
} else {
}

    ?>
    </table>
    </center>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display</title>
        <style>
            :root {
    --chinese-violet_30: hsla(304, 14%, 46%, 0.3);
    --chinese-violet: hsl(304, 14%, 46%);
    --sonic-silver: hsl(208, 7%, 46%);
    --old-rose_30: hsla(357, 37%, 62%, 0.3);
    --ghost-white: hsl(233, 33%, 95%);
    --light-pink: hsl(357, 93%, 84%);
    --light-gray: hsl(0, 0%, 80%);
    --old-rose: hsl(357, 37%, 62%);
    --seashell: hsl(20, 43%, 93%);
    --charcoal: hsl(203, 30%, 26%);
    --white: hsl(0, 0%, 100%);
}
            body{
                background-color: var(--seashell);
            }
            table{
                background-color:white;
            }
            h2{
                background-color:hsla(357, 37%, 62%, 0.3) ;
            }
            .update{
                background-color:hsl(357, 93%, 84%) ;
                color: black;
                border: 0;
                outline: none;
                border-radius: 5px;
                font-weight: bold;
                cursor: pointer;
            }
            .delete{
                background-color: hsl(304, 14%, 46%) ;
                color: white;
                border: 0;
                outline: none;
                border-radius: 5px;
                font-weight: bold;
                cursor: pointer;
            }
        </style>
    </head>

    <body>

    </body>

    </html>


   