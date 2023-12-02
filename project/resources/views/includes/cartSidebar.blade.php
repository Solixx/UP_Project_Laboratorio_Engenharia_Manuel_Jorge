<div id="cartSidebar" class="cartSB">
    <a href="javascript:void(0)" class="cartClosebtn" onclick="closeCartNav()">×</a>
    <h1>Cart</h1>

    <hr>
    
    <div class="cartProds">
        @for ($i = 0; $i < 50; $i++)
            <div class="cartProdBox">
                <div class="cartProdImg">
                    <img src="https://via.placeholder.com/100" alt="Product Image">
                </div>
                <div class="cartProdTitleQuant">
                    <h3>Product Title</h3>
                    <div class="cartProdQuant">
                        <button>-</button>
                        <input type="text" value="1">
                        <button>+</button>
                    </div>
                </div>
                <div class="cartProdPriceDelete">
                    <p>€100.00</p>
                    <button><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                </div>
            </div>
        @endfor 
    </div>
    
    <div class="cartBottom">
        <div class="cartOrderInfo">
            <div class="cartOrderInfoBox">
                <p>Subtotal</p>
                <p>€200.00</p>
            </div>
            <div class="cartOrderInfoBox">
                <p>Shipping</p>
                <p>€0.00</p>
            </div>
            <div class="cartOrderInfoBox">
                <p>Total</p>
                <p>€200.00</p>
            </div>
        </div>
        <div class="cartBtn">
            <button>Checkout</button>
        </div>
    </div>
</div>