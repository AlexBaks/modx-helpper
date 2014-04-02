<?php
if($modx->event->name == 'OnHandleRequest'){
    $method = $modx->request->getResourceMethod();
    if ($method == 'alias') {
    	$resourceIdentifier = $modx->request->getResourceIdentifier($method);
    	$rAlias = $modx->getOption('request_param_alias', null, 'q');
    
        $params = array('users', 'album', 'avatar');

        foreach($params as $val){
            $matches = null;
        	if (preg_match("/^({$val})\/(.*)/", $resourceIdentifier, $matches)){
        		$q = $matches[1]; $u = $matches[2];
        		$_GET[$rAlias] = $q;
        		$_REQUEST[$rAlias] = $q;
        		if (isset($u) && $u != ''){
        			$_GET[$val] = $u;
        			$_REQUEST[$val] = $u;
        		}
                return;
        	}  
        }
    }
}
    
return;
