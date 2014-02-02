<?php
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/connectors/index.php';

$modx->runSnippet('FormIt', array(
    'hooks'=>'email,FormSave'
    ,'emailSubject'=>$modx->getOption('site_name')
    ,'emailTo'=>$modx->getOption('site_mail')
));


print '{"success":true,"result":"200","description":"OK"}';