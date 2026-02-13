<?php
$edit = false;
?>

<div class="profile-wrapper">

    <h1 class="page-title">Account Settings</h1>

    <div class="profile-card">

        <div class="profile-header">
            <img id="profile-image" src="<?php echo $_SESSION['profile_img_url'] ?? '/uploads/profile_images/default.jpg'; ?>" class="profile-avatar">

            <div class="profile-header-text">
                <span class="welcome-label">Welcome</span>
                <h2 id="username-display"><?php echo $_SESSION['username'] ?? 'Guest'; ?></h2>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <div class="profile-tabs">
            <button class="tab-button active" data-tab="account">Account Settings</button>
            <button class="tab-button" data-tab="orders">Orders</button>
            <button class="tab-button" data-tab="wishlist">Wishlist</button>
        </div>

       <!-- User Information -->
        <div class="tab-content" id="account-tab">
            <form id="user-profile-form" class="profile-form">
            <input type="hidden" name="action" value="update_user_profile">
                
                <div class="profile-grid">
                <!-- User Credentials -->
                    <div class="form-section-uc">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" 
                                   placeholder="<?php echo $_SESSION['username'] ?? ''; ?>" 
                                   autocomplete="username" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password"
                                   placeholder="Leave empty to keep current"
                                   autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" 
                            placeholder="<?php echo $_SESSION['email'] ?? ''; ?>" 
                            autocomplete="email" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>
                    </div>
                <!-- User Profile -->
                    <div class="form-section-uprofile">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" id="first_name" name="name" 
                                   placeholder="<?php echo $_SESSION['name'] ?? ''; ?>" 
                                   autocomplete="given-name" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" id="last_name" name="surname" 
                                   placeholder="<?php echo $_SESSION['surname'] ?? ''; ?>" 
                                   autocomplete="family-name" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select id="gender" name="gender" autocomplete="sex" <?php if (!$edit) echo 'disabled'; ?>>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="birthdate">Birthdate</label>
                            <input type="date" id="birthdate" name="birthdate" 
                                   placeholder="<?php echo $_SESSION['birthdate'] ?? ''; ?>" 
                                   autocomplete="birthdate" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" 
                            placeholder="<?php echo $_SESSION['phone'] ?? ''; ?>" 
                            autocomplete="tel" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>
                    </div>
                <!-- User Address -->
                    <div class="form-section-uaddress">
                        <div class="form-group">
                            <label for="address_type">Address Type</label>
                            <select id="address_type" name="address_type" autocomplete="off" <?php if (!$edit) echo 'disabled'; ?>>
                                <option value="">Select</option>
                                <option value="shipping">shipping</option>
                                <option value="business">business</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country"  
                                   placeholder="<?php echo $_SESSION['country'] ?? ''; ?>" 
                                   autocomplete="country-name" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" 
                                   placeholder="<?php echo $_SESSION['city'] ?? ''; ?>" 
                                   autocomplete="address-level2" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" id="zip_code" name="zip_code" 
                                   placeholder="<?php echo $_SESSION['zip_code'] ?? ''; ?>" 
                                   autocomplete="postal-code" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="street">Street</label>
                            <input type="text" id="street" name="street" 
                                   placeholder="<?php echo $_SESSION['street'] ?? ''; ?>" 
                                   autocomplete="address-line1" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>

                        <div class="form-group">
                            <label for="street_number">Street Number</label>
                            <input type="text" id="street_number" name="street_number" 
                                   placeholder="<?php echo $_SESSION['street_number'] ?? ''; ?>" 
                                   autocomplete="address-line2" <?php if (!$edit) echo 'readonly'; ?>>
                        </div>
                    </div>
                <!-- Additional Profile Info -->

                    <div class="form-group">
                        <label for="profile_img_url">Profile Image URL</label>
                        <input type="text" id="profile_img_url" name="profile_img_url" 
                               placeholder="<?php echo $_SESSION['profile_img_url'] ?? ''; ?>" 
                               autocomplete="url" <?php if (!$edit) echo 'readonly'; ?>>
                    </div>

                    <div class="form-group">
                        <label for="biography">Biography</label>
                        <input type="text" id="biography" name="biography" 
                               placeholder="<?php echo $_SESSION['biography'] ?? ''; ?>" 
                               autocomplete="off" <?php if (!$edit) echo 'readonly'; ?>>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" class="btn-primary" id="edit-btn">Edit</button>
                    <button type="button" class="btn-secondary" id="cancel-btn" style="display:none;"> 
                        Cancel
                    </button>
                    <button type="submit" class="btn-primary" id="save-btn" style="display:none;">
                        Save Changes
                    </button>
                    <button type="button" class="btn-secondary" id="logout-btn"
                            onclick="location.href='index.php?page=logout'">
                        Logout
                    </button>
                </div>
            </form>
        </div>

        <!-- User Orders -->
        <div class="tab-content" id="orders-tab" style="display:none;">
            <?php include_once 'user_orders.php'; ?>
        </div>
        <!-- User Wishlist -->
        <div class="tab-content" id="wishlist-tab" style="display:none;">
            <?php include_once 'user_wishlist.php'; ?>
        </div>

    </div>
</div>

<script>
    document.getElementById('edit-btn').addEventListener('click', () => {
    const form = document.getElementById('user-profile-form');

    // Enable inputs
    form.classList.add('edit-mode');
    form.querySelectorAll('input, select').forEach(el => {
        el.removeAttribute('readonly');
        el.removeAttribute('disabled');
    });

    // Toggle buttons
    document.getElementById('edit-btn').style.display = 'none';
    document.getElementById('save-btn').style.display = 'inline-block';
    document.getElementById('cancel-btn').style.display = 'inline-block';
});

    document.getElementById('save-btn').addEventListener('click', () => {
    const form = document.getElementById('user-profile-form');

    // Disable inputs
    form.classList.remove('edit-mode');

    // Toggle buttons
    document.getElementById('edit-btn').style.display = 'inline-block';
    document.getElementById('save-btn').style.display = 'none';
    document.getElementById('cancel-btn').style.display = 'none';
});

    document.getElementById('cancel-btn').addEventListener('click', () => {
    const form = document.getElementById('user-profile-form');

    // Disable inputs
    form.classList.remove('edit-mode');

    // Toggle buttons
    document.getElementById('edit-btn').style.display = 'inline-block';
    document.getElementById('save-btn').style.display = 'none';
    document.getElementById('cancel-btn').style.display = 'none';
});
</script>


