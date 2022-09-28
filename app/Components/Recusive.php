<?php

namespace App\Components;

class Recusive {

    private $htmlSelect = '';
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function recusive($parent_id, $id = 0, $text = '')
    {
       
        foreach($this->data as $value)
        {
            if($value['parent_id'] == $id)
            {
                if($value['id'] == $parent_id && !empty($parent_id))
                {
                    $this->htmlSelect .= "<option selected value='".$value['id']."'>".$text.$value['name']."</option>";
                }
                else
                {
                    $this->htmlSelect .= "<option value='".$value['id']."'>".$text.$value['name']."</option>";
                }
                // echo "<option>".$text.$value['name']."</option>";// trong thuc te khong nen dung echo
                
                $this->recusive($value['id'], $text. '-');
            }
        } 
        
        return $this->htmlSelect;  //tra ve chuoi htmlSelect
    }

}