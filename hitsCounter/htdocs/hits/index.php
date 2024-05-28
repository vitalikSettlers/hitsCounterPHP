<?php
date_default_timezone_set('Europe/Moscow');
$time = date('H:i', time());

$connectionDB = mysqli_connect('localhost', 'root', '', 'hitscounter');
$counter = 0;
function getData($connectionDB)
{
    $queryDB = "SELECT counter FROM hits";
    $queryResult = mysqli_query($connectionDB, $queryDB);
    return mysqli_fetch_array($queryResult)["counter"];
}

function updData($counter, $connectionDB)
{
    ++$counter;
    $queryDB = "UPDATE hits SET counter = $counter;";
    mysqli_query($connectionDB, $queryDB);
}

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
updData(getData($connectionDB), $connectionDB);
$counter = getData($connectionDB);
echo "<div>Страница была загружена $counter раз. Текущее время $time.</div>";
?>

</body>
</html>