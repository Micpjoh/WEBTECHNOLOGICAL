<section id="header">
    <div class="nav-container">
        <div class="logo">
            <a href="index.php">GreenWear</a>
        </div>

        <div class="navbarLEFT">
            <div class="dropdown">
                <a  href="catalog.php">Catalog 
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="dropdown-content">
                    <a href="#">Shirts</a>
                    <a href="#">Sweaters</a>
                    <a href="#">Pants</a>
                    <a href="#">Shoes</a>
                </div> 
            </div> 
                <a href="design.php">Design</a>
                <a href="aboutus.php">About us</a>
                <a href="faq.php">FAQ</a>
                <a href="contact.php">Contact</a>
        </div>
    </div>

    <div class="navbarRIGHT">        
        <?php
        if (isset($_SESSION['user_id'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'admin') {
                echo '<a class="underline" href="includes/logout.inc.php">Logout</a>';
                echo '<a class="underline" href="profile.php">Profile</a>';
            }
            else {
                echo '<a class="underline" href="includes/logout.inc.php">Logout</a>';
                echo '<a class="underline" href="admin.php">Admin</a>';
            }
        } 
        else {
            echo '<a class="underline" href="signup.php">Sign up</a>';
            echo '<a class="underline" href="login.php">Login</a>';
        }
        ?>
        <a href="cart.php">
            <svg class="cart" height="55" viewBox="0 0 14 44" width="20" xmlns="http://www.w3.org/2000/svg">
            <path d="m11.3535 16.0283h-1.0205a3.4229 3.4229 0 0 0 -3.333-2.9648 3.4229 3.4229 0 0 0 -3.333 2.9648h-1.02a2.1184 2.1184 0 0 0 -2.117 2.1162v7.7155a2.1186 2.1186 0 0 0 2.1162 2.1167h8.707a2.1186 2.1186 0 0 0 2.1168-2.1167v-7.7155a2.1184 2.1184 0 0 0 -2.1165-2.1162zm-4.3535-1.8652a2.3169 2.3169 0 0 1 2.2222 1.8652h-4.4444a2.3169 2.3169 0 0 1 2.2222-1.8652zm5.37 11.6969a1.0182 1.0182 0 0 1 -1.0166 1.0171h-8.7069a1.0182 1.0182 0 0 1 -1.0165-1.0171v-7.7155a1.0178 1.0178 0 0 1 1.0166-1.0166h8.707a1.0178 1.0178 0 0 1 1.0164 1.0166z"></path>
            </svg>
        </a>
    </div>

    <div class="nav-bars">
        <i class="fa-solid fa-bars"></i>
    </div>
    
</section>

<div class="nav-dropdown">
    <ul>
        <li><a href="catalog.php">Catalog</a></li>
        <li><a href="design.php">Design</a></li>
        <li><a href="aboutus.php">About us</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="contact.php">Contact</a></li>
        <?php
        if (isset($_SESSION['user_id'])) {
            if (isset($_SESSION['user_type']) && $_SESSION['user_type'] !== 'admin') {
                echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                echo '<li><a href="profile.php">Profile</a></li>';
            }
            else {
                echo '<li><a href="includes/logout.inc.php">Logout</a></li>';
                echo '<li><a href="admin.php">Admin</a></li>';
            }
        } 
        else {
            echo '<li><a href="signup.php">Sign up</a></li>';
            echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
        <li><a href="cart.php">Cart</a>
    </ul>
</div>

<script src="js/script.js"></script>