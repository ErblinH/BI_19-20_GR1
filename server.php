 <?php
    session_start();
    $errors = array();
     $servername="localhost";
		$username="root";
		$password="";
    $dbname = "projekti";
    $_SESSION['username'] = "";
    
      echo "a";
    if(isset($_POST['add'])){
      
   


        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
            $user=$_POST['name'];
            $lastname=$_POST['lastname'];
            $email=$_POST['mail'];
            $password1=$_POST['pass1'];
            $password2=$_POST['pass2'];
            
        if (empty($user)){array_push($errors,"Username is required");}  
        if (empty($lastname)){array_push($errors,"Lastname is required");}
        if (empty($email)){array_push($errors,"Email is required");}
        if (empty($password1)){array_push($errors,"Password is required");}
        if (empty($password2)){array_push($errors,"Password confirmation is required");} 
        if ($password1 != $password2){
            //$password1 = md5($password1); 
            array_push($errors, "The two passwords do not match");}
            if(!valid_pass($password1)){

              array_push($errors, "Weak Password");
          }
          if(!valid_name($user)){
              array_push($errors, "Only letters and whitespace allowed for Name field");
          }
          if(!validate_email($email)){
              array_push($errors, "Email address not valid");
          }
        $user_check = "SELECT * FROM shfrytezuesit where user='$user' or email='$email' LIMIT 1";
        $result = mysqli_query($conn,$user_check);
        $res = mysqli_fetch_assoc($result);
        if($res){
            if($res['user'] === $username){
            array_push($errors, "Username already exists");
            }
            if($res['email'] === $email){
            array_push($errors, "Email already used");
            }
        }
        if (count($errors) == 0){
           // $password = md5($password1);
            $query = "Insert into shfrytezuesit(user,lastname,email,password) values('$user','$lastname','$email','$password1')";
            $retval=mysqli_query($conn,$query);
                    if(! $retval)
                    {
                      die('Cannot regist user'.mysqli_connect_error());
                    }
            $_SESSION['username'] = $user;
            $_SESSION['success']="true";
            header('location: index.html');
        }
        mysqli_close($conn);
    }
            /* $sql="Insert into shfrytezuesit(user,lastname,email,password) values('$user','$lastname','$email','$password1')";
                $retval=mysqli_query($conn,$sql);
                    if(! $retval)
                    {

                      die('Nuk mund te shtohet artikulli'.mysqli_connect_error());
                    }
                  
            $_SESSION['message'] = "Now you're logged in";   
            $_SESSION['username'] = $user;
            header("location: index.html");
        }
        else{
            $_SESSION['message'] = "The two passwords do not match";
        }    */
 
    
// LOGIN USER
        if (isset($_POST['login_user'])) {
            $conn = new mysqli($servername, $username, $password, $dbname);
          $username = mysqli_real_escape_string($conn, $_POST['name']);
          $password = mysqli_real_escape_string($conn, $_POST['pass1']);

          if (empty($username)) {
            array_push($errors, "Username is required");
          }
          if (empty($password)) {
            array_push($errors, "Password is required");
          }

          if (count($errors) == 0) {
          //  $password = md5($password);
            $query = "SELECT * FROM shfrytezuesit WHERE user='$username' AND password='$password'";
            $results = mysqli_query($conn, $query);
            if (mysqli_num_rows($results) == 1) {
              $_SESSION['username'] = $username;
              $_SESSION['success'] = "true";
              header('location: index.html');
            }else {
                array_push($errors, "Wrong username/password combination");
            }
          }mysqli_close($conn);
        } function valid_pass($candidate) {
          $r1='/[A-Z]/';  //Uppercase
          $r2='/[a-z]/';  //lowercase
          $r3='/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
          $r4='/[0-9]/';  //numbers

          if(preg_match_all($r1,$candidate, $o)<1) return FALSE;

          if(preg_match_all($r2,$candidate, $o)<1) return FALSE;

          if(preg_match_all($r3,$candidate, $o)<1) return FALSE;

          if(preg_match_all($r4,$candidate, $o)<1) return FALSE;

          if(strlen($candidate)<8) return FALSE;

          return TRUE;
       }
   function valid_name($arg){
      
       if (!preg_match("/^[a-zA-Z ]*$/",$arg)) {
       return false;
       }
       return true;
   }
   function validate_email($arg2){
   if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $arg2)){
       return false;
   }
   return true;}

?>