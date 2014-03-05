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

// вариант 2

$packageName = 'catalog';
$base_path =  $modx->getOption('core_path');
$success = $modx->addPackage($packageName,$base_path.'components/'.$packageName.'/model/','modx_');
echo "\naddPackage " . ($success? 'OK' : 'Failed');
$success = $modx->loadClass('CatalogContent');
echo "\nloadClass " . ($success  ? 'OK' : 'Failed');
$access = $modx->getObject('CatalogContent', 1);
echo '<pre>';
print_r($access->toArray());
echo '<pre>'; 
