<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Products extends Model
{
    
    public $sortable = ['id', 'product_name','product_description','product_price', 'product_color','product_size',
    'product_image'.'discount','discounted_price','category_id','subcategory_id','created_at','updated_at'];
    
}
