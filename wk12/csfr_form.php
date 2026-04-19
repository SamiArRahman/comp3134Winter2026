<?php
if (!is_dir(__DIR__ . DIRECTORY_SEPARATOR . "sessions")) {
    mkdir(__DIR__ . DIRECTORY_SEPARATOR . "sessions");
}
session_save_path(__DIR__ . DIRECTORY_SEPARATOR . "sessions");
session_start();
$_SESSION["confirmation"] = bin2hex(random_bytes(16));
$confirmation = $_SESSION["confirmation"];
?>
<!DOCTYPE html>
<html>
<body onload="document.getElementById('protected-form').submit()">
    <form id="protected-form" action="csfr_action.php" method="post">
        <input type="hidden" name="username" value="host">
        <input type="hidden" name="password" value="pass">
        <input type="hidden" name="confirmation" value="<?php echo htmlspecialchars($confirmation); ?>">
    </form>
</body>
</html>
