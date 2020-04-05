<?php


class arrayClass{

  function arraynumberone(){

    $arrayNamesnumberone = array(
                      '1' => 'number 1',
                      '2' => 'number 2',
                      '3' => 'number 3');

    // print_r ($arrayName);
    return $arrayNamesnumberone;
  }


  function arraynumbertwo(){
    $arrayNamesnumberone = array(
                      '5' => 'number 5',
                      '4' => 'number 4',
                      '6' => 'number 6');

    // print_r ($arrayName);
    return $arrayNamenumbertwo;
  }

}

$arrayclasscall = new arrayClass();
$arrayclass = json_encode($arrayclasscall->arraynumberone());
print_r($arrayclass);




 ?>
