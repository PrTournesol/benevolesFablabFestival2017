<?php
/**
 * Created by PhpStorm.
 * User: Prepa
 * Date: 13/02/2017
 * Time: 20:19
 */

echo 'io : '.password_hash('io',PASSWORD_DEFAULT).'<br>';
echo 'jmb : '.password_hash('jmb',PASSWORD_DEFAULT).'<br>';
echo 'ap : '.password_hash('ap',PASSWORD_DEFAULT).'<br>';
echo 'ms : '.password_hash('ms',PASSWORD_DEFAULT).'<br>';
if (isset($_GET['password'])){
    $hash=password_hash(htmlspecialchars($_GET['password']),PASSWORD_DEFAULT);
    echo '<br><br><br> hash du mot de passe : '.htmlspecialchars($_GET['password']).' : '.$hash;
    echo '<br><br>Résultat de la vérification '.password_verify(htmlspecialchars($_GET['password']),$hash);
}


?>
<br><br>
<form action="" method="GET">
    Mot de passe : <input type="text" name="password">


    <input type="submit">
</form>
