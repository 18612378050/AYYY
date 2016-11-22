<?php
    $ch = curl_init();
    $url = 'http://apis.baidu.com/apistore/weatherservice/recentweathers?cityid=101010100';
    $header = array(
        'apikey: 5ac2ee303e50b87031875e475f0dfefd',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);

    $arr_json = json_decode($res);
    if($arr_json->errMsg==="success"){
        $week = date("w");
        if($week==0){
            $week = 7;
        }
        $arr_info = array();
        // $i=1;
        // $max=7;
        // if(7-$week>4){
        //     $i=5-(7-$week);
        //     $max=7-1+$i;
        // }else{
        //     $i=1;
        //     $max=7;
        // }
        // $index = 0;
        // for(;$i<=$max;$i++){
        //     if($i-$week<0){
        //         $arr_info[$index] = $arr_json->retData->history[7+$i-$week];
        //          $index++;
        //     }else if($i-$week>0){
        //         $arr_info[$index] = $arr_json->retData->forecast[$i-$week-1];
        //          $index++;
        //     }else{
        //     }
            
        // }

        $arr_info[0] = $arr_json->retData->history[5];
        $arr_info[1] = $arr_json->retData->history[6];
        $arr_info[2] = $arr_json->retData->forecast[0];
        $arr_info[3] = $arr_json->retData->forecast[1];
        $arr_info[4] = $arr_json->retData->forecast[2];
        $arr_info[5] = $arr_json->retData->forecast[3];
        $json = array("errMsg"=>"success","city"=>$arr_json->retData->city,"cityid"=>$arr_json->retData->cityid,"other"=>$arr_info,"today"=>$arr_json->retData->today);
        echo json_encode($json);      
    }else{
        echo "{'errMsg':'error'}";
    }


?>