<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Stmt\Return_;

class Slider extends Model
{
    use HasFactory;
    protected $guarded =[];


    public  function getBigTittleAttribute(){
        if(app()->getLocale() == "en"){
            return  $this->big_title_en;
        }else{
            return  $this->big_title_ar;
        }
    }

    public function getSmallTittleAttribute(){
        if(app()->getLocale() == "en"){
            return  $this->small_title_en;
        }else{
            return  $this->small_title_ar;
        }
    }

}
