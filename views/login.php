<?php get_head();
include (ABSPATH . FUNC . 'base.php');
?>

<main class="bottom-sheet" id="view">


<div style="border: 1px solid black; padding: 5px; margin: 10px; height: 500px">
    <div>
        <?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
 ?>

 <h1>Member Area</h1>
 <p> Thanks for logging in! You are <code><?=$_SESSION['Username']?></code>.</p>
<a href=logout.php> Log Out </a>

 <?php
}
elseif(!empty($_POST['username']) && !empty($_POST['password']))
{
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

$checklogin = "SELECT * FROM `users` WHERE Username = '$username' AND Password = '$password'";
$result = $conn->query($checklogin);
if($result->num_rows !== 0)
{
    $row = $result->fetch_assoc();

    $_SESSION['Username'] = $username;
    $_SESSION['LoggedIn'] = 1;

    echo "<h1>Success</h1>";
    echo "<p>We are now redirecting you to the member area.</p>";
    echo "<meta http-equiv='refresh' content='2;home'>";
}
else
{
    echo "<h1>Error</h1>";
    echo "<p>Sorry, your account could not be found. Please <a href='". get_base_uri() . "login'>click here to try again</a>.</p>";
}
}
else
{
?>

<h1>Member Login</h1>

<p>Thanks for visiting! Please either login below.</p>

<form method="post" action="" name="loginform" id="loginform">
<fieldset>
    <label for="username">Username:</label><input type="text" name="username" id="username" /><br />
    <label for="password">Password:</label><input type="password" name="password" id="password" /><br />
    <input type="submit" name="login" id="login" value="Login" />
</fieldset>
</form>

<?php
}
?>
    </div>
</div>

</main>
<?php get_foot(); ?>
