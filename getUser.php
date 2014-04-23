<?php
/*
$usersGroup = $modx->getObject('modUserGroup', array('name' => 'Administrator') );
$u =$usersGroup->getUsersIn();
echo "<pre>";
foreach ($u as $val) {
   // $profile = $val->getOne('Profile');
   // print_r($profile->toArray());
    print_r($val->toArray());
}
*/

$modx->setLogLevel('1');
 
$c = $modx->newQuery('modUserGroupMember',array('user_group'=>1));
 
$c->leftJoin('modUser','User',"User.id = modUserGroupMember.member");
$c->leftJoin('modUserProfile','Profile',"Profile.id = modUserGroupMember.member");
 
$c->select(array(
    
    'modUserGroupMember.*',
    'User.*',
    'Profile.*'
));
 
print '<pre>';
$c->prepare();
 
print $c->toSQL();
 
if($c->stmt->execute()){
    
    while($row = $c->stmt->fetch(PDO::FETCH_ASSOC)){
        
        print_r($row);
        
    }    
}
