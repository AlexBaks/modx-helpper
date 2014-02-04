<?
$replace['phon'] = 'Телефон';
$replace['imei'] = 'iMEi';	
$replace['contry'] = 'Страна';	
$replace['pay'] = 'Способ оплаты';
$replace['info'] = 'Дополнительная информация';	
$replace['id'] = 'Номер чека';	

$buf = array();
foreach ($_POST as $key => $val) {
    if (!isset($replace[$key])) {
       $buf[$key] = $val;
    }else{
        $buf[$replace[$key]] = $val;
    }
}
unset($_POST);

foreach ($buf as $key => $val) {
    $_POST[$key] = $val;
}
