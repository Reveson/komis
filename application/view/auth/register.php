<div class="container">
    <form action="<?php echo URL; ?>auth/createAccount" method="POST">
        <h2 class="form-signin-heading">Zarejestruj się:</h2>
        <div class="input-group">
            <label class="sr-only">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
        </div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    </form>
    <div class="errorMessage">
        <?php 
            if(isset($_SESSION['message'])) {
                echo($_SESSION['message']);
                unset($_SESSION['message']);
            }
        ?>
    </div>
</div>