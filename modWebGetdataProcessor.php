<?
require_once dirname(dirname(__FILE__)) . '/getdata.class.php';
class modWebOfferGetdataProcessor extends modWebGetdataProcessor
{   
    public $classKey = 'ecaOffer';
    
    
    public function initialize(){
        return parent::initialize();
    }
    
    protected function prepareCountQuery(xPDOQuery & $query){
        if($where = (array)$this->getProperty('where')){
            
            /*Фильтр по операции*/
                switch($where['operation']) {
    			case 'buy' :
    			    $where['operation'] = 1;
    			break;
    			
    			case 'sell' :
    				$where['operation'] = 2;
    			break;
    				 
    			case 'change' : 
    				$where['operation'] = 3;
    			break;
    			
    			default : 
    				$where['operation'] = 2;
		    }
            /*Фильтр по дате*/
    		$ts = strtotime($where['activateon']);
    		if($ts > 0) {
    			$where['activateon'] = date('Y-m-d', $ts);
    		}                
               
            $where['active'] = true;
            //$where['createdby'] = 0;
            
            $query->where($where);
        }
        return $query;
    }
    
    
    public function prepareQueryBeforeCount (xPDOQuery & $c)
    {

        $c->innerJoin('modUser','Client','Client.id = ecaOffer.createdby');
		$c->innerJoin('ecaSystem','HaveSystem','HaveSystem.id = have_system_id');
		$c->innerJoin('ecaSystem','WantSystem','WantSystem.id = want_system_id');
		$c->innerJoin('ecaCurrency','HaveCurrency','HaveCurrency.id = have_currency_id');
		$c->innerJoin('ecaCurrency','WantCurrency','WantCurrency.id = want_currency_id');
				
		return $c->select(
			'ecaOffer.*'.
			', Client.username AS client'.
			', Client.id AS client_id'.
			', HaveSystem.name AS have_system'.
			', WantSystem.name AS want_system'.
			', HaveSystem.image AS have_system_image'.
			', WantSystem.image AS want_system_image'.
			', HaveCurrency.name AS have_currency'.
			', WantCurrency.name AS want_currency'
		);
    }
}
