<?php

if(!function_exists('carts')){
    function carts($newitem = null){
        if($newitem and $newitem['quantity'] and $newitem['product']){
            $carts = carts();
            $search = $carts->search(function ($item)use ($newitem){
                return $item->product->id = $newitem['product']->id;
        });
            if($search !== false){
                $carts[$search]->quantity++;
            }else{
                $carts->push($newitem);
            }
            session(["carts"=>json_encode($carts)]);
        }
        else{
                $temp = json_decode(session('carts',[]));
                return collect($temp);
        }
    }
}
