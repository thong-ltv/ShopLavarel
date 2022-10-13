<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecusive {
    private $html;
    public function __construct()
    {
        $this->html = '';
    }
    public function menuRecusiveAdd($parent_id = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parent_id)->get();
        foreach($data as $dataItem)
        {       
            $this->html .= '<option value='.$dataItem->id.'>'.$subMark.$dataItem->name.'</option>';
                      
            $this->menuRecusiveAdd($dataItem->id, $subMark.'--');
        }
        return $this->html;
    }

    public function menuRecusiveEdit($menuEditId, $parent_id = 0, $subMark = '')
    {
        $data = Menu::where('parent_id', $parent_id)->get();
        foreach($data as $dataItem)
        {      
            if($menuEditId == $dataItem->id)
            {
                $this->html .= '<option selected value='.$dataItem->id.'>'.$subMark.$dataItem->name.'</option>';
            }else {
                $this->html .= '<option value='.$dataItem->id.'>'.$subMark.$dataItem->name.'</option>';
            }
                      
            $this->menuRecusiveEdit($menuEditId, $dataItem->id, $subMark.'--');
        }
        return $this->html;
    }
}