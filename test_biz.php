<?php

$user = [
    'id' => 20,
    'type_id' => 'test'
];

$template = '/api/items/%id%/%type_id%';
echo $template.PHP_EOL;

foreach ($user as $key => $value) {
    $template =  preg_replace("/%$key%/" , $value, $template)  ;
}
echo $template.PHP_EOL;

$user1 = [
    'id' => 20,
    'name' => 'John Dow',
    'role' => 'QA',
    'salary' => 100
];

$apiTemplatesSet1 = [
    "/api/items/%id%/%name%",
    "/api/items/%id%/%role%",
    "/api/items/%id%/%salary%"
];

$apiPathes = getApiPath($user1, $apiTemplatesSet1);

function getApiPath($user1, $apiTemplatesSet1) {      
    foreach ($user1 as $key => $value){
       if(preg_match('/\s/', $value)){
           $value = preg_replace('/\s/' , '%'.$user1['id'] , $value);
       }
       foreach ($apiTemplatesSet1 as &$val){
           $val = preg_replace("/%$key%/" , $value, $val)  ;
       }
    }
    return $apiTemplatesSet1;
}
echo json_encode($apiPathes, JSON_UNESCAPED_SLASHES);

?>
