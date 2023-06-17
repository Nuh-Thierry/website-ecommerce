<?php include('layouts/header.php'); ?>

<?php


include('server/connection.php');

// in case user is already registered then user is taken to account page
if(isset($_SESSION['logged_in'])){

    header('location: account.php');
    exit;

}

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    //in case passwords don't match
    if($password !== $confirmPassword){
        header('location: register.php?error=passwords dont match');
    

    //in case password len < 6
    }else if(strlen($password)<6){
        header('location: register.php?error=password must be at least 6 characters');
    
    //if no error exist
    }else{

        // checking if user exists with same email 
        $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
        $stmt1->bind_param('s',$email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        // checking if user exist with this email registered
        if($num_rows != 0){
            header('location: register.php?error=user with this email already exist');

            // in case no user exist with this email
        }else{

                //creating new user
                $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                            VALUES (?,?,?)");

                $stmt->bind_param('sss',$name,$email,md5($password));

                //if account is created successfully
                if($stmt->execute()){
                    $user_id = $stmt->insert_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;
                    
                    header('location: login.php?register_success=You registered successfully');

                //account could not be created
                }else{
                    header('location: register.php?error=could not create account');
                }

        }


    }

}

?>


      <!--Register-->
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-3">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto"/> 
        </div>
        <div class="mx-auto container">
            <form id="registration-form" method="POST" action="register.php">
                <p style="color:red"><?php if(isset($_GET['error'])){ echo  $_GET['error']; }?></p>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="name" required/>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="email" required/>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="password" required/>
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirmPassword" placeholder="confirmPassword" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register" />
                </div>
                <div class="form-group">
                    <a id="login-url" href="login.php" class="btn">Already have an account? Login</a>
                </div>
            </form>
        </div>
     </section> 

<?php include('layouts/footer.php'); ?>