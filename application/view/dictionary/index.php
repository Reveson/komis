<div class="container">
    
    <b>Uzupełnianie słowników:</b><br/>
    <form action="<?php echo URL; ?>dictionary/addBrand" method="POST">
        <fieldset>
            <b>Marka:</b><br/>
            <select name="marka_combo">
            <?php foreach ($brands as $brand) { ?>
                <option><?php echo htmlspecialchars($brand->nazwa_marki, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php } ?>
            </select>
            <input type="text" name="marka_input" size="15" maxlength="30"/>
            <br/>
            <b>Model:</b><br/>

            <input type="text" name="model" size="15" maxlength="30"/>
            <input type="submit" name="Przeslij" value="Przeslij" />
        </fieldset>
    </form>

    <form action="<?php echo URL; ?>dictionary/addFuel" method="POST">
        <fieldset>
        <b>Rodzaj paliwa:</b><br/>
        <select>
            <?php foreach ($fuels as $fuel) { ?>
                <option><?php echo htmlspecialchars($fuel->nazwa_rodzaju_paliwa, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php } ?>
        </select>
        <input type="text" name="paliwo" size="15" maxlength="30"/>
        <input type="submit" name="Przeslij" value="Przeslij" />
        </fieldset>
    </form>


    <form action="<?php echo URL; ?>dictionary/addTransmission" method="POST">
        <fieldset>
            <b>Skrzynia biegów:</b><br/>
            <select>
                <?php foreach ($transmissions as $transmission) { ?>
                    <option><?php echo htmlspecialchars($transmission->nazwa_skrzyni_biegow, ENT_QUOTES, 'UTF-8'); ?></option>
                <?php } ?>
            </select>
            <input type="text" name="rodzajSkrzyni" size="15" maxlength="30"/>
            <input type="submit" name="Przeslij" value="Przeslij" />
        </fieldset>
    </form>

    <form action="<?php echo URL; ?>dictionary/addCarBody" method="POST">
        <fieldset>
        <b>Typ samochodu:</b><br/>
        <select>
            <?php foreach ($bodies as $body) { ?>
                <option><?php echo htmlspecialchars($body->nazwa_typu_samochodu, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php } ?>
        </select>
        <input type="text" name="typSamochodu" size="15" maxlength="30"/>
        <input type="submit" name="Przeslij" value="Przeslij" />
        </fieldset>
    </form>

    <form action="<?php echo URL; ?>dictionary/addDrive" method="POST">
        <fieldset>
        <b>Napęd:</b><br/>
        <select>
            <?php foreach ($drives as $drive) { ?>
                <option><?php echo htmlspecialchars($drive->nazwa_napedu, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php } ?>
        </select>
        <input type="text" name="naped" size="15" maxlength="30"/>
        <input type="submit" name="Przeslij" value="Przeslij" />
        </fieldset>
    </form>


    <form action="<?php echo URL; ?>dictionary/addColor" method="POST">
        <fieldset>
        <b>Kolor:</b><br/>
        <select>
            <?php foreach ($colors as $color) { ?>
                <option><?php echo htmlspecialchars($color->nazwa_koloru, ENT_QUOTES, 'UTF-8'); ?></option>
            <?php } ?>
        </select>
        <input type="text" name="kolor" size="15" maxlength="30"/>
        <input type="submit" name="Przeslij" value="Przeslij" />
        </fieldset>
    </form>



</div>
