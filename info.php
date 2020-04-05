<?php
//config file to keep all the importanted information hidden
include 'config.php';

class ApiSteam {
    //Some steam profiles dont use a steamid in the url, this converts it to the 64bit steamid number
    function ResolveVanityURL ($userVanityURL){

      $urlApiSteam = Config::urlApiSteam;
      $apiKey = Config::apiKey;

      $curl = curl_init($urlApiSteam."ISteamUser/ResolveVanityURL/v0001/?key=".$apiKey."&vanityurl=".$userVanityURL);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $jsonObj = json_decode($response);
      curl_close($curl);
      //quick check if somebody typed in a wrong username, cant know if its wrong before the request
      return $returns = $jsonObj->response->steamid ?? 'Wrong username?';

    }
    // Get The user information we need
    function GetPlayerSummaries ($steamId){
      //multiple steamid's can be called at onces with a limit of upto 100
      //so if i use this in a script, have to max sure to limit it to 100 then recall it.
      $urlApiSteam = Config::urlApiSteam;
      $apiKey = Config::apiKey;
      //Empty array so we can fill it later
      $getPlayerSummaries = array();

      $curl = curl_init($urlApiSteam."ISteamUser/GetPlayerSummaries/v0002/?key=".$apiKey."&steamids=".$steamId);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      $response = curl_exec($curl);
      $result = json_decode($response, true);
      curl_close($curl);
        //loop the json and strip it down to the information we need
        foreach($result["response"]["players"] as $key => $results) {
          $personaName = $result["response"]["players"][$key]["personaname"];
          $steamId = $result["response"]["players"][$key]["steamid"];
          // echo $personaName;
            array_push($getPlayerSummaries,
                                  $result["response"]["players"][$key]["steamid"],
                                  $result["response"]["players"][$key]["personaname"],
                                  $result["response"]["players"][$key]["communityvisibilitystate"],
                                  $result["response"]["players"][$key]["avatarfull"],
                                  $result["response"]["players"][$key]["timecreated"],
                                  $result["response"]["players"][$key]["lastlogoff"]
                                  );

        }
      //return only the information we need so its nice and clean
      return $getPlayerSummaries;
      }

      function GetFriendList($steamId){
        var_dump($steamId);
        $urlApiSteam = Config::urlApiSteam;
        $apiKey = Config::apiKey;

        $curl = curl_init($urlApiSteam."ISteamUser/GetFriendList/v1/?key=".$apiKey."&steamid=".$steamId);
        print $curl;
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $result = json_decode($response, true);
        curl_close($curl);
        // var_dump($result);
        // return $result;

      }



}

// var_dump($api = new ApiSteam());
$api = new ApiSteam();
// var_dump($apis = $api -> idconverter("poi1i1i1i"));
// echo $api -> ResolveVanityURL("poi1i1i1i");
$apiJson = json_encode($api->GetFriendList("76561198186917545"));
print_r($apiJson);
// $api -> GetPlayerSummaries("76561198186917545,76561198175763541");

// $data = json_decode($api, true);
// var_dump($data);
// var_dump($api);
// 76561198186917545
