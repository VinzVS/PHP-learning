<html>
    <head>
    <?php
    /**
     * убираем каждый нечетный символ с сроке
     * User: VinzVS
     * Date: 11.11.2018
     * Time: 16:18
     */
    $x="";  // переменная в которой находится исходная строка
    $strok = ""; // переменная в которой находится результат
    if (isset ($_POST ["stroks"])) {
        $x=$_POST["stroks"];
        for ($i=0; $i< mb_strlen($x); $i++) {
            if (($i % 2) ==0) $strok = $strok.$x[$i];
        }
    }
    ?>
    </head>
    <body>
        <?php if ($strok !== "") : ?>
        <p>
            ИТОГО :
            <?= $strok ?>
            <?php endif ?>
        </p>
        <form  name ="table" action="<?php $_SERVER[`PHP_SELF`]?>" method="post">
            <input type="text" name="stroks">
            <button type="submit" name="multiply"> Сумма </button>
        </form>
    </body>
</html>