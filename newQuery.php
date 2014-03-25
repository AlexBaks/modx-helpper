<?
$start = microtime(true);
$packageName = 'migx';
$packagepath = $this->modx->getOption('core_path') . 'components/' . $packageName . '/';
$modelpath = $packagepath . 'model/';
$prefix = null;
$modx->addPackage($packageName, $modelpath, $prefix);

$q = $modx->newQuery('migxConfig');

$q->where(array(
    'name' => 'catalog'
    ,'deleted' => 0
));

$q->select(array(
   'migxConfig.*'
));


//$total = $modx->getCount('migxConfig', $q);
$q->prepare();
$q->stmt->execute();
$result = $q->stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($result);
echo "</pre>";
$end = microtime(true);$end = $end - $start;echo  sprintf("%2.4f s", $end);
