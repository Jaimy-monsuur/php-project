<?php
include __DIR__ . '/../header.php';
?>

<!DOCTYPE html>
<div class="background">
    <form class="login_form" method="POST" action="" name="Login">
        <div class="container py-4">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white">
                        <div class="card-body p-5 text-center">
                            <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                            <p class="text-white-50 mb-5">Please enter your login and password!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="email_address" name="email_address"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typeEmail">Email</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input type="password" id="password" name="password"
                                    class="form-control form-control-lg" />
                                <label class="form-label" for="typePassword">Password</label>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="/Forgot-password">Forgot
                                    password?</a></p>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit" value="Login">Login</button>

                            <div>
                                <p class="mb-0">Don't have an account? <a href="/Sign_up"
                                        class="text-white-50 fw-bold">Sign
                                        Up</a></p>
                            </div>
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