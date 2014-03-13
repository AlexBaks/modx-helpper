<?
$processorProps = array("limit" => $limit,'start' => $page);
$otherProps = array(
    'processors_path' => $modx->getOption('core_path') . 'components/modxsite/processors/'
);
$response = $modx->runProcessor('web/adverts/getdata', $processorProps, $otherProps);
