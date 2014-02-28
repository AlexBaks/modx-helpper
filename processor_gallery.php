<?php

class BerlinElementsAlbumGetItemsListProcessor extends modObjectGetListProcessor{
    public $classKey = 'galItem';
    public $defaultSortField  = 'rank';
    protected $album = null;
    
    public function initialize() {
        if(!$this->album = $this->getProperty('album', false)){
            return 'Не был получен ID альбома';
        }
        return parent::initialize();
    }

    public function outputArray(array $array, $count = false) {
        return $this->success($count, $array);
    }

    public function prepareRow(xPDOObject $object) {
        $row = $object->toArray();
        $row['image_url'] = $object->get('absoluteImage');
        $row['image_thumb'] = $object->get('thumbnail');
        return $row;
    }
    
    public function prepareQueryBeforeCount(xPDOQuery $c) {
        $c->innerJoin('galAlbumItem', 'AlbumItems');
        
        $where = array(
            'AlbumItems.album' => $this->album,
            'active'    => 1,
        );
        
        $c->where($where);
        return parent::prepareQueryBeforeCount($c);
    }
}
return 'BerlinElementsAlbumGetItemsListProcessor';
