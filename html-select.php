<?php
// скрипт решает задачу по созданию select тега в html  со зночениями из migx масива
// принемает $tv имя тв где расположен migx
// &value поле из migx которое будет выводтся в атрибкт value
// &text поле из migx которое будет выводтся в качестве текста

$row = $modx->resource->getTVValue($tv);
$row = json_decode($row);
$rez=null;
foreach($row as $val) {
    $rez .= '<option value="'.$val->$value.'">'.$val->$text.'</option>';
}
return $rez;
