<?php
    if($_POST) {

        $json_a = json_decode(stripslashes($_POST['data']),true);

        $inputTag1 = strip_tags($_POST['tag1']);
        $inputTag2 = strip_tags($_POST['tag2']);
        $inputTag3 = strip_tags($_POST['tag3']);

        $new_json_a =array();

        if(strlen($inputTag1)>0){
            for($iter = 0; $iter<count($json_a); $iter++){
                for($i = 0; $i<count($json_a[$iter]['tags']) ;$i++) {
                    if($json_a[$iter]['tags'][$i] == $inputTag1) {
                        array_push($new_json_a, $json_a[$iter]);
                        break;
                    }
                }
            }
            $json_a = $new_json_a;
            $new_json_a = array();
        }

        if(strlen($inputTag2)>0){
            for($iter = 0; $iter<count($json_a); $iter++){
                for($i = 0; $i<count($json_a[$iter]['tags']) ;$i++) {
                    if($json_a[$iter]['tags'][$i] == $inputTag2) {
                        array_push($new_json_a, $json_a[$iter]);
                        break;
                    }
                }
            }
            $json_a = $new_json_a;
            $new_json_a = array();
        }

        if(strlen($inputTag3)>0){
            for($iter = 0; $iter<count($json_a); $iter++){
                for($i = 0; $i<count($json_a[$iter]['tags']) ;$i++) {
                    if($json_a[$iter]['tags'][$i] == $inputTag3) {
                        array_push($new_json_a, $json_a[$iter]);
                        break;
                    }
                }
            }
            $json_a = $new_json_a;
            $new_json_a = array();
        }

        $selectedFormat = strip_tags($_POST['selectFormat']);
        if($selectedFormat != 'all'){
            for($iter = 0 ; $iter<count($json_a); $iter++) {
                if($json_a[$iter]['format'] == $selectedFormat){
                    array_push($new_json_a, $json_a[$iter]);
                }
            }
            $json_a = $new_json_a;
            $new_json_a = array();
        }


        $selectedRating = strip_tags($_POST['rating_order']);
        if($selectedRating == 'ascending'){
            usort($json_a, function($a, $b) {
                return ($a['rating'] - $b['rating']);
            });
        }
        else if($selectedRating == 'descending') {
            usort($json_a, function($a, $b) {
                return -($a['rating'] - $b['rating']);
            });
        }

        $selectedDateTime = strip_tags($_POST['date_order']);
        if($selectedDateTime == 'ascending'){
            usort($json_a, function($a, $b) {
                return (strtotime($a['dateTime']) - strtotime($b['dateTime']));
            });
        }
        else if($selectedDateTime == 'descending') {
            usort($json_a, function($a, $b) {
                return -(strtotime($a['dateTime']) - strtotime($b['dateTime']));
            });
        }


        $json_data = json_encode($json_a);

        echo $json_data;
    }
?>