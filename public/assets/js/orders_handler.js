document.addEventListener("DOMContentLoaded", () => {
    const ordersContainer = document.getElementById("orders-container");
    if (!ordersContainer) return;

    let items = [];

    fetch(window.location.href,  {
        method: "POST",
        headers: {
            "X-Requested-With": "XMLHttpRequest",
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: new URLSearchParams({
            action: "get_all_orders"
        })
    })
    .then(res => {
        if (!res.ok) {
            throw new Error("Network response was not ok");
        }
        return res.json();
    })
    .then(fetchedItems => {
        console.log("Orders items:", fetchedItems);
        // Defensive check
        if (!fetchedItems.length) {
                ordersContainer.innerHTML = "<p>You have no orders yet.</p>";
                return;
            }

        let html = `
                <table class="orders-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Items</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            fetchedItems.forEach(order => {
                const itemsList = order.items.map(item => `
                    <div class="order-item">
                        ${item.image_url ? `<img src="${item.image_url}" alt="${item.title}" class="item-thumb">` : ""}
                        <span>${item.title} (x${item.quantity})</span>
                    </div>
                `).join("");

                html += `
                    <tr>
                        <td>${order.id}</td>
                        <td>${order.created_at}</td>
                        <td>${order.status}</td>
                        <td>${order.total_amount} ${order.currency}</td>
                        <td class="items-cell">${itemsList}</td>
                    </tr>
                `;
            });
            html += "</tbody></table>";
            ordersContainer.innerHTML = html;
    })
    .catch(err => {
        console.error("Orders load failed:", err);
        ordersContainer.innerHTML =
            "<p>Failed to load orders. Please try again later.</p>";
    });
});
