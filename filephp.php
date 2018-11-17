<?php
/**
 * 1.Читаем ini файл в массив
   2.Сохраняем массив в упакованном виде
 * 3.Загружаем массив и восстанавливам из упакованного вида из файла
 * 4.Сохраняем массив в виде ini файла отформатированной строкой.
 * User: VinzVS
 * Date: 16.11.2018
 * Time: 12:05
 */
$filename="init.ini";
$pass="pass.ini";
$stoke="";
function object2file($value, $filename)
{
    $str_value = serialize($value);
    $f = fopen($filename, 'w');
    fwrite($f, $str_value);
    fclose($f);
}

function object_from_file($filename)
{
    $file = file_get_contents($filename);
    $value = unserialize($file);
    return $value;
}

function printMassive( $arr)
{
    foreach ($arr as $key => $value) {
        echo "<br/>";
        if (is_array($value)) {
            echo "Массив $key ";
            echo " здесь есть подмассив";
        } else {
            echo "Ключ: $key , Данные: $value";
        }
        foreach ($value as $k => $v) {
            echo "<br/>";
            echo "Ключ: $k , Данные подмассива: $v";
        }
    }
}

function fileOutIni ($filename, $arr){
    $fileini = fopen($filename, 'w');
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $stoke .= "[$key]";
            $stoke .= PHP_EOL;
        } else {
            $stoke.=$key.'="'.$value.'"'.PHP_EOL;
        }
        foreach ($value as $k => $v) {
            $stoke.=$k.'="'.$v.'"'.PHP_EOL;
        }

    }
    file_put_contents($filename, $stoke);
}
?>
<!DOCTYPE html>
<html>
    <head>


    </head>
    <body>

        <?php
        // Читаем в массив ini файл
        if (file_exists($filename) ) {
            $initarr = parse_ini_file($filename, true);
            // Сохраняем массив в упакованном виде
            object2file($initarr, $pass);
            echo "Данные массива:";
            echo "<br/>";
           // Выводим массив на экран
            printMassive($initarr);
            // Читаем и распаковываем в массив данные с файла
            $initarr2 = object_from_file($pass);
            echo "<br/>";
            echo "ИТОГ загрузки из файла";
            echo "<br/>";
            echo "Данные массива 2";
            // выводим массив 2 на экран
            printMassive($initarr2);

            // пробуем вывести новый инит файл по правилам
            fileOutIni ("init2.ini", $initarr2);

            echo "<br/>";
            echo $stoke;
        }
        else
            {
                echo "Файл не существует";
        }

        ?>

    </body>
</html>