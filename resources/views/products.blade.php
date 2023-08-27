<!-- resources/views/products/index.blade.php -->
@extends('layouts.layout')
<style>
    #enlargedImage {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index:2;
 
    }
</style>

@section('content')
<div class="hero-wrap" style="background-image: url({{ asset('images/bg_7.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
        <div class="col-md-7 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
           <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="#">Home</a></span> <span>Orphan</span></p>
          <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Oprhancare</h1>
        </div>
      </div>
    </div>
  </div>
<div class="container">
    <h2>Products</h2>
    <p>We are proud to present our products that embody the ingenuity and creativity of orphans who make creativity and perseverance their companions in their journey</p>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Orphan Name</th>
                <th>Action</th> <!-- Add a new column for the action -->
            </tr>
        </thead>
        <tbody>
            @if(session('success'))
            <div class="alert alert-warning">
                {{ session('success') }}
            </div>
            @endif
            @foreach($products as $product)
            <tr> 
                <td>
                    <img id="productImage{{ $product->id }}" src="{{ asset('images/' . $product->image) }}" alt="Product Image" width="100" onclick="enlargeImage({{ $product->id }})">
                </td>
                
             <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->orphan ? $product->orphan->name : 'N/A' }}</td>
                <td>
             <button type="submit" class="btn btn-primary">Add to Cart</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div id="enlargedImage">
    <img src="" alt="Enlarged Image" id="enlargedImg" onclick="closeEnlargedImage()">
</div>

<!-- Table to show cart details -->
<div class="table-responsive container table-warning" style="display: none;"  id="cartDetails">
    <h2>Cart Details</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="cartDetailsBody">
            <!-- Cart details will be dynamically added here -->
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td>Total:</td>
                <td id="totalCell"></td>
            </tr>
        </tfoot>
    </table>
    <div class="table-responsive" id="cartDetails">
        <form action="{{ route('checkout') }}" method="GET">
            @foreach($products as $product)
                @if(session()->has('selectedProductNames') && in_array($product->name, session('selectedProductNames')))
                    <input type="hidden" name="selected_product_names[]" value="{{ $product->name }}">
                @endif
            @endforeach
            <input type="hidden" name="total_price" value="{{ session('total_price', 0) }}">
            <input type="hidden" name="name_products" id="nameProductsInput">
            <button type="submit" class="btn btn-secondary" id="goToCheckoutBtn">Go To Checkout</button>
        </form>
    </div>
    
</div>
</div>
<br><br>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var addToCartButtons = document.querySelectorAll(".btn-primary");
    var cartDetails = document.getElementById("cartDetails");
    var cartDetailsBody = document.getElementById("cartDetailsBody");
    var checkoutForm = document.getElementById("checkoutForm");

    var addedProducts = {};
    var totalPrice = 0;
    var productNames = [];

    function updateTotalPrice() {
        var totalCell = document.getElementById("totalCell");
        totalCell.textContent = totalPrice.toFixed(2);
    }

    addToCartButtons.forEach(function (button) {
        button.addEventListener("click", function (event) {
            event.preventDefault();
            var row = event.target.closest("tr");
            var name = row.querySelector("td:nth-child(2)").textContent;
            var price = parseFloat(row.querySelector("td:nth-child(4)").textContent);
            var productKey = name + "_" + price;

            if (!addedProducts[productKey]) {
                var newRow = document.createElement("tr");
                newRow.innerHTML = `
                <td>
                    <img src="${row.querySelector("img").getAttribute("src")}" alt="Product Image" width="50">
                </td>
                    <td>${name}</td>
                    <td>${price.toFixed(2)}</td>
                `;
                cartDetailsBody.appendChild(newRow);

                totalPrice += price;
                addedProducts[productKey] = true;
                productNames.push(name);

                cartDetails.style.display = "block";
                updateTotalPrice();
                updateCheckoutForm(); // Update the form when adding a product
            }
        });
    });

    

    var goToCheckoutBtn = document.getElementById("goToCheckoutBtn");

goToCheckoutBtn.addEventListener("click", function (event) {
    event.preventDefault();
    var nameProductsInput = document.getElementById("nameProductsInput");
nameProductsInput.value = productNames.join(',');

var checkoutUrl = "{{ route('checkout', ['total_price' => 'totalPriceValue', 'name_products' => 'nameProductsValue']) }}";
console.log("Original checkoutUrl:", checkoutUrl);

checkoutUrl = checkoutUrl.replace('totalPriceValue', totalPrice.toString());
checkoutUrl = checkoutUrl.replace('nameProductsValue', nameProductsInput.value);

console.log("Updated checkoutUrl:", checkoutUrl);

window.location.href = checkoutUrl;

});
});
</script>

<script>
    function enlargeImage(productId) {
        var productImage = document.getElementById(`productImage${productId}`);
        var enlargedImage = document.getElementById('enlargedImage');

        enlargedImage.style.display = 'block';
        enlargedImage.querySelector('#enlargedImg').src = productImage.src;
    }

    function closeEnlargedImage() {
        var enlargedImage = document.getElementById('enlargedImage');
        enlargedImage.style.display = 'none';
    }
</script>
@endsection




