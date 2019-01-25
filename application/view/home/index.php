<div class="container">	
    <table>
	<tr>
		<th>Zdjęcie</th>
		<th>Model</th>
		<th>Marka</th>
		<th>Rok produkcji</th>
		<th>Przebieg</th>
		<th>Pojemność silnika</th>
		<th>Rodzaj paliwa</th>
		<th>Cena</th>
		
		
	</tr>
    <?php foreach ($cars as $car) { ?>
        <tr>
            <td><img src="<?php echo htmlspecialchars($car->sciezka_min, ENT_QUOTES, 'UTF-8'); ?>"/></td>
            <td><?php echo htmlspecialchars($car->nazwa_modelu, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($car->nazwa_marki, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($car->rok, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($car->przebieg, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($car->poj_skokowa, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($car->nazwa_rodzaju_paliwa, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php echo htmlspecialchars($car->plan_koszt_sprzedazy, ENT_QUOTES, 'UTF-8'); ?></td>
        </tr>
    <?php } ?>
	</table>
</div>
