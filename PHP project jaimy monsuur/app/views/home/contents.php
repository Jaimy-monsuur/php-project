<!DOCTYPE html>
<html lang="en">
<div class="position-relative overflow-hidden p-3 p-md-5 mb-4 text-center text-white bgimg">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 fw-normal">Cheese shop</h1>
        <p class="lead fw-normal">The best place to get your cheese. </p>
        <p>Free delivery, Best services, Top quality</p>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>
<div class="container-xl">
        <?php
        require __DIR__ . '/../../api/controllers/Cheesecontroller.php';
        $api = new CheeseController();
        $Json_Cheeselist = json_decode($api->index());
        $i=0;
        echo '<div class="row ">';
            foreach($Json_Cheeselist as $cheese)
            {
                $itemname = $cheese->name;
                    $itemprice = $cheese->price;
                    $itemdescription = $cheese->description;
                    echo '<div class="col-lg-3 d-flex align-items-stretch mb-4">';
                        echo '<div class="card ">';
                            echo '<img class="card-img-top img-responsive" src="http://localhost:81//Resources/img/' . $itemname . '.jpg" alt="..." />';
                            echo '<div class="card-body p-4">';
                                echo '<div class="text-center">';
                                    echo '<h5 class="fw-bolder">'. $itemname . '</h5>';
                                    echo "<p>$itemdescription</p>";
                                    echo '<h5 class="fw-bolder"> $'. $itemprice . '</h5>';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                                echo '<div class="text-center"><a class="btn btn-outline-dark mt-auto" ' . "onclick=\"addItemToCart('$itemname',$itemprice,1)\"" . '>Add to cart</a></div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                $i = $i + 1;
                if($i % 4 == 0)
                {
                    echo '</div>';
                    echo '<div class="row">';
                    
                }
            } 
        echo '</div>';
        ?>
</div>