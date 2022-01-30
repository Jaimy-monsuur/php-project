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
    if(document.getElementById("orders"))
    {
      //for the profile page
      fetchOrders();
    }
}

class Item {
    constructor(name, price, count){
        this.name = name;
        this.price = price;
        this.count = count;
    }
}
class Order {
  constructor(id, account, cart, date){
      this.id = id;
      this.account = account;
      this.cart = Object.assign(new Item, cart)
      this.date = date;

   }
}

function checkOut(bool){
  if(bool == true && cart.length > 0){
    try{
      (async () => {
        await fetch('/api/Order', {
          method: 'POST',
          headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(cart)
        });    
      })();
      clearCart();
      window.location.href = "/Profile";
    }
    catch(e){
      console.log(e);
    }
  }
  else{
    window.location.href = "/Login";
  }
}
async function fetchOrders() {
  try{
    let response = await fetch('/api/Order', {
      method: 'GET',
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    });    
  
    if (response.status === 200) {
        let result = await response.text();
        let data = JSON.parse(result);
        orders = [];
        for (var element of data){
          orders.push(Object.assign(new Order, element));
        }

        displayOrders(orders);
        displayTotalOrders(orders);
    }
  }
  catch(e){
    console.log(e);
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
      saveCart();
      bool = true;
      break;
    }
  }
  if(!bool)
  {
    var item = new Item(name, price, count);
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
  updatePage();
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
            '                <div >'+
            '                  <img src="https://the-cheese-shop.herokuapp.com//Resources/img/' + element.name + '.jpg"'+
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

//for the profile page

function displayOrders(orders) {
  var output = "";
  if(orders.length != 0){
    for (const i in orders){
      var items = [];
      var items = [];
      var JSONstring = JSON.stringify(orders[i].cart);
      var x = JSON.parse(JSONstring);
      output += '<div class="m-2" id="accordion row' + i + '">'+
        '                            <div class="card">'+
        '                                <div class="card-header">'+
        '                                    <a class="btn" data-bs-toggle="collapse" href="#collapse' + i + '">'+
        '                                      Date:  '+ orders[i].date +' '+
        '                                    </a>'+
        '                                </div>';
      for (const j in x) {;
        items.push(x[j]);
          
        output += '                       <div id="collapse' + i + '" class=" border-bottom collapse hide" data-bs-parent="#accordion' + i + '">'+
        '                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 m-2">'+
        '                                       <img  src="https://the-cheese-shop.herokuapp.com//Resources/img/' + items[j].name + '.jpg"'+
        '                                         class="w-100" />'+
        '                                       <a href="">'+
        '                                          <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>'+
        '                                       </a>'+            
        '                                    </div>'+
        '                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 m-2">'+
        '                                        <p><strong> Item: '+ items[j].name +'</strong></p>'+
        '                                        <p> Price: '+ items[j].price +'</p>'+
        '                                        <p> Amount: '+ items[j].count +'</p>'+
        '                                    </div>'+
        '                                </div>';	
      }
      output +=   '                            </div>'+
                  '                          </div>'+
                  '                        </div>';
    }
    document.getElementById("orders").innerHTML = output;
  }
}

function displayTotalOrders(Orders)
{
    var total = 0;
    if(Orders.length != 0){
      Orders.forEach(element => {
            total += 1;
        });
    }
    var output = '<p >History - '+ total + ' orders</p>'
    document.getElementById("Number_orders").innerHTML = output;
}