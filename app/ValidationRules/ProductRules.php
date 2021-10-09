<?php
namespace App\ValidationRules;



class ProductRules {





    public static function rules(){
        return [
            'name'          => 'required|string',
            'description'   => 'required|string',
            'price'         => 'required|numeric',
        ];
    }
} 