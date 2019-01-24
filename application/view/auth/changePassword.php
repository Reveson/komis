<div class="container">
    <form action="<?php echo URL; ?>auth/changePassword" method="POST">
    <div>
        <label for="inputPassword" class="sr-only">Stare hasło</label>
        <input type="password" name="oldPass" id="inputPassword" class="form-control" placeholder="Password" required>
    </div> 
    <div>
        <label for="inputPassword" class="sr-only">Nowe hasło</label>
        <input type="password" name="newPass" id="inputPassword" class="form-control" placeholder="Password" required>
    <div>
    </div>
        <label for="inputPassword" class="sr-only">Powtórz nowe hasło</label>
        <input type="password" name="newPass2" id="inputPassword" class="form-control" placeholder="Password" required>
    </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Zmień hasło</button>
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