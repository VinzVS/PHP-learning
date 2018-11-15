<html>
    <head>
    <?php
    /**
     * Поиск в текстовой строке словосочетания и оборачивание его в спан для выделения
     * User: VinzVS
     * Date: 11.11.2018
     * Time: 16:18
     */
    // Инициализация переменных
        $strok = false;
        $multytext = false;

        if (isset ($_POST ["stroks"])) $strok=$_POST["stroks"]; // проверяем пустое ли значение отправил пользователь, если нет, присваиваем значение
        if (isset ($_POST ["multytext"])) $multytext=$_POST["multytext"]; // проверяем пустое ли значение отправил пользователь, если нет, присваиваем значение
        // если поля не пустые то готовим обертку в виде span тега
        if (($strok !== false) && ($multytext !==false)) $itog="<span>".$strok."</span>";
    ?>

    <style>
        /* Готовим стили для span тега */
        span {
            background-color: yellow;
            color: red;
        }
    </style>
</head>
    <body>
        <?php if (($strok !== false) && ($multytext !==false)) : ?>
    <p>
        Найдено:
        <?php echo (str_replace( $strok, $itog,$multytext)); ?>
        <?php endif ?>
    </p>
        <form  name ="table" action="<?php $_SERVER[`PHP_SELF`]?>" method="post">
            Строка для поиска: <br />
            <input type="text" name="stroks">
            <br />
            Текст в котором необходимо найти искомое <br/>
            <textarea name="multytext"></textarea>
            <button type="submit" name="multiply"> Сумма </button>
        </form>
    </body>
</html>