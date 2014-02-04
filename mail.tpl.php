<?php
$replace['model_phone'] = 'Модель телефона';
$replace['imei'] = 'iMEi';	
$replace['contry'] = 'Страна';	
$replace['pay'] = 'Способ оплаты';
$replace['info'] = 'Дополнительная информация';	
$replace['id'] = 'Номер заказа';	
$replace['cost'] = 'Стоимость';
$replace['phone'] = 'Телефона';
$replace['mail'] = 'Почта';
$replace['opt'] = 'Оптовый покупатель';

$buf = array();
foreach ($_POST as $key => $val) {
    if (!isset($replace[$key])) {
       $buf[$key] = $val;
    }else{
        $buf[$replace[$key]] = $val;
    }
}

$rez = null;
foreach ($buf as $key => $val) {
    $rez .= '<p><strong>'.$key.'<strong> '.$val.'</p>';
}
return $rez;
