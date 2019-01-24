<div class="container">
    <form action="<?php echo URL; ?>staff/addEmployee" method="POST">
        <fieldset>
            <p>Imię:</p>
            <input type="text" name="imie" size="15" maxlength="20" required/>
            <p>Drugie Imię:</p>
            <input type="text" name="drugieImie" size="15" maxlength="20"/>
            <p>Nazwisko:</p>
            <input type="text" name="nazwisko" size="15" maxlength="30" required/>
            <p>Pesel:</p>
            <input type="text" name="pesel" size="15" maxlength="11" required/>
            <p>Numer Dowodu Osobistego:</p>
            <input type="text" name="nrDowoduOsobistego" size="15" maxlength="12" required/>
            <p>Telefon:</p>
            <input type="tel" name="telefon" placeholder="123456789" pattern="[0-9]{9}" size="15"/>
            <p>Miesięczne wynagrodzenie</p>
            <input id="wynagrodzenie" type="number" name="wynagrodzenie" value="0" required/>
            <!-- <p>Hasło:</p>
            <input id="haslo" type="password" name="haslo" required/> -->
            <p>Stanowisko:</p>
            <select name="stanowisko">
                <?php foreach ($positions as $position) { ?>
                    <option><?php echo htmlspecialchars($position->nazwa_stanowiska, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php } ?>
            </select>
            <p>Start pracy:</p>
            <input type="date" name="startPracy" min="2000-01-01" max="2080-01-01" required/>


            <br><br>
            <input type="submit" name="Przeslij" value="Przeslij" />
        </fieldset>
    </form>
</div>