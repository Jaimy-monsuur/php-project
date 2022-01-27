<?php
include __DIR__ . '/../header.php';
?>

<!DOCTYPE html>
<div class="background">
    <!--later met css -->
    <form class="login_form" method="POST" action="" name="Login">
        <div class="container py-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white">
                        <div class="card-body p-5 text-center">
                            <h2 class="fw-bold mb-2 text-uppercase">Sign up</h2>
                            <p class="text-white-50 mb-5">Please enter your email and password!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="email_address" name="email_address"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmail">Email</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="email_address-2nd" name="email_address-2nd"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmail">Email repeat</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typePassword">Password</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password-2nd" name="password-2nd"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typePassword">Password repeat</label>
                            </div>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit" value="Sign_up">Sign up</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                if (!empty($_SESSION["error"])){
                    echo '<div class="container py-3">';
                    echo '<div class="row d-flex justify-content-center align-items-center h-100">';
                    echo '<div class="col-12 col-md-8 col-lg-6 col-xl-5">';
                    echo '<div class="alert alert-danger" role="alert text-danger">';
                    echo $_SESSION["error"];
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';  
                }         
            ?>
    </form>
</div>

</html>

<?php
include __DIR__ . '/../footer.php';
?>