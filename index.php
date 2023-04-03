<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MD5 Cracker</title>
</head>
<body>
<h1>I'll crack some MD5</h1>
<p>This application takes an MD5 hash of a 4-digit pin,
 checks the hash against 10,000 possible 4-digit pins, and
 returns the correct pin</p>

<pre>
Debug output:
<?php
$message = "Not found"; // Default message when no parameters are detected

if (isset($_GET['md5'])) {
  $time_pre = microtime(true); // Will start the countdown to get the time elapsed
  $md5 = $_GET['md5'];

  $dig = "0123456789";
  $count = 20;
  $len = strlen($dig);
  
  for ($i=0; $i < $len; $i++) { 
    $fir = $dig[$i];

    for ($j=0; $j < $len; $j++) { 
      $sec = $dig[$j];

      for ($k=0; $k < $len; $k++) { 
        $thd = $dig[$k];

        for ($l=0; $l < $len; $l++) { 
          $fth = $dig[$l];

          $dec = $fir . $sec . $thd . $fth;

          $enc = hash('md5', $dec);

          if ($md5 == $enc) {
            $message = $dec;
          break;
          }

          if ($count > 0) {
            echo "$enc $dec\n";
            $count = $count - 1;
          }
        }
      }
    }
  }

  $time_post = microtime(true);
  print "Time elapsed: ";
  print $time_post - $time_pre;
  print("\n");

}
?>
</pre>

<?php echo "PIN: " . $message?>
 <form method="GET">
 <input type="text" name="md5" size="40">
 <input type="submit" value="Crack MD5">
 </form>
<br>
 <a href="md5creator.php">Create MD5 hash</a>
</body>
</html>