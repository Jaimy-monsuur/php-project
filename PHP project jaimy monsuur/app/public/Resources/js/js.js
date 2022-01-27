window.onload = function() {
    cart = [];
    loadCart();
    updatePage();
}
function updatePage(){
    if(document.getElementById("shopping"))
    {
        displayCart();
        displayTotalItems();
        displayTotalPrice();
    }
}

class Item {
    constructor(name, price, count){
        this.name = name;
        this.price = price;
        this.count = count;
    }
}

// Save cart
function saveCart() {
    window.localStorage.setItem('shoppingCart', JSON.stringify(cart));
}

  // Load cart
function loadCart() {
    if (window.localStorage.getItem("shoppingCart") != null) {
        cart = JSON.parse(window.localStorage.getItem('shoppingCart'));
    }
}

// Add to cart
function addItemToCart(name, price, count){
  var bool = false;
  for(var item in cart) {
    if(cart[item].name === name) {
      cart[item].count ++;
      console.log("count ++");
      saveCart();
      bool = true;
      break;
    }
  }
  if(!bool)
  {
    var item = new Item(name, price, count);
    console.log("added new");
    cart.push(item);
    saveCart();
  }
}

// Remove one item from cart
function removeOneItemFromCart(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count --;
        if(cart[item].count === 0) {
          cart.splice(item, 1);
        }
        break;
      }
  }
  saveCart();
  updatePage();
}

// Add one item from cart
function addOneItemFromCart(name) {
    for(var item in cart) {
      if(cart[item].name === name) {
        cart[item].count ++;
        break;
      }
  }
  saveCart();
  updatePage();
}

// Remove all items from  the cart
function removeAllItemFromCart(name) {
  for(var item in cart) {
    if(cart[item].name === name) {
      cart.splice(item, 1);
      break;
    }
  }
  saveCart();
  updatePage();
}

// Clear cart
function clearCart() {
  cart = [];
  saveCart();
  displayCart();
}

function displayCart() {
    var output = "";
    if(cart.length != 0){
        cart.forEach(element => {
            var x1 = element.price; 
            var y1 = element.count;
            var total = (x1 * y1);
            output += '<!-- Single item -->'+
            '            <div class="row show-cart border-bottom py-4">'+
            '              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">'+
            '                <!-- Image -->'+
            '                <div class="bg-image " data-mdb-ripple-color="light">'+
            '                  <img src="http://localhost:81//Resources/img/' + element.name + '.jpg"'+
            '                    class="w-100" />'+
            '                  <a href="#!">'+
            '                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>'+
            '                  </a>'+
            '                </div>'+
            '                <!-- Image -->'+
            '              </div>'+
            ''+
            '              <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">'+
            '                <!-- Data -->'+
            '                <p><strong>'+ element.name +'</strong></p>'+
            '                <p>Color: red</p>'+
            '                <p>Size: M</p>'+
            ''+
            '                <!-- Data -->'+
            '              </div>'+
            ''+
            '              <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">'+
            '                <!-- Quantity -->'+
            '                <div class=" mb-4" style="max-width: 300px">'+
            '                  <div class="form-outline">'+
            '                       <td><div class="input-group"><button class=" input-group-addon btn btn-primary" onclick="removeOneItemFromCart(\'' + element.name + '\')">-</button>'+
            '                       <label type="number" class=" form-control">'+ element.count+'</label>'+
            '                       <button class=" btn btn-primary input-group-addon" onclick="addOneItemFromCart(\'' + element.name + '\')">+</button></div></td>'+
            '                    <label class="form-label" for="form1">Quantity</label>'+
            '                  </div>'+
            '                </div>'+
            '                <!-- Quantity -->'+
            ''+
            '                <!-- Price -->'+
            '                <p class="text-start text-md-center">'+
            '                  <strong> Price: $ '+ total  +'</strong>'+
            '                </p>'+
            '                <!-- Price -->'+
            '              <div class="input-group float-right"><button class=" btn btn-danger" onclick="removeAllItemFromCart(\'' + element.name + '\')">X</button></div>'+
            '              </div>'+
            '            </div>'+
            '            <!-- Single item -->'; 
        });
    }
        document.getElementById("shopping").innerHTML = output;
}
function displayTotalItems()
{
    var total = 0;
    if(cart.length != 0){
        cart.forEach(element => {
            total += element.count;
        });
    }
    var output = '<p >Cart - '+ total + ' items</p>'
    document.getElementById("Total_items").innerHTML = output;
}
function displayTotalPrice()
{
    var total = 0;
    if(cart.length != 0){
        cart.forEach(element => {
            total += element.price * element.count;
        });
        var output = '<strong> $ ' + total + '</strong>'
    }
    else{
        var output = "";
    }
    document.getElementById("total_price").innerHTML = output;
}


