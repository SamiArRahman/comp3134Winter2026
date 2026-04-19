<?php
$conn = new mysqli("localhost", "comp3134app", "Comp3134App!2026", "lab9");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstname = $_GET["firstname"] ?? "";
$result = null;
$error = "";

if (isset($_GET["firstname"])) {
    $sql = "SELECT id, username, email, firstname, lastname, active
            FROM users
            WHERE firstname = '$firstname' AND active = 1";

    $result = $conn->query($sql);

    if ($result === false) {
        $error = $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>getusers_1</title>
</head>
<body>
    <form method="GET" action="">
        <input type="text" name="firstname">
        <button type="submit">Search</button>
    </form>

    <?php if ($error !== ""): ?>
        <p>SQL Error: <?php echo $error; ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="6" cellspacing="0">
        <tr>
            <th>id</th>
            <th>username</th>
            <th>email</th>
            <th>firstname</th>
            <th>lastname</th>
            <th>active</th>
        </tr>

        <?php if ($result instanceof mysqli_result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["username"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["firstname"]; ?></td>
                    <td><?php echo $row["lastname"]; ?></td>
                    <td><?php echo $row["active"]; ?></td>
                </tr>
            <?php endwhile; ?>
        <?php elseif (isset($_GET["firstname"]) && $error === ""): ?>
            <tr>
                <td colspan="6">No results found.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
