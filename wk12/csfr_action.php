<?php
if (!is_dir(__DIR__ . DIRECTORY_SEPARATOR . "sessions")) {
    mkdir(__DIR__ . DIRECTORY_SEPARATOR . "sessions");
}
session_save_path(__DIR__ . DIRECTORY_SEPARATOR . "sessions");
session_start();

$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";
$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";
$sessionConfirmation = $_SESSION["confirmation"] ?? "";
$postConfirmation = $_POST["confirmation"] ?? "";
$message = "";

if ($isSubmitted) {
    if (
        $sessionConfirmation !== "" &&
        $postConfirmation === $sessionConfirmation &&
        $username === "host" &&
        $password === "pass"
    ) {
        $message = "Success";
    } else {
        $message = "Failure";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
    <form action="csfr_action.php" method="post">
        Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>"><br>
        Password: <input type="password" name="password"><br>
        <input type="hidden" name="confirmation" value="<?php echo htmlspecialchars($sessionConfirmation); ?>">
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
