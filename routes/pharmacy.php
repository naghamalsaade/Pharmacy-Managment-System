<?php

/*
|--------------------------------------------------------------------------
| Pharmacy Routes
|--------------------------------------------------------------------------
|
| Here is where you can register pharmacy routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    Route::group(['namespace' => 'pharmacy'], function () {

        /*--------------------------------------------------------------------------
        | PharmacyController
        |-------------------------------------------------------------------------*/
        Route::group(['prefix' => 'pharmacy'], function () {
            //show all pharmacies
            Route::get('all','PharmacyController@all');

            //show all customer in specific pharmacy
            Route::get('customers-list/{branch_id}','PharmacyController@allCustomer');

            //show all customer that have reckonings in specific pharmacy
            Route::get('customers-have-reckonings-list/{branch_id}','PharmacyController@customerHaveReckon');

            //show all invoices in pharmacy
            Route::get('invoices/{type_file}/{branch_id}','PharmacyController@allInvoice');

            //show all return invoices in specific pharmacy
            Route::get('return-invoices/{type_file}/{id}','PharmacyController@allReturnInvoice');

            //show all reckonings in specific pharmacy
            Route::get('reckonings-list/{branch_id}','PharmacyController@allReckoning');

            //show all payments in specific pharmacy
            Route::get('payments-list/{branch_id}','PharmacyController@allPayment');

            //show all medicins in specific pharmacy
            Route::get('medicins-list/{branch_id}','PharmacyController@allMedicine');

            //show all medical supplies in specific pharmacy
            Route::get('supplies-list/{branch_id}','PharmacyController@allSupply');

            //show all medical foods in specific pharmacy
            Route::get('foods-list/{branch_id}','PharmacyController@allFood');

            //show all cosmetic products in specific pharmacy
            Route::get('cosmetic-list/{branch_id}','PharmacyController@allCosmetic');

        });

        /*--------------------------------------------------------------------------
        | PharmacyRuleController
        |--------------------------------------------------------------------------*/
        Route::group(['prefix' => 'pharmacy-rule'], function () {

            //add pharmacy rules
            Route::get('add','PharmacyRuleController@add');
            Route::post('store','PharmacyRuleController@store');

            //show all pharmacy rules
            Route::get('all','PharmacyRuleController@all');

            //delete pharmacy rule
            Route::get('delete/{id}','PharmacyRuleController@delete');

            //edite pharmacy rule
            Route::get('edit/{id}','PharmacyRuleController@edit');
            Route::post('update/{id}','PharmacyRuleController@update');
        });


        /*--------------------------------------------------------------------------
        | CustomerController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Customer', 'prefix' => 'customer'], function () {

            //show all customer in all pharmacies
            Route::get('all','CustomerController@all');

            //show all customer in all pharmacies
            Route::get('all-in-pharmacy','CustomerController@allInPharmacy');

            //show all customer in pharmacy
            //Route::get('customer-list','CustomerController@allCustomer'); 

            //show all customer that have reckonings
            Route::get('have-reckone','CustomerController@customerHaveReckon');
            
            //show all customer that have reckonings  in pharmacy
            Route::get('have-reckone-in-pharmacy','CustomerController@haveReckonInPharmacy');

            //show all invoices customer
            Route::get('invoices/{list}/{customer_id}','CustomerController@allInvoice');

            //show all invoices customer in specific pharmacy
            Route::get('invoices/{list}/{customer_id}/{branch_id}','CustomerController@allInvoiceInBranch');

            //show all return invoices customer
            Route::get('return-invoice/{list}/{customer_id}','CustomerController@allReturnInvoice');

            //show all return invoices customer in specific pharmacy
            Route::get('return-invoice/{list}/{customer_id}/{branch_id}','CustomerController@allReturnInvoiceInBranch');

            //show all customer's reckonings
            Route::get('reckoning-list/{customer_id}','CustomerController@allReckoning');

            //show all customer's reckonings in specific pharmacy
            Route::get('reckoning-list/{customer_id}/{branch_id}','CustomerController@allReckoningInBranch');

            //show all customer's payments
            Route::get('payments-list/{customer_id}','CustomerController@allPayment');

            //show all customer's payments in specific pharmacy
            Route::get('payments-list/{customer_id}/{branch_id}','CustomerController@allPaymentInBranch');

            //show all products that customer purches it
            Route::get('product-list/{customer_id}','CustomerController@allProduct'); 

            //show all products that customer purches it in specific pharmacy
            Route::get('product-list/{customer_id}/{branch_id}','CustomerController@allProductInBranch'); 


            //add customer
            Route::get('add','CustomerController@create'); //pharmacy employee
            Route::post('store','CustomerController@store')->name('customer.store');

            //edite customer
            Route::get('edit/{id}','CustomerController@edit'); //pharmacy employee
            Route::post('update/{id}','CustomerController@update')->name('customer.update');

            //delete customer
            Route::get('delete/{id}','CustomerController@delete');

            //paid reckon customer
            Route::post('paid-reckon/{id}','CustomerController@paidReckon')->name('customer.paid_reckon');

        });


        /*--------------------------------------------------------------------------
        | InvoiceController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Invoice', 'prefix' => 'invoice'], function () {

            //show all invoices in all pharmacies
            Route::get('all/{type_file}','InvoiceController@all');

            //show all invoices in specific pharmacy
            Route::get('all-in-pharmacy/{type_file}','InvoiceController@allInPharmacy');

            //add invoice
            Route::get('add','InvoiceController@create');
            Route::post('store','InvoiceController@store')->name('invoice.store');
            
            //show invoice details
            Route::get('show-details/{id}','InvoiceController@showInvoice')->name('invoice.show');

            //delete invoice
            Route::get('delete/{id}', 'InvoiceController@deleteInvoice')->name('invoice.delete');

            //show all debt invoices
            Route::get('reckons/all','InvoiceController@allDebtInvoices');

            //show all debt invoices in pharmacy
            Route::get('reckons/all-in-pharmacy','InvoiceController@allDebtInvoicesInPharmacy');

            //show all repayments
            Route::get('repayments/all','InvoiceController@allRepayments');

            //show all repayments in pharmacy
            Route::get('repayments/all-in-pharamcy','InvoiceController@allRepaymentsInPharmacy');

            //show all delyed invoices
            Route::get('delayed-invoices/all','InvoiceController@allDelayedInvoice');

            //show all delyed invoices in pharmacy
            Route::get('delayed-invoices-in-pharmacy/all','InvoiceController@delayedInvoiceInPharmacy');

            //show annual invoices
            Route::get('annual-invoice/all','InvoiceController@annualInvoice');

            //show annual invoices in pharmacy
            Route::get('annual-invoice-in-pharmacy/all','InvoiceController@annualInvoiceInPharmacy');

            //print invoice
            Route::get('print-invoice/{id}','InvoiceController@printInvoice');

            //delete debt invoice | payment
            Route::get('delete-loan/{id}','InvoiceController@deleteLoan');

        });

        /*--------------------------------------------------------------------------
        | ReturnInvoiceController
        |--------------------------------------------------------------------------*/
        Route::group(['namespace'=>'Invoice', 'prefix' => 'return-invoice'], function () {

            //show all return invoices
            Route::get('all/{type_file}','ReturnInvoiceController@all');

            //show all return invoices
            Route::get('all-in-pharmacy/{type_file}','ReturnInvoiceController@allInPharmacy');

            //delete return invoice
            Route::get('delete/{id}', 'ReturnInvoiceController@delete')->name('Rinvoice.delete');

            //return products in invoice
            Route::post('add-product/{IP_id}','ReturnInvoiceController@returnProducts')->name('invoiceReturn');

            Route::get('remove-product/{IP}','ReturnInvoiceController@removeProduct')->name('product.remove');

            //show all product that user returns it
            Route::get('show-return-cart', 'ReturnInvoiceController@showReturnCart')->name('cartReturn.show');

            //return invoice customer
            Route::get('return','ReturnInvoiceController@returnInvoice');

             //show return invoice details
             Route::get('show-details/{id}','ReturnInvoiceController@showReturnInvoice');

        });
    });

});

