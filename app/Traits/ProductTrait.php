<?php

namespace App\Traits;


use App\Models\BuyBillProduct;
use Illuminate\Support\Facades\File;

Trait ProductTrait
{
    public function saveImage($image , $folder)
    {
        //save image in folder
        $file_extension = $image  -> getClientOriginalExtension();
        $file_name = time().'.'.$file_extension;
        $path = $folder;
        $image  -> move($path, $file_name);
        return $file_name;
    }

    public function deleteImage($image , $folder)
    {
        //delete image in folder
        $file_name = $folder.$image;
        if (File::exists($file_name))
        File::delete($file_name);

    }

    public function getProductInPharmacy($product)
    {
      return $product -> join('products', $product->getTable().'.'.'product_id', '=', 'products.id')
        ->join('buy_products', 'products.id', '=', 'buy_products.product_id')
        ->join('buy_orders', 'buy_products.buy_order_id', '=', 'buy_orders.id')
        ->join('buy_bill_products', 'buy_products.id', '=', 'buy_bill_products.buy_product_id')
        ->join('warehouses', 'buy_orders.warehouse_id', '=', 'warehouses.id')
        ->join('books_in', 'buy_bill_products.id', '=', 'books_in.buy_bill_product_id');
       // ->where('products.is_active', 1);

       // ->where('books_in.branch_id', $id);
    }

    public function getProductInInventory($product)
    {
       return BuyBillProduct::join('buy_bills', 'buy_bill_products.buy_bill_id', '=', 'buy_bills.id')
        ->join('users', 'buy_bills.user_id', '=', 'users.id')
        ->join('buy_products', 'buy_bill_products.buy_product_id', '=', 'buy_products.id')
        ->join('products', 'buy_products.product_id', '=', 'products.id')
        ->join($product->getTable(), 'products.id', '=', $product->getTable().'.'.'product_id');
    }
}
