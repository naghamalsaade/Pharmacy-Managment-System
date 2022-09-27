<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoiceProduct extends Model
{
   use SoftDeletes;

     
   protected $fillable = [
      'invoice_id','bookIn_id','product_num','product_return','product_price','product_name'
   ];

   ##############################Relationships##############################

   public function book_in()
   {
      return $this->belongsTo('App\Models\BookIn','bookIn_id');
   }

   public function invoice()
   {
      return $this->belongsTo('App\Models\Invoice','invoice_id');
   }

   public function branch()
   {
      return $this->belongsTo('App\Models\Branch','branch_id');
   }
}
