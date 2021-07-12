<?php
    namespace App\Components;

use App\Category;

class Recusive {
        private $data;
        private $htmlSlelect = '';
        
        public function __construct()
        {
            $this->html = '';
        }


        public function categoryRecusive($parentId = 0, $subMark = '')
        {
            $data = Category::where('parent_id',$parentId)->get();
            foreach ($data as $dataItem ) {
              if($dataItem->parent_id !=0)
              {
                $this->html .= '<option value = "' . $dataItem->id. '">'. $subMark . $dataItem->name. '</option>';
              } else {
                $this->html .= '<option value = "' . $dataItem->id. '">'. $dataItem->name. '</option>';
              }
              $this->categoryRecusive($dataItem->id,$subMark = "- ");
            }
            
            return $this->html;
        }
    }
?>