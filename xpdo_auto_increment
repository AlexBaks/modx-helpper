<?php
$sql = "SHOW TABLE STATUS LIKE 'modx_formsave_forms'";
$q = $modx->prepare($sql);
$q->execute(array(0));
$arr = $q->fetchAll(PDO::FETCH_ASSOC);

foreach ($arr as $val) {
    echo $val['Auto_increment'];
}   
