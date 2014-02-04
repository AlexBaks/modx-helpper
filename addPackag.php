$packageName = 'formsave';
$base_path =  $modx->getOption('core_path');
$modx->addPackage($packageName,$base_path.'components/'.$packageName.'/model/');


/*загрузка эвентов*/

$q = $modx->newQuery('fsForm');
$q->select(array(
    'fsForm.id'
));
    
/*
$q->where(array(
    'parent' => '444',
    'published' => true
));
*/

$q->prepare();  
$q->stmt->execute();

$res = $q->stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($res as $val) {
    echo "<pre>";
    print_r($val);
    echo "</pre>";
}
