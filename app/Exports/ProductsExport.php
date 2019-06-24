<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('product_name', 'cat_id', 'sup_id', 'product_code', 'product_garage', 'product_route', 'product_image', 'product_buy_date', 'product_expire_date', 'buying_price','selling_price')->get();
    }

    
}
