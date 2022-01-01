<?php
include __DIR__ . '/../header.php';
?>

<!DOCTYPE html>
<body>      
    <div class="background"><!--later met css -->
        <form class="login_form" method="POST" action="#" name="login">
            <h1>Login</h1><br><br>                 
                <?php
                    //Later toevoegen
                    //require_once ('../');

                    // probeer in te loggen
                    if(isset($_POST['Login']))
                    {      
    
                        $email_address=$mysqli->escape_string($_POST['email_address']);
                        $password=$mysqli->escape_string($_POST['password']);  
                        $LoginController = new LoginController($email_address,$password); 
                        //toon error
                        $error=$LoginController->Login($email_address,$password);    
                    }
                ?>                            
            <div class="imgcontainer">
                <img src="avatar.png" alt="Avatar" class="avatar">
                </div>
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" id="email_address" name="email_address" placeholder="Email" >

                <label for="psw"><b>Password</b></label>
                <input type="password" id="password" name="password" placeholder="Password">
                    
                <input type="submit" name="Login" value="Login">
                <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
        </form>
    </div> 
</body>
</html>

<?php
include __DIR__ . '/../footer.php';
?>
