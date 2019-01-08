<div class="container">
    <form action="<?php echo URL; ?>home/addBrand" method="POST">
        <p>Marka:</p><br />


        <select name="marka">
        <?php foreach ($brands as $brand) { ?>
        <option><?php echo htmlspecialchars($brand->nazwa_marki, ENT_QUOTES, 'UTF-8'); ?></option>
        <?php } ?>
        </select>
        <p>Model:</p>
        <input type="text" name="model" size="15" maxlength="30"/>

        </select>
        <br />
        <input type="submit" name="d_model" value="Przeslij" />
    </form>
</div>
