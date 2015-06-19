<?php
session_start();
?>

<?php
  include 'config.php';
  include 'route.php';

  $route = new Route();

  $route -> add('');
  $route -> add('home');
  $route -> add('submit');
  $route -> add('gameslist');
  $route -> add('login');
  $route -> add('logout');
  $route -> add('signup');
  $route -> add('account');
  $route -> add('tests');
  $route->submit();
?>
