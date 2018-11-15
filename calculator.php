<html>
    <?php
    /**
     * Калькулятор простой
     * User: VinzVS
     * Date: 11.11.2018
     * Time: 15:57
     */
    $summa = false; //инициализация переменной  сумма
        if (isset ($_POST ["multiply"])) {
            $x=$_POST["X"]?? false;
            $y=$_POST["Y"]?? false;
            if ($x!==false && $y!==false) $summa = $x + $y;
        }
    ?>
<body>
    <?php if ($summa !== false) : ?>
    <p>
        Сумма равна:
        <?= $summa ?>
        <?php endif ?>
    </p>
    <form  name ="table" action="<?php $_SERVER[`PHP_SELF`]?>" method="post">
        X: <input type="text" name="X">
        Y: <input type="text" name="Y">
        <button type="submit" name="multiply"> Сумма </button>

    </form>
</body>
</html>