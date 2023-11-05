<?php
$clientId = "client_id";
$clientSecret = "client_secret";
$env = "test";

#config objs
$baseUrls = array(
    'prod' => 'https://payout-api.cashfree.com',
    'test' => 'https://payout-gamma.cashfree.com',
);

$urls = array(
    'auth' => '/payout/v1/authorize',
    'requestBatchTransfer' => '/payout/v1/requestBatchTransfer',
    'getBatchTransferStatus' => '/payout/v1/getBatchTransferStatus?batchTransferId=',
);

$batchTransfer = array(
    'batchTransferId' => 'Test_Bank_Account_Format_22',
    'batchFormat' => 'BANK_ACCOUNT',
    'deleteBene' => 1,
    'batch' => [ 
        ["transferId" => "PTM_00121241112", "amount" => "12", "phone" => "9999999999", "bankAccount" => "9999999999" , "ifsc" => "PYTM0_000001", "email" => "bahrat@gocashfree.com", "name" => "bharat"] ]
);

$header = array(
    'X-Client-Id: '.$clientId,
    'X-Client-Secret: '.$clientSecret, 
    'Content-Type: application/json',
);

$baseurl = $baseUrls[$env];

function create_header($token){
    global $header;
    $headers = $header;
    if(!is_null($token)){
        array_push($headers, 'Authorization: Bearer '.$token);
    }
    return $headers;
}

function post_helper($action, $data, $token){
    global $baseurl, $urls;
    $finalUrl = $baseurl.$urls[$action];
    $headers = create_header($token);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_URL, $finalUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
    if(!is_null($data)) curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
    
    $r = curl_exec($ch);
    
    if(curl_errno($ch)){
        print('error in posting');
        print(curl_error($ch));
        die();
    }
    curl_close($ch);
    $rObj = json_decode($r, true);    
    if($rObj['status'] != 'SUCCESS' || $rObj['subCode'] != '200') throw new Exception('incorrect response: '.$rObj['message']);
    return $rObj;
}

function get_helper($finalUrl, $token){
    $headers = create_header($token);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $finalUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch,  CURLOPT_RETURNTRANSFER, true);
    
    $r = curl_exec($ch);
    
    if(curl_errno($ch)){
        print('error in posting');
        print(curl_error($ch));
        die();
    }
    curl_close($ch);

    $rObj = json_decode($r, true);    
    if($rObj['status'] != 'SUCCESS' || $rObj['subCode'] != '200') throw new Exception('incorrect response: '.$rObj['message']);
    return $rObj;
}

#get auth token
function getToken(){
    try{
       $response = post_helper('auth', null, null);
       return $response['data']['token'];
    }
    catch(Exception $ex){
        error_log('error in getting token');
        error_log($ex->getMessage());
        die();
    }

}

#request batch transfer
function requestBatchTransfer($token){
    try{
        global $batchTransfer;
        $response = post_helper('requestBatchTransfer', $batchTransfer ,$token);
        error_log('batch transfer successfully requested');
    }
    catch(Exception $ex){
        error_log('error in requesting batch transfer');
        error_log($ex->getMessage());
        die();
    }
}

#get batch transfer status
function getBatchTransferStatus($token){
    try{
        global $batchTransfer, $baseurl, $urls;
        $finalUrl = $baseurl.$urls['getBatchTransferStatus'].$batchTransfer['batchTransferId'];
        $response = get_helper($finalUrl, $token);
        error_log(json_encode($response));
    }
    catch(Exception $ex){
        error_log('error in getting batch transfer status');
        error_log($ex->getMessage());
        die();
    }
}

#main execution
$token = getToken();
requestBatchTransfer($token);
getBatchTransferStatus($token);

?>
