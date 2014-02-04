<?php
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/connectors/index.php';

$modx->runSnippet('FormIt', array(
    'hooks'=>'email,FormSave'
    ,'emailSubject'=>$modx->getOption('site_name')
    ,'emailTo'=>$modx->getOption('site_mail')
    ,'emailFromName'=>'От кого пришло'
));

print '{"success":true,"result":"200","description":"OK"}';
