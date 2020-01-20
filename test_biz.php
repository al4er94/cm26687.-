
<?php

echo '123_321';

$user = [
    'id' => 20,
    'type_id' => 'test'
];

$tamplate = '/api/items/%id%/%type_id%';
echo '</br>';
echo $tamplate;

foreach ($user as $key => $value) {
    $search = '%'.$key.'%';
    $tamplate = str_replace($search, $value, $tamplate);
}
echo '</br>';
echo $tamplate;



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

//$apiPathes = $apiTemplatesSet1.map($apiPathTemplate => {
//return getApiPath($user, $apiPathTemplate);
//});

$apiPathes = getApiPath($user1, $apiTemplatesSet1);

function getApiPath($user1, $apiTemplatesSet1) {      
    foreach ($user1 as $key => $value){
        foreach ($apiTemplatesSet1 as &$val){
            $search = '%'.$key.'%';
            $val = str_replace($search, $value, $val);
        }
    }
    return $apiTemplatesSet1;
}
echo '</br>';
echo json_encode($apiPathes, JSON_UNESCAPED_SLASHES);

// ["/api/items/20/John%20Dow","/api/items/20/QA","/api/items/20/100"]
 ?>