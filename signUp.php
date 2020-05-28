<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>SignUp</title>
</head>
<body>
   
    <div style="border:1px solid black ;width:200px;margin:auto" align="center">
        <form  method="POST" id="mainForm" action="signUp.php">
            <?php include('errors.php');?>
        <p>
        <label>Name</label><br/>
        <input type="text" name="name" id="name"  placeholder="Firstname" required autofocus> 
        </p>
        <p>
            <label>Lastname</label><br/>
            <input type="text" name="lastname" id="lastname"  placeholder="Lastname" required autofocus> 
            </p>

        
        <p>
        <label>Email</label><br/>
        <input type="text" name="mail" id="mail" placeholder="ex@example.com" required>
        </p>      
        <p
            <label>Password:</label><br>
            <input type="password" id="pass1"  name="pass1" required>
        </p> 
        <p>
            <label>Password:</label><br>
            <input type="password" id ="pass2" name="pass2" required>
        </p>   
        <p>
            
                <input type="submit" value="Sign Up" name="add">
            
        </p>  
    </form>    
    </div>  
    
   
</body>
</html>