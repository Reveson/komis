<div class="container">
    
    <table class="cars">
        <thead style="background-color: #ddd; font-weight: bold;">
        <tr>
            <td>Zdjęcie</td>
            <td>Marka</td>
            <td>Model</td>
            <td>Przebieg</td>
            <td>DELETE</td>
            <td>EDIT</td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($cars as $car) { ?>
            <tr>
                <td><img src="<?php if (isset($car->img_src)) echo htmlspecialchars($car->img_src, ENT_QUOTES, 'UTF-8'); ?>" style="height:100px"></td>
                <td><?php if (isset($car->brand)) echo htmlspecialchars($car->brand, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($car->model)) echo htmlspecialchars($car->model, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php if (isset($car->mileage)) echo htmlspecialchars($car->mileage, ENT_QUOTES, 'UTF-8'); ?></td>
                <td><a href="<?php echo URL . 'car/delete/' . htmlspecialchars($car->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                <td><a href="<?php echo URL . 'car/edit/' . htmlspecialchars($car->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>