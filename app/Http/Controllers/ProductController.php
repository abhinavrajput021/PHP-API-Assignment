<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    
     function addProduct(Request $request){

        $rules = array(
            'name'=>'required | max:255',
            "price"=>'integer | required | min:0',
            "quantity"=>'integer | required | min:1'
            
        );

        $validation = Validator::make($request->all(),$rules);
        
        if($validation->fails()){
            return $validation->errors();
        }
        else{

            $id = 1;
            $product=array("id"=>$id,"name"=>$request->name,"description"=>$request->description,"price"=>$request->price,"quantity"=>$request->quantity);

            return $product;
        }
    } 


    function show($id){
        $product=array("id"=>$id,"name"=>"Apple","description"=>"Its a nice fruit","price"=>5,"quantity"=>10);
        return $product;
    }


    function updateProduct($id, Request $request){
        $product=array("id"=>$id,"name"=>"Apple","description"=>"Its a nice fruit","price"=>5,"quantity"=>10);
        
         $product['name']= $request->name;
         $product['description']= $request->description;
         $product['price']= $request->price;
         $product['quantity']= $request->quantity; 

        return $product;

    }

}