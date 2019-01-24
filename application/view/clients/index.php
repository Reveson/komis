<div class="container">
    <form action="<?php echo URL; ?>clients/addClient" method="POST">
        Imię: <input type="text" name="imie" maxlength="20" size="15" required><br>
        Nazwisko: <input type="text" name="nazwisko" maxlength="30" size="15" required><br>
        Pesel: <input type="text" name="pesel" maxlength="11" size="15" required><br>
        Numer telefonu: <input type="text" name="telefon" maxlength="9" size="15" required><br>
        Miasto: <input type="text" name="miasto" maxlength="40" size="15" required><br>
        Adres: <input type="text" name="adres" maxlength="50" size="15" required><br>
        Numer dowodu osobistego:<input type="text" name="numerDowoduOsobistego" maxlength="12" size="15" required><br>
        Dowod dodany przez: <input type="text" name="dowodDodanyPrzez" maxlength="150" size="15" required><br>

        <input type="submit" name="Przeslij" value="Przeslij">
    </form>
</div>