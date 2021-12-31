<?php include('partials/menu.php');?>

        <!---Main Content Section Starts-->
        <div class="main-content">
        <div class="wrapper">
                <h1>Manage Admin</h1>

                <br/><br/>

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //Removing Session Message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete']; //Displaying Session Message
                        unset($_SESSION['delete']); //Removing Session Message
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update']; //Displaying Session Message
                        unset($_SESSION['update']); //Removing Session Message
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found']; //Displaying Session Message
                        unset($_SESSION['user-not-found']); //Removing Session Message
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match']; //Displaying Session Message
                        unset($_SESSION['pwd-not-match']); //Removing Session Message
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd']; //Displaying Session Message
                        unset($_SESSION['change-pwd']); //Removing Session Message
                    }




                ?>

                <br/> <br/><br/>

                <!---Button to Add Admin-->
                <a href="add-admin.php" class="btn-primary">Add Admin</a>

                <br/> <br/> <br/>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        //query to get all admin
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);// check whether the query is executed of not

                        $sn=1; //create a variable and assign the value

                        if($res==TRUE)
                        {
                            //count rows tocheck whether we have data in database or not
                            $count = mysqli_num_rows($res); //function to get all the rows in database

                            //check the num of rows
                            if($count>0);
                            {
                                //we have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    // using while loop to get all the data from database
                                    //and while loop will run as long as we have data in database

                                    //get invidiual data
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    //display the values in our tables

                                    ?>

                                    <tr>
                                            <td><?php echo $sn++; ?>.</td>
                                            <td><?php echo $full_name;?></td>
                                            <td><?php echo $username;?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                            </td>
                                    </tr>



                                    <?php
                                }
                            

                            }
                                
                        }
                    ?>

                 
                </table>

           


            </div>
        </div>
        <!---Main Content Section Ends -->

 <?php include('partials/footer.php');?>