<?php 
session_start();
include '../db.php';
$email = "";
$name = "";


/**if user signup button
if(isset($_POST['signup'])){
    $name = htmlspecialchars($bdd, $_POST['name']);
    $email = htmlspecialchars($bdd, $_POST['email']);
    $password = htmlspecialchars($bdd, $_POST['password']);
    $cpassword = htmlspecialchars($bdd, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "bddfirm password not matched!";
    }
    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($bdd, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($bdd, $insert_data);
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: shahiprem7890@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}*/
    //if user click verification code submit button
/**if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = htmlspecialchars($bdd, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($bdd, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($bdd, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
if(isset($_POST['login'])){
        $email = htmlspecialchars($bdd, $_POST['email']);
        $password = htmlspecialchars($bdd, $_POST['password']);
        $check_email = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($bdd, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    header('location: home.php');
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click bddtinue button in forgot password form
*/

if(isset($_POST['check-email']))
{
    //recuperation des données
    $email = htmlspecialchars($_POST['email']);

    //selection de la table users pour verifier s'il exiteun user avec le mail
    
    $check_email = $bdd->prepare('SELECT * FROM users WHERE email = ?');
    $check_email->execute(array($email));
    $data = $check_email->fetch();
    $row = $check_email->rowCount();

    if($row > 0)
    {
        // On créer la session et on redirige sur landing.php
        $_SESSION['email'] = $email;
        header('location: ../new-password.php');
        die();
    }else{ header('location: ../forgot-password.php?forg_err=email');}
}

    //if user click check reset otp button
/**if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = htmlspecialchars($bdd, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($bdd, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
*/
if(isset($_POST['change-password'])){
        
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);

        if($password !== $cpassword){
            header('Location: ../new-password.php?newp_err=password'); die();
        }else{
           
            $email = $_SESSION['email']; //getting this email using session
            // On hash le mot de passe avec Bcrypt, via un coût de 12
            $cost = ['cost' => 12];
            $password = password_hash($password, PASSWORD_BCRYPT, $cost);

            //update  password
            //$update_pass = "UPDATE users SET pass = '$password' WHERE email = '$email'";
            //$run_query = mysqli_query($update_pass);

            $update_pass = $bdd->prepare('UPDATE users SET pass = ? WHERE email = ?');
            $update_pass->execute(array($password,$email));
            $data = $update_pass->fetch();
            $row = $update_pass->rowCount();

            if($update_pass){
                
                $_SESSION['username'] = $email;
                //redirection sur la page login pour se connecter
                header('Location: ../GGRE-connect-ADMIN.php?login_err=success');
                die();

            }else{header('Location: ../new-password.php?newp_err=failed'); die();}
        }
    }
?>