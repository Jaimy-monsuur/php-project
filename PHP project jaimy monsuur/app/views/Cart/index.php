<?php
include __DIR__ . '/../header.php';
?>

<!DOCTYPE html>
<section class="h-100 gradient-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center my-4">
      <div class="col-md-8">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0" id="Total_items"></h5>
          </div>
          <div id="shopping" class="card-body shopping"> 
          </div>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            <p><strong>Expected shipping delivery</strong></p>
            <p class="mb-0"> 
                <?php $date = strtotime("+7 day");
                  echo date("d-m-Y",$date);?>
              </p>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body">
            <p><strong>We accept</strong></p>
            <img class="me-2" width="100px"
              src="http://localhost:81//Resources/img/Visa.png"
              alt="Visa" />
            <img class="me-2" width="100px"
              src="http://localhost:81//Resources/img/American-Express.png"
              alt="American Express" />
            <img class="me-2" width="100px"
              src="http://localhost:81//Resources/img/MasterCard.png"
              alt="Mastercard" />
            <img class="me-2" width="100px"
              src="http://localhost:81//Resources/img/paypal.jpg"
              alt="PayPal" />
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0">Summary</h5>
          </div>
          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>Free</span>
              </li>
              <li
                class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Total amount</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span id="total_price"></span>
              </li>
            </ul>

            <button onClick="checkOut(<?php echo $_SESSION['Logged_in']?>)" type="button" class="btn btn-primary btn-lg btn-block">
              Go to checkout
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</html>

<?php
include __DIR__ . '/../footer.php';
?>