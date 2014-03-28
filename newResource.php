<?php
for ($i=0; $i<1000; $i++) {
    $new = $modx->newObject('modResource');
    $new->set('pagetitle',rand(10,10000000));
    $new->set('parent',4);
    $new->set('alias',rand(10,10000000));
    $new->set('cacheable',0);
    $new->set('published',1);
    $new->save();
}
