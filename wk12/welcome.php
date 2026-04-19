<?php
$isSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";
$username = $_POST["username"] ?? "";
?>
<!DOCTYPE html>
<html>
<body>
<?php if ($isSubmitted): ?>
    Welcome <?php echo htmlspecialchars($username); ?><br>
<?php else: ?>
    Please submit the form from csfr.php.
<?php endif; ?>
</body>
</html>
