<?php

class modUpdateProcessor  extends modProcessor {
    
    public $classKey = 'modResource';
    public $id;
    protected $obj;
    protected $message = '';
    protected $post = array();
    public $success = false;
    
    public function initialize(){
        
        if (!empty($this->properties['id'])) {
            $this->id = $this->properties['id'];
        }
        $this->post = $this->getProperties();
        unset($this->post['id']);
        return parent::initialize();
        
        
    }
    
    public function success($message = '',$object = null){
        $this->setMessage($message);
        $this->success = true;
        return $this->modx->error->success($message,$object);
        
    }
    
    public function failure($message = '',$object = null){
        $this->setMessage($message);
        $this->success = false;
        return $this->modx->error->success($message,$object);
    }
    /*Проверка доступа*/
    public function checkAccess () {return true;}
    /*Валидация данных*/
    public function checkValidate () {return true;}
    
    protected function getMessage(){return $this->message;}
    protected function setMessage($message){$this->message = $this->message .','.$message;}
    
    public function process(){
        
        if (!$this->id){
            $this->failure('не указан id');
        }
        
        if (!$this->getObject()){
            $this->failure('обект не найден');
        }
        
        if (!$this->checkAccess()) {
            $this->failure('нет доступа');
        }
        
        if (!$this->checkValidate()) {
            $this->failure('не верный формат');
        }
        
        if ($this->success) {
            $this->obj->fromArray($this->set());
            $this->save();
        }


        return $this->outputArray($this->prepareResponse(), '');
    }
    
    public function getObject($id = null) {
        if ($id ){
            return $this->$obj = $this->modx->getObject($this->classKey,$id);
        }else{
            
            $c = $this->modx->newQuery($this->classKey);
            $c->where($this->where());
            return $this->obj = $this->modx->getObject($this->classKey,$c);
        }
    }

    public function where () {
        return array(
            'id' => $this->id,
        );
    }
    public function set() {
        return $this->post;
    }
    
    public function save() {
        $this->obj->save();
        $this->success();
    }
    
    /*
        Here you may add callback when caching anabled
    */
    protected function prepareResponse(){
        if (isset($this->obj)) return $this->obj->toArray();
        else return array();
    }

    public function outputArray(array $array, $count = false){
        $this->post['id'] = $this->id;
        return array(
            'success' => $this->success,
            'message' => $this->getMessage(),
            'count'   => count($array),
            'total'   => $count,
            'object'  => $array,
            'post'    => $this->post
        );

    }
}
return 'modUpdateProcessor';

