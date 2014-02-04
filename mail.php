<?php
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/connectors/index.php';

/*Проверка на то что этот пост содержит в себе способ оплаты*/
if (isset($_POST['pay'])) {
    /*получаем привичный ключь FormSave*/
    $sql = "SHOW TABLE STATUS LIKE 'modx_formsave_forms'";
    $q = $modx->prepare($sql);
    $q->execute(array(0));
    $arr = $q->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($arr as $val) {
        $_POST['id'] =  $val['Auto_increment'];
    }    
}

//------------------------------------------
/*Русские синонимы*/
$replace['phon'] = 'Телефон';
$replace['imei'] = 'iMEi';	
$replace['contry'] = 'Страна';	
$replace['pay'] = 'Способ оплаты';
$replace['info'] = 'Дополнительная информация';	
$replace['id'] = 'Номер заказа';	

/*Переписываем пост в буфер*/
$buf = array();
foreach ($_POST as $key => $val) {
    if (!isset($replace[$key])) {
       $buf[$key] = $val;
    }else{
        $buf[$replace[$key]] = $val;
    }
}
unset($_POST);
/*Русофицируем пост*/
foreach ($buf as $key => $val) {
    $_POST[$key] = $val;
}

//------------------------------------------
/*Отправка почты*/
$modx->runSnippet('FormIt',array(
    'hooks'=>'FormSave,email'
    ,'emailSubject'=>'Имя'
    ,'emailTo'=>'52018@bk.ru'
    ,'emailFromName'=>'Maclab.ru'
));

print '{"success":true,"result":"200","description":"OK"}';
