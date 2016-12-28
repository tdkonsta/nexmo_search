<?php
$url = 'https://api.nexmo.com/ni/advanced/json?' . http_build_query(
    [
        'api_key' => 'key',
        'api_secret' => 'secret',
        'number' => $_POST['phone']
    ]
);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$json = json_decode($response);
header('Content-type: application/json');
//echo json_encode($json, JSON_PRETTY_PRINT);
echo  "Status : " .  $json->status . " " . $json->status_message;
echo  "\nLookup outcome : " . $json->lookup_outcome . " " . $json->lookup_outcome_message;
echo  "\nNumber : " .  $json->international_format_number;
echo  "\nCountry: " .  $json->country_name;
echo  "\nValid : " . $json->valid_number;
echo  "\nReachable : " . $json->reachable;
echo  "\nCurrent carrier  : " . $json->current_carrier->name . $json->current_carrier->network_type;
echo  "\nRoaming : " .  $json->roaming->status;
?>
