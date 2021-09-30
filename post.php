<?php

	$service_url = '10.1.1.21/8082/U_COMSWR01.APW';
	$curl = curl_init($service_url);
	$curl_post_data = array(
	        'carga' => '00922501'

	);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}
	curl_close($curl);
	$decoded = json_decode($curl_response);
	if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
	    die('error occured: ' . $decoded->response->errormessage);
	}
	echo 'response ok!';

// $csv_array_chunk = array_chunk($csv_array, 10, false);
// foreach($csv_array_chunk as $chunk)
// {
//     $i = 0;
//     $temp_array = array();
//     foreach($chunk as $data)
//     {
//         $temp_array[$i]['NOME'] = $data[0];
//         $temp_array[$i]['DATAENT'] = $data[1];
//         $temp_array[$i]['DATASAI'] = $data[2];
//         $i++;
//     }
//     $json_data = json_encode(
//         array("invitations" => $temp_array)
//     );

//     $json_data = json_encode($temp_array);
//     $url = "http://10.5.0.100:8012/rest/csportaria";
//     $ch = curl_init($url);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                         
//         'Content-Type: application/json', 
//         'Content-Length: ' . strlen($json_data))
//     );
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");  
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
//     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
//     $json_result = curl_exec($ch); 
//     curl_close($ch);
    
//     $response_array = json_decode($json_result, true);
//     print_r($response_array);
// }
// exit;

?>