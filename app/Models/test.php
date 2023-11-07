<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;

    public function getdata() {
        $data = array(
            1 => array(
                'id' => 1,
                'name' => 'kinh doanh',
                'parent_id'=> '0'
            ),
            2 => array(
                'id' => 2,
                'name' => 'the thao',
                'parent_id'=> '0'
            ),
            3 => array(
                'id' => 3,
                'name' => 'marathon',
                'parent_id'=> '2'
            ),
            4 => array(
                'id' => 4,
                'name' => 'quoc te',
                'parent_id'=> '1'

            ),
            5 => array(
                'id' => 5,
                'name' => 'doanh nghiep',
                'parent_id'=> '1'

            ),
            6 => array(
                'id' => 6,
                'name' => 'bong da',
                'parent_id'=> '2'

            ),

            7 => array(
                'id' => 7,
                'name' => 'ronadol',
                'parent_id'=> '6'

            ),

            8 => array(
                'id' => 8,
                'name' => 'Con ronaldol',
                'parent_id'=> '7'

            ),
            9 => array(
                'id' => 9,
                'name' => 'hbi',
                'parent_id'=> '5'

            ),
        );


        return $data;
    }

    public function renderMenu($data, $parent_id = 0, $level = 0) {

        if( $level == 0 ) {
            $result = "<ul id='main-menu'>";
        } else {
            $result = " <ul class='sub-menu'>";
        }
        foreach ($data as $item ) {
            if ( $item['parent_id'] == $parent_id ) {
                $result .= "<li>";
                $result .= "<a href=''>".$item['name']."</a>";
                $result .= "</li>";
                $item['level'] = $level;

                if ( $this->hasChild($data, $item['id'])  ){
                    $result .=  $this->renderMenu($data, $item['id'], $level  + 1);

                }
            }

        }
        $result .= "</ul>";
        return $result;
    }

    public function hasChild($data, $id) {
        foreach ( $data as $item ) {
            if( $item['parent_id'] == $id) return true;
        }
        return false;
    }
}
