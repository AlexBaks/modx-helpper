<?php
// Простой mail
$to      = '52018@bk.ru';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: info@'.$_SERVER['HTTP_HOST']. "\r\n" .
    'Reply-To: info@'.$_SERVER['HTTP_HOST']. "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

//-------------------------------------------

$modx->getService('mail', 'mail.modPHPMailer');
$message = 'Добавлено обявление';
$modx->mail->set(modMail::MAIL_BODY,$message);
$modx->mail->set(modMail::MAIL_FROM,'support@eca.ru');
$modx->mail->set(modMail::MAIL_FROM_NAME,'robot');
$modx->mail->set(modMail::MAIL_SUBJECT,'Добавлено обявление');
$modx->mail->address('to','52018@bk.ru');
 
$modx->mail->setHTML(true);
if (!$modx->mail->send()) {
    $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
}
$modx->mail->reset();

//--------------------------------------------
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/connectors/index.php';

/*Проверка на то что этот пост содержит в себе способ оплаты*/
<?php
if (isset($_POST['pay'])) {
    $sql = "SHOW TABLE STATUS LIKE 'modx_formsave_forms'";
    $q = $modx->prepare($sql);
    $q->execute(array(0));
    $arr = $q->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($arr as $val) {
        $_POST['id'] =  $val['Auto_increment'];
    }  
    
    if (empty($_POST['cost'])) {
        $_POST['cost'] = $modx->resource->getTVValue('cost');
    }
    $id = $_POST['id'];
    $cost = $_POST['cost'];
}
$mail = $_POST['mail'];

//------------------------------------------

$modx->runSnippet('FormIt',array(
    'hooks'=>'FormSave,email'
    ,'emailSubject'=>$modx->resource->longtitle
    ,'emailTo'=> $modx->getOption('mail').','.$mail
    ,'emailFromName'=>'Maclab.ru'
    ,'emailTpl'=>'mail.tpl'
));

if (isset($id)) {
    // 2.
    // Оплата заданной суммы с выбором валюты на сайте ROBOKASSA
    // Payment of the set sum with a choice of currency on site ROBOKASSA
    
    // регистрационная информация (логин, пароль #1)
    // registration info (login, password #1)
    $mrh_login = "korziner";
    $mrh_pass1 = "123qwe123";
    
    // номер заказа
    // number of order
    $inv_id = $id;
    
    // описание заказа
    // order description
    $inv_desc = $modx->resource->longtitle;
    
    // сумма заказа
    // sum of order
    $out_summ = $cost;
    
    // тип товара
    // code of goods
    $shp_item = "2";
    
    // предлагаемая валюта платежа
    // default payment e-currency
    $in_curr = "";
    
    // язык
    // language
    $culture = "ru";
    
    // формирование подписи
    // generate signature
    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1:Shp_item=$shp_item");
    
    // форма оплаты товара
    // payment form
    print "<html>".
      "<form action='https://merchant.roboxchange.com/Index.aspx' method=POST>".
      "<input type=hidden name=MrchLogin value=$mrh_login>".
      "<input type=hidden name=OutSum value=$out_summ>".
      "<input type=hidden name=InvId value=$inv_id>".
      "<input type=hidden name=Desc value='$inv_desc'>".
      "<input type=hidden name=SignatureValue value=$crc>".
      "<input type=hidden name=Shp_item value='$shp_item'>".
      "<input type=hidden name=IncCurrLabel value=$in_curr>".
      "<input type=hidden name=Culture value=$culture>".
      "<input class='btn btn-default see_more' type=submit value='Оплатить'>".
      "</form></html>";
}

print '{"success":true,"result":"200","description":"OK"}';
