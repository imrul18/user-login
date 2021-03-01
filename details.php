<!DOCTYPE html>
<html>
    <head>
        <title>Registration Form</title>
    </head>
    <body>

    
    <?php
 
        session_start();
        $var = $_SESSION['user'];
        unset($_SESSION['user']); 



        $log_file = fopen("Registration.txt", "r");
        
        $data = fread($log_file, filesize("Registration.txt"));

        $data_filter = explode("\n", $data);
        
        for($i = 0; $i< count($data_filter)-1; $i++) {
            $temp = $data_filter[$i];
            $log_data_filter = explode(",",$temp);

            $temp_user = $log_data_filter[4];

            if($temp_user == $var) 
            {
                $firstnameerr = $log_data_filter[0];
                $lastnameerr = $log_data_filter[1];
                $gendererr = $log_data_filter[2];
                $emailerr = $log_data_filter[3];
            }

        }
        fclose($log_file);

?>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                    header('Location: registration.php');
                }
        ?>
        

            <fieldset>
                <legend><b>Basic Information:</b></legend>
            
                <label for="firstname">First Name:</label>
                <?php echo $firstnameerr; ?>

                <br>

                <label for="lastname"> LastName:</label>
                <?php echo $lastnameerr; ?>

                <br>

                <label for="gender">Gender:  </label>
                <?php echo $gendererr; ?>

                <br>

                <label for="email">Email:</label>
                <?php echo $emailerr; ?>

            </fieldset>

        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
            <input type="submit" value="Logout">
        </form>
        
    </body>
</html>


