<?php
if (!empty($_SERVER['REQUEST_URI']) and strpos($_SERVER['REQUEST_URI'], "product") !== false || strpos($_SERVER['REQUEST_URI'], "offer") !== false || strpos($_SERVER['REQUEST_URI'], "blog") !== false) {



  if (strpos($_SERVER['REQUEST_URI'], "product") !== false) {
    $type = 'products';
  } elseif (strpos($_SERVER['REQUEST_URI'], "offer") !== false) {
    $type = 'offer';
  } elseif (strpos($_SERVER['REQUEST_URI'], "blog") !== false) {
    $type = 'article';
  } 

  $value  = $easyfie->SingleData($token, $type, $id);

  

  


  if (@$value->data->remark == '') {
    if (@$value->data->type === 0) {
      $type = 'New';
    } else {
      $type = 'Used';
    }
  } elseif (@$value->data->remark == 'Offer') {
    $type = $value->data->type2;
  } elseif (@$value->data->remark == 'Shout') {
    $type = $$value->data->type2;
  } elseif (@$value->data->remark == 'Service') {
    $type = 'New';
  }

  // print_r($infos[0]['view']); die;


} else {
  echo 'Something went wrong..';
  exit;
}
