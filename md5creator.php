<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MD5 hash Creator</title>
</head>
<body>

<?php
$message = "No pin entered";

if (isset($_GET['pin'])) {
  $pin = $_GET['pin'];

  $check = hash('md5', $pin);

  $message = "MD5: " . $check;
}
?>

  <h1>I create MD5 hashes from pins</h1>
  <p>This part creates an md5 hash from a 4-digit pin.</p>

  <p><?php echo $message ?></p>
  <form method="GET">
  <input type="text" name="pin" size="40">
  <input type="submit" value="Get MD5">
  </form>

<br>
<a href="index.php">Go to MD5 cracker</a>
</body>
</html>