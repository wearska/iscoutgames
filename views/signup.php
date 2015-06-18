<?php get_head(); ?>

    <main class="bottom-sheet" id="view">
        <div style="border: 1px solid black; padding: 5px; margin: 10px; height: 500px">
            <form id="signup" action="../functions/signupbe.php" method="post">

                <input type="text" name="username" placeholder="Username">
                <br>
                <br>
                <input type="password" name="password" placeholder="Password">
                <br>
                <br>
                <input type="submit" value="Sign Up" id="testbutton"> </form>
            </form>
        </div>
    </main>

<?php get_foot(); ?>
