<?php

        //include constants for siteurl
        include('../config/constants.php');
        //1. Destroy the session

        session_destroy(); // unsets $_SESSION 

        //2. Redirect to login page
        header('location:' .SITEURL. 'admin/login.php');

?>