<?php

class draw {

    public function displaySelectData($display_data, $master_data){

        if(isset($master_data) && is_array($master_data)) {
            foreach($master_data as $select_data) {
                if($display_data == $select_data['GENDER_ID']) {
                    $data = $select_data["NAME"];
                    return $data;
                }
            }
        }else if(isset($master_data) && !is_array($master_data)) {
            return;
        }

    }

}
