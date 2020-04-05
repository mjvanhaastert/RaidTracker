<?php
$urlApiSteam = "http://api.steampowered.com/";
$apiKey = "6E7AD57788A4BAFCB1ACAD6A20F794A1";
// Declaring your config class constants
class Config {
    const urlApiSteam = "http://api.steampowered.com/",
          apiKey      = "6E7AD57788A4BAFCB1ACAD6A20F794A1";
}



// $getPlayerSummaries = array[
// "steamid" => $steamId,
// "personaname" => $personaName,
// "bar" => "foo",
// ];


// echo $key;
// echo $steamId = $result["response"]["players"][$key]["steamid"];//64 bit steamid
// echo $avatarFull = $result["response"]["players"][$key]["avatarfull"];//large avatar url
// echo $communityVisibilityState = $result["response"]["players"][$key]["communityvisibilitystate"];//1 - the profile is not visible to you (Private, Friends Only, etc), 3 - the profile is "Public", and the data is visible.
// $lastlogoff = $result["response"]["players"][$key]["lastlogoff"];//in unix time. Only available when you are friends with the requested user
// echo " -  last time logoff different method : ".(date("H:i:s - d F Y", $lastlogoff));

// $timecreated = $result["response"]["players"][$key]["timecreated"];//in unix time.
// echo "Profiel creating date : ".gmdate("TH:i:s\Y-m-d\Z", $timecreated);
// echo $personaName = $result["response"]["players"][$key]["personaname"];//nickname
