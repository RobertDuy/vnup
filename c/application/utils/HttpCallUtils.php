<?php

class HttpCallUtils {

    /**
     * @param array $param
     * @param $type  POST or GET
     */
    public static function makeHttpCall($host, $param = array(), $type, $headerParam = array()){
        $url = $host;
        $fields_string = '';
        foreach($param as $key=>$value) {
            $fields_string .= $key.'='.$value.'&';
        }
        rtrim($fields_string, '&');
        //open connection
        $ch = curl_init();

        if(count($headerParam)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headerParam);
        }

        //set the url, number of POST vars, POST data
        if($type === 'POST'){
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($param));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        }else if($type === 'GET'){
            curl_setopt($ch,CURLOPT_URL, $url .'?'. $fields_string);
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }

    public static function fetchBasicProfile($access_token){
        return HttpCallUtils::fetchLinkinProfile('', '', array(), $access_token);
    }

    public static function fetchLinkinProfile($method, $resource = '', $params = array(), $access_token) {
        if(empty($method)) $method = 'GET';
        if(empty($resource)){
            $resource = '/v1/people/~:(id,first-name,last-name,maiden-name,specialties,num-connections,picture-url,email-address,location:(name))';
        }

        $opts = array(
            'http' => array(
                'method' => $method,
                'header' => "Authorization: Bearer " .
                     $access_token . "\r\n" .
                    "x-li-format: json\r\n"
            )
        );
        $url = 'https://api.linkedin.com' . $resource;
        if (count($params)) {
            $url .= '?' . http_build_query($params);
        }
        $context = stream_context_create($opts);
        $response = file_get_contents($url, false, $context);
        return json_decode($response);
    }
}