
/*
    *  count_cart_items() - Fetches the current number of items in the cart from the server and updates the cart icon/count in the header
    *  getAllCartItems() - Fetches all items in the cart and renders them in the cart dropdown
    *  itemQtyHandlers() - Attaches change event listeners to quantity input fields for updating cart quantities
    *  removeFromCart(productId, quantity) - Sends a request to remove a specified quantity of a product from the cart
    *  add2Cart(productId, quantity) - Sends a request to add a specified quantity of a product to the cart
*/

/*count_cart_items() is called on page load to initialize the cart item count in the header. 
    It sends a POST request to the cart API with the action 'count_items' and updates the 
    cart icon and count based on the response. If there is an error, it logs it and sets the count to 0.
    */ 
    async function count_cart_items() {
        const itemsCounter = document.querySelector(".cart-items-count");
        const cartIcon = document.querySelector(".cart-icon");

       try {
        const res = await fetch(window.location.href, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    action: 'count_cart_items'
                })
                })
                if (!res.ok) throw new Error('Request failed');

                const itemCount = await res.json();
                itemsCounter.textContent = itemCount;
                cartIcon.classList.toggle("has-items", itemCount > 0);
    } catch (err) {
        console.error(err);
        document.querySelector(".cart-items-count").textContent = 0;
    }
    }

/*getAllCartItems() is called on page load to fetch and render all items in the cart dropdown.
    It sends a POST request to the cart API with the action 'get_cart_items' and updates the 
    cart content based on the response. If the cart is empty, it shows a message. 
    If there are items, it renders them with their details and attaches quantity change handlers.
    */
    async function getAllCartItems() {
    const cartContent = document.getElementById('cart-content');
    if (!cartContent) return;

    try {
        const res = await fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action: 'get_cart_items'
            })
        });

        if (!res.ok) throw new Error('Request failed');

        const data = await res.json();

        if (!data || data.length === 0) {
            cartContent.innerHTML = `<p class="cart-empty">Your cart is empty.</p>`;
            return;
        }

        let html = `<div class="cart-items">`;
        let total = 0;

        data.items.forEach(item => {
            const subtotal = item.price * item.quantity;
            total += subtotal;

            html += `
                <div class="cart-item">
                    <div class="cart-item-info">
                        <img src="${item.image_url}" alt="${item.title}" class="cart-item-image" />
                        <span class="cart-item-name">${item.title}</span>
                        <input 
                            type="number"
                            min="1"
                            value="${item.quantity}"
                            class="cart-item-qty-input"
                            data-product-id="${item.product_id}"
                            data-prev-qty="${item.quantity}"
                        />
                    </div>
                    <div class="cart-item-price">€${subtotal.toFixed(2)}</div>
                    <a href="#" class="cart-remove" data-product-id="${item.product_id}">✕</a>
                </div>
            `;
        });

        html += `
            </div>
            <div class="cart-summary">
                <span>Total</span>
                <span class="cart-total">€${total.toFixed(2)}</span>
            </div>
            <div class="cart-actions">
                <a href="/checkout.php" class="cart-checkout-btn">
                    Proceed to Checkout
                </a>
            </div>
        `;

        cartContent.innerHTML = html;
        itemQtyHandlers();

    } catch (err) {
        console.error(err);
        cartContent.innerHTML = `<p class="cart-empty">Failed to load cart.</p>`;
    }
    }

/*itemQtyHandlers() attaches change event listeners to quantity input fields in the cart.
    When the quantity changes, it calculates the difference and calls add2Cart or removeFromCart accordingly.
    It then refreshes the cart UI to reflect the changes.
    */
    function itemQtyHandlers() {
    
        document.querySelectorAll('.cart-item-qty-input').forEach(input => {
        input.addEventListener('change', async e => {
            const newQty = parseInt(e.target.value, 10);
            const prevQty = parseInt(e.target.dataset.prevQty, 10);
            const productId = e.target.dataset.productId;

            if (newQty === prevQty || newQty < 1) return;

            const diff = Math.abs(newQty - prevQty);

            if (newQty > prevQty) {
                await increaseItemQty(productId, diff);
                e.target.dataset.prevQty = newQty;
                getAllCartItems();
            } else {
                await reduceItemQty(productId, diff);
                e.target.dataset.prevQty = newQty;
                getAllCartItems();
            }
        });
        });
    }

// Sends API request to increase quantity of certain product in cart
    async function increaseItemQty(productId, quantity = 1) {
    try {
        const res = await fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action: 'add_to_cart',
                product_id: productId,
                quantity: quantity
            })
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error(data.message || 'Failed to add product');
        }

        count_cart_items();

        return true;
    } catch (err) {
        console.error('Error adding product to cart:', err);
        return false;
    }
    }
// Sends API request to reduce quantity of certain product in cart
    async function reduceItemQty(productId, quantity = 1) {
    try {
        const res = await fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action: 'reduce_item_qty',
                product_id: productId,
                quantity: quantity
            })
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error(data.message || 'Failed to add product');
        }

        count_cart_items();
        getAllCartItems();

        return true;
    } catch (err) {
        console.error('Error adding product to cart:', err);
        return false;
    }
    }

/*removeFromCart(productId, quantity) sends a POST request to the cart API to remove a specified quantity of a product from the cart.
    It updates the cart item count and refreshes the cart items in the UI after a successful response. 
    If there is an error, it logs it to the console.
    */
    async function removeFromCart(productId, quantity = 1) {
    try {
        const res = await fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
                action: 'remove_from_cart',
                product_id: productId,
                quantity: quantity
            })
        });

        const data = await res.json();

        if (!data.success) {
            throw new Error(data.message || 'Failed to remove item');
        }

        count_cart_items();
        getAllCartItems();

    } catch (err) {
        console.error('Remove from cart failed:', err);
    }
    }

/* .add-to-cart-btn button handler 
    *  Adds product to cart_api via AJAX when button is clicked
    *  data-product-id attribute is required on the button
    *  cart_id which is first argument of Cart Model 'addToCart' method is retrieved from session in cart_api.php
    */
    async function add2Cart() {
    const buttons = document.querySelectorAll('.add-to-cart-btn');

    buttons.forEach(btn => {
        btn.addEventListener('click', async () => {
            const productId =  btn.dataset.productId;

            try {
                const response = await fetch(window.location.href, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({
                    action: 'add_to_cart',
                    product_id: productId
            })
                });

                const result = await response.json();
                console.log(result);

                if (result.success) {
                    count_cart_items();
                } else {
                    alert(result.message || 'Failed to add product');
                }
            } catch (err) {
                console.error(err);
                alert('Error adding product to cart');
            }
        });
    });
    };


/* Initializes the cart item count in the header when the page loads the cart_handler.js file.
    It calls count_cart_items() to fetch the current number of items in the cart and update the UI accordingly.
*/
if (window.location.href.includes("page=cart")) {
document.addEventListener('DOMContentLoaded', getAllCartItems );
document.addEventListener('click', e => {
    if (!e.target.classList.contains('cart-remove')) return;

    e.preventDefault();
    const productId = e.target.dataset.productId;
    removeFromCart(productId);
    });
}

document.addEventListener('DOMContentLoaded', count_cart_items );
document.addEventListener('DOMContentLoaded', add2Cart );




