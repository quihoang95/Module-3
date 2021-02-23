<?php


namespace App;


class Cart
{

    public $items =[];
    public $totalPrice = 0;
    public $totalQty = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;
        }
    }
    function add($product){
        $storeItem = [
            "product"=>$product,
            "totalQty"=>0,
            "totalPrice"=>0,
        ];
        if(array_key_exists($product->id,$this->items)) {
            $storeItem = $this->items[$product->id];
        }
        $storeItem['totalQty']++;
        $storeItem['totalPrice']+=$product->price;
        $this->items[$product->id] = $storeItem;
        $this->totalQty++;
        $this->totalPrice+=$product->price;
    }
    function minus($product){
        $storeItem = [
            "product"=>$product,
            "totalQty"=>0,
            "totalPrice"=>0,
        ];
        if(array_key_exists($product->id,$this->items)) {
            $storeItem = $this->items[$product->id];
        }
        $storeItem['totalQty']--;
        $storeItem['totalPrice']-=$product->price;
        $this->items[$product->id] = $storeItem;
        $this->totalQty++;
        $this->totalPrice-=$product->price;
    }

    function remove($product){
        if(array_key_exists($product->id,$this->items)) {
            $deleteItem = $this->items[$product->id];
            $this->totalQty -= $deleteItem['totalQty'];
            $this->totalPrice -= $deleteItem['totalPrice'];
            unset($this->items[$product->id]);
        }
    }

}
