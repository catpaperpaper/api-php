<?php
function get_data_from_api() {
    $api_url = "https://cleemakethings.com/api/api.php/question/id/";
    $random = rand(1,216800);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $api_url . "$random",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "cache-control: no-cache"
    ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    $data = json_decode($response, true);

    return $data;
}

$d = get_data_from_api();
//print_r($d);

$question = $d[0]["question"];
$answer = $d[0]["answer"];
$value = $d[0]["value"];
$round = $d[0]["round"];
$id = $d[0]["id"];
$category = $d[0]["category"];

echo "<h1>That famous quiz show</h1>";
echo "<p id=question>Q: $question</p>";
echo "<p><button id=answer_btn onclick=javascript:showDiv();>Answer</button></p>";
echo "<p id=answer style=\"display:none\">A: $answer</p>";
echo "<p id=info><small>Category: $category Value: $value ($round) #$id</small></p>";
echo "<p><button onClick=\"window.location.reload();\">Reload</button></p>";
echo "<script language='javascript'>function showDiv(){div=document.getElementById('answer');div.style.display='block';}</script>";
