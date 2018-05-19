<?php
// foreach (hash_algos() as $algorithm) {
//   echo "<p>{$algorithm}</p>";
// }
$password = "*jellybean92*";
$algorithm = "sha256";
$salt = str_shuffle("0123456789ABCDEF");
// $password_hash = hash($algorithm, $password, false);
// echo "<h3>Password hash: {$password_hash}</h3>";
// echo "<h3>Length: ".strlen($password_hash)."</h3>";

$password_hash = hash($algorithm, $password.$salt, false);
echo "<h3>Salted password hash: {$password_hash}</h3>";
echo "<h3>Salted password hash length: ".strlen($password_hash)."</h3>";

if($password_hash == hash($algorithm, $password.$salt, false)){
  echo"<h3>Password match</h3>";
}
?>
