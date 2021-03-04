<?php
namespace Basic\Controllers;

use Basic\Models\UserModel as UserModel;
use Basic\Models\PostModel as PostModel;

class UserController
{
     public function login()
     {
          loadview("Login/login.php");
     }

     public function register()
     {

          if (isset($_POST['username'])) {
               loadView("Login/welcome.php");
          } else {
               $_SESSION["errors"] = array("Your username or email has been used.");
               loadview("Login/register.php");
          }
     }

     public function logout()
     {
          session_unset();
          session_destroy();
          loadview("Login/login.php");
     }


     public static function handleLogin()
     {
          session_unset();
          $usernameOrEmail = $_POST['usernameOrEmail'];
          $password        = $_POST['password'];
          $result = UserModel::handleLogin($usernameOrEmail, $password);
          if (count($result) > 0) {
               $_SESSION['id'] = $result[0]['id'];
               $_SESSION["usernameOrEmail"] = $usernameOrEmail;
               loadView("Login/welcome.php");
          } else {
               $_SESSION["errors"] = array("Your username or password was incorrect.");
               loadView("Login/login.php");
          }
     }

     public function handleRegister()
     {
          session_unset();
          $username = $_POST['username'];
          $email    = $_POST['email'];
          $address  = $_POST['address'];
          $password = $_POST['password'];
          if (UserModel::isUserExists($email) !== false) {
               $_SESSION["errors"] = array("Your username or email has been used.");
               loadView("Login/register.php");
          } else {
               UserModel::createUserAccount($username, $email, $address, $_POST['password']);
               UserModel::handleLogin($username, $password);
               $_SESSION["usernameOrEmail"] = $username;
               loadView("Login/welcome.php");
          }
     }

     public function handlePost()
     {
          PostModel::createPost($_POST['postTitle'], $_POST['postContent'], ($_FILES['my_file']['name']), $_POST['id']);
     }
}
