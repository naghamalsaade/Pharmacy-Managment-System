<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;

use App\Notifications\ExpiredDateNotification;

use Carbon\Carbon;

use Notification;

use App\Models\BuyBillProduct;
use App\Models\DespoiledProduct;
use App\Models\BookIn;

use App\User;

class NotificationController extends Controller
{
    /**
     * notification when product Out Of Stock
     * 
     */
    public function amountOutOfStock()
    {
        $user = auth()->user();
        
        $users = User::where('branch_id', $user->branch_id)->get();

        $books = BookIn::join('buy_bill_products', 'books_in.buy_bill_product_id','=', 'buy_bill_products.id')
        ->join('buy_products', 'buy_bill_products.buy_product_id', '=', 'buy_products.id')
        ->where('branch_id', $user->branch_id)->where('amount','!=','0')
        ->where('books_in.is_amount_notify',0)
        ->select('books_in.id', 'amount', 'expired_date','buy_products.product_id')->get()->groupBy('product_id');

        foreach ($books as $book) 
        {
            if($book->sum('amount') <10)
            {
                foreach ($book as $book)
                {
                    Notification::send($users, new \App\Notifications\AmountNotification($book));
                    $book->update(['is_amount_notify' => 1]);
                    BookIn::find($book->id)->update(['is_amount_notify' => 1]);
                }
            }
        }
    }

    /**
     * notification when product Expired Date
     * 
     */
    public function expiredDate()
    {
        $user = auth()->user();

        $users = User::where('branch_id', $user->branch_id)->get();

        $books = BuyBillProduct::join('books_in', 'books_in.buy_bill_product_id', '=', 'buy_bill_products.id')
        ->where('branch_id', $user->branch_id)
        ->where('buy_bill_products.expired_date', '<=',  Carbon::today()->addDays(10))
        ->where('amount','!=','0')->where('books_in.is_expired_notify',0)->get();

        foreach ($books as $book) 
        {
            Notification::send($users, new ExpiredDateNotification($book));
            BookIn::find($book->id)->update(['is_expired_notify' => 1]);
        }
    }

    /**
    * spoliation Expired Date product 
    * 
    */
    public function spoliation($id)
    {
        $batch = BookIn::find($id);

        DespoiledProduct::create([
            'book_in_id' => $batch->id,
            'despoiled_amount' => $batch->amount,
            'expired_date' => $batch->buyBillProduct->expired_date,
            'is_destroyed' => '1' ,
            'is_retrieved' => '0' ,
        ]);

        $batch->update(['amount' => 0]);
        $batch->update(['is_active' => 0]);

        return redirect()->back();
    }

    /**
    * return Expired Date product 
    * 
    */
    public function return($id)
    {
        $batch = BookIn::find($id);

        DespoiledProduct::create([
            'book_in_id' => $batch->id,
            'despoiled_amount' => $batch->amount,
            'expired_date' => $batch->buyBillProduct->expired_date,
            'is_retrieved' => '1' ,
            'is_destroyed' => '0' ,
        ]);

        $batch->update(['amount' => 0]);
        $batch->update(['is_active' => 0]);

        return redirect()->back();
    }

    /**
    * show notification Expired Date product 
    * 
    */
    public function showExpiredNote($id, $note_id)
    {
        $book = BookIn::join('buy_bill_products', 'books_in.buy_bill_product_id', '=', 'buy_bill_products.id')
        ->join('buy_bills', 'buy_bill_products.buy_bill_id', '=', 'buy_bills.id')
        ->join('buy_orders', 'buy_bills.buy_order_id', '=', 'buy_orders.id')
        ->join('warehouses', 'buy_orders.warehouse_id', '=', 'warehouses.id')
        ->where('books_in.id', $id)
        ->select('books_in.id', 'amount', 'expired_date', 'warehouses.name as name_warehouse')->distinct()->get();

        auth()->user()->notifications->find($note_id)->markAsRead();
        return view('notification.expired_notification', compact('book'));
    }

    /**
    * how notification Out Of Stock product 
    * 
    */
    public  function showAmountOutOfStock($id, $note_id)
    {
        $book =  BookIn::join('buy_bill_products', 'books_in.buy_bill_product_id', '=', 'buy_bill_products.id')
        ->where('books_in.id',$id)->select('books_in.id', 'amount', 'expired_date')->get();

        auth()->user()->notifications->find($note_id)->markAsRead();
        return view('notification.amount_notification', compact('book'));
    }
}
