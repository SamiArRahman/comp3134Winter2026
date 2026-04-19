<?php
$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";
$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";
$message = "";

if ($isSubmitted) {
    if ($username === "host" && $password === "pass") {
        $message = "Success";
    } else {
        $message = "Failure";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <form action="csfr.php" method="post">
        Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Submit">
    </form>

    <?php if ($isSubmitted): ?>
        <div id="splash-screen">
            <div class="splash-content">
                <h1>Welcome</h1>
                <p><?php echo $message; ?></p>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
