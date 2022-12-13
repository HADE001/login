<nav>
    <span><a href="./">Home</a></span>
    <?php if(isset($_SESSION['usr'])): ?>
        <span><a href="./login.php?logout">logout</a></span>
        <?php else: ?>
            <span><a href="./register.php">resister</a></span>
            <span><a href="./login.php">Login</a></span>
        <?php endif ; ?>
    </nav>