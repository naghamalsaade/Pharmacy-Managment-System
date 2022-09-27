<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class IrIp extends Model
{
   use SoftDeletes;

   protected $fillable = [
      'ip_id','ri_id','num_pr'
   ];

   ##############################Relationships##############################

   public function returnInvoice()
   {
      return $this->belongsTo('App\Models\ReturnInvoice','ri_id');
   }

   public function invoiceProduct()
   {
      return $this->belongsTo('App\Models\InvoiceProduct','ip_id');
   }
}
