<?php include "db.php";?>
<?php
     // Register a New User to Our Platform
    //$message ="";
    function createUser(){
           global $conn;          
            if (isset($_POST['register'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email    = $_POST['email'];
                $phone    = $_POST['phone'];
                $address  = $_POST['address'];

                $username = mysqli_real_escape_string($conn, $username);
                $password = mysqli_real_escape_string($conn, $password);
                $email    = mysqli_real_escape_string($conn, $email);
                $phone    = mysqli_real_escape_string($conn, $phone);
                $address  = mysqli_real_escape_string($conn, $address);
                //Encrypted Password
                $hassedPass = sha1($password);

                $query = "INSERT INTO users (user_name,password, user_email, user_phone,      	user_address) VALUES ('$username', '$hassedPass', ' $email', '$phone','$address')";
                $create_new_user = mysqli_query($conn, $query);

                if (!$create_new_user){
                    die("Query Failed!" . mysqli_error($conn));
                }
               
                else{
                    //$message = '<div class="alert alert-success" >Congratulations! New User Register Successfully.</div>';
                    header("Location:all-users.php");
                }
            }   
    }

    //Delete User Info from the All Users Table
    function deleteUser(){
         global $conn;
         if(isset($_GET['delete'])){
            $the_user_id = $_GET['delete'];
            $query = "DELETE FROM users WHERE user_id = $the_user_id";
            $delete_user = mysqli_query($conn, $query);
            header ("Location: all-users.php");
        }
    
    }
    //To update the user info into the user database.
   
 
 ?>    