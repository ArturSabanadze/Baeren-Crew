### API NODES
  ## User Data
- [authenticate](#authenticate)
- [register_new_user](#register_new_user)
- [update_user_profile](#update_user_profile)
  ## User Products
- [get_all_orders](#get_all_orders)
- [get_user_wishlist](#get_user_wishlist)
- [get_wishlist_product_ids](#get_wishlist_product_ids)
- [add_to_wishlist](#add_to_wishlist)
- [add_to_cart](#add_to_cart)
- [get_cart_items](#get_cart_items)
- [reduce_item_qty](#reduce_item_qty)
- [remove_from_cart](#remove_from_cart)
- [count_cart_items](#count_cart_items)

## authenticate
 - **Uses Model:** User.login(array $data) method.
 - **Expects as parameters:** $_POST array with 'username' and 'password' keys
 - **Return Values:** boolean value [true or false]

##  register_new_user
 - **Uses Model:** User.createUser(array $data) method.
 - **Expects as parameters:** $_POST array with 'username', 'email' and 'password' keys
 - **Return Values:** boolean value [true or false]

## update_user_profile
 - **Uses Model:** User.updateCredentials(int $userID, array $data), User.Profile.updateProfile(int $userID, array $data), UserAddress.updateAddress(int $userID, array $data)
 - **Expects as parameters:** $SESSION[user_id] and $_POST array data with the profile keys like username, password, email etc.
 - **Return Values:** boolean value [true or false]

## get_user_wishlist
 - **Uses Model:** Wishlist.getWishlistItems(int wishlist_id, int user_id)
 - **Expects as parameters:** int wishlist_id and int user_id both stored in $_SESSION keys
 - **Return Values:** array [product_id, title, price, quantity, image_url, currency]

## get_wishlist_product_ids
 - **Uses Model:** Wishlist.getWishlistItems(int $wishlist_id, int $user_id)
 - **Expects as parameters:** int wishlist_id and int user_id both stored in $_SESSION keys
 - **Return Values:** array [product_id] containing only wishlist product_ids

## add_to_wishlist
 - **Uses Model:** Wishlist.addToWishlist(int $wishlist_id, int $product_id)
 - **Expects as parameters:** $_SESSION[wishlist_id] and $_POST[product_id]
 - **Return Values:** array [product_id, title, price, quantity, image_url, currency]

## get_all_orders
 - **Uses Model:** Order.getAllOrders(int $user_id) method.
 - **Expects as parameters:** $SESSION[user_id]
 - **Return Values:** array [order_id, order_date, status, total_price, currency]

## add_to_cart
 - **Uses Model:** Cart.addItem(int $cart_id, int $product_id, int $quantity) method.
 - **Expects as parameters:** $_SESSION[cart_id], $_POST[product_id], $_POST[quantity]
 - **Return Values:** boolean value [true or false]

## get_cart_items
 - **Uses Model:** Cart.getCartItems(int $cart_id) method.
 - **Expects as parameters:** $_SESSION[cart_id]
 - **Return Values:** array [product_id, title, price, quantity, image_url, currency]

## reduce_item_qty
 - **Uses Model:** Cart.updateItemQuantity(int $cart_id, int $product_id, int $quantity) method.
 - **Expects as parameters:** $_SESSION[cart_id], $_POST[product_id], $_POST[quantity]
 - **Return Values:** boolean value [true or false]

## remove_from_cart
 - **Uses Model:** Cart.removeItem(int $cart_id, int $product_id) method.
 - **Expects as parameters:** $_SESSION[cart_id] and $_POST[product_id]
 - **Return Values:** boolean value [true or false]

## count_cart_items
 - **Uses Model:** Cart.countItems(int $cart_id) method.
 - **Expects as parameters:** $_SESSION[cart_id]
 - **Return Values:** integer value representing total item count