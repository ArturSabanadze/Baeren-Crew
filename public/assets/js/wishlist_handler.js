document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("wishlist-container");
    if (!container) return;

    let items = [];

    fetch(window.location.href,  {
        method: "POST",
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            action: "get_user_wishlist"
        })
    })
    .then(res => {
        if (!res.ok) {
            throw new Error("Network response was not ok");
        }
        return res.json();
    })
    .then(fetchedItems => {
        console.log("Wishlist items:", fetchedItems);
        // Defensive check
        if (!Array.isArray(fetchedItems) || fetchedItems.length === 0) {
            container.innerHTML = "<p>Your wishlist is empty.</p>";
            return;
        }

        const html = `
            <div class="wishlist-grid"> 
                ${fetchedItems.map(item => `
                    <div class="wishlist-item" data-product-id="${item.product_id}">
                        <img
                            src="${item.image_url || '/uploads/products/default.jpg'}"
                            alt="${item.title}"
                            class="wishlist-thumb"
                        >

                        <div class="wishlist-info">
                            <div class="wishlist-title"><h4>${item.title}</h4></div>
                            <div class="wishlist-price"><p>${item.price} ${item.currency}</p></div>
                        </div>

                        <div class="wishlist-actions">
                            <button
                                class="btn-primary add-to-cart-btn"
                                data-product-id="${item.product_id}">
                                Add to cart
                            </button>
                            <div class="add-to-wishlist-container" data-product-id="${item.product_id}">
                            </div>
                        </div>
                    </div>
                `).join("")}
            </div>
        `;
                     
        container.innerHTML = html;
        checkWishlistStatus();
        add2wishlist();
    })
    .catch(err => {
        console.error("Wishlist load failed:", err);
        container.innerHTML =
            "<p>Failed to load wishlist. Please try again later.</p>";
    });
});

async function add2wishlist() {
    const buttons = document.querySelectorAll('.add-to-wishlist-container');

    buttons.forEach(btn => {
        btn.addEventListener('click', async () => {
            const productId =  btn.dataset.productId;

            try {
                const response = await fetch(window.location.href, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({
                    action: 'add_to_wishlist',
                    product_id: productId
                    })
                });

                const result = await response.json();
                console.log(result);

                if (result.success) {
                    if (btn.classList.contains("active")) {
                        btn.classList.remove("active");
                    } else {
                   btn.classList.add("active");
                    }
                } else {
                    btn.classList.remove("active");
                }
            } catch (err) {
                console.error(err);
                alert('Error adding product to wishlist');
                
            }
        });
    });
};

async function checkWishlistStatus() {
  const buttons = document.querySelectorAll('.add-to-wishlist-container');
  if (buttons.length < 1) 
    return;

  try {
        const response = await fetch(window.location.href, {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: new URLSearchParams({
            action: 'get_wishlist_product_ids'
            })
        });
        const result = await response.json();
        
        if (result.success) {
            usersWishlistIDs = result.product_ids || [];
            console.log("User's wishlist product IDs:", usersWishlistIDs);
            buttons.forEach(btn => {
            const productId = parseInt(btn.dataset.productId, 10);  

            if (usersWishlistIDs.includes(productId)) {
                 btn.classList.add("active");
            } else {
                 btn.classList.remove("active");
             }    
        });
    }
        else {            
            alert(result.message || 'Failed to fetch wishlist status');
        }
    } catch (err) {
        console.error(err);
        alert('Error checking wishlist status');
    }  
}

add2wishlist();
checkWishlistStatus();