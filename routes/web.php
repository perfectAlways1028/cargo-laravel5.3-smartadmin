<?php

//Backoffice only
//Packages
Route::get('/admin/packages/settings', 'AdminPackagesController@getSettings')
  ->name('admin-settings');

Route::post('/admin/packages/settings-save','AdminPackagesController@getSettingsSave')
  ->name('admin-saveSettings');
Route::match(['post','get'],'/admin/packages/scan-package','AdminPackagesController@getScanPackage')
->name('admin-scan-packages');
Route::post('/admin/packages/repack-package', 'AdminPackagesController@autoRepack')->name('admin-scan-repack');

Route::get("/admin/packages/autocomplete",array('as'=>'customerAutoComplete','uses'=> 'AdminPackagesController@customerAutoComplete'));

Route::get("/admin/packages/customerLocationComplete",array('as'=>'customerLocationComplete','uses'=> 'AdminPackagesController@customerLocationComplete'));

Route::get("/admin/packages/delete",array('as'=>'packageDelete','uses'=> 'AdminPackagesController@delete'));

//Shipments
Route::match(['post','get'],'/admin/shipments/repack','AdminShipmentsController@getRepack')
->name('admin-repack');
Route::match(['post','get'],'/admin/shipments/create-repack/{id}','AdminShipmentsController@getCreateRepack')
->name('admin-create-repack');
Route::match(['post'],'/admin/shipments/update-repack/{id}','AdminShipmentsController@getUpdateRepack')
->name('admin-update-repack');
Route::match(['post','get'],'/admin/shipments/create-invoice/{id}','AdminShipmentsController@getCreateInvoice')
->name('admin-create-invoice');
Route::match(['post','get'],'/admin/products/create-invoice/{id}','AdminProductsController@getCreateInvoice')
->name('admin-product-create-invoice');

Route::match(['get'],'/admin/shipments/print-invoice/{id}','AdminShipmentsController@getPrintInvoice')
->name('admin-print-invoice');
Route::match(['get'],'/admin/products/admin-print-invoice/{id}','AdminProductsController@getPrintInvoice')
->name('admin-product-print-invoice');
Route::match(['get'],'/admin/products/invoice-list','AdminProductsController@getInvoiceList')
->name('admin-product-invoice-list');

Route::post('/admin/shipments/bulk-update','AdminShipmentsController@getBulkUpdate');
Route::get('/admin/shipments/auto-shipment', 'AdminShipmentsController@testAutoShipment')
  ->name('auto-shipment');

Route::match(['post','get'],'/admin/shipments/scan','AdminShipmentsController@getScanShipments')
->name('admin-scan-shipments');
//Giftcards
Route::match(['post','get'], '/admin/giftcards/list', 'AdminGiftcardsController@getGiftcardsList')->name('admin-giftcard-list');
Route::match(['get'],'/admin/giftcards/set-paid/{id}','AdminGiftcardsController@setPaid')->name('admin-giftcard-set-paid');
Route::match(['get'],'/admin/giftcards/set-delivered/{id}','AdminGiftcardsController@setDelivered')->name('admin-giftcard-set-delivered');

Route::get('/admin/giftcards/json-giftcards','AdminGiftcardsController@getJsonGiftcards')->name('json-giftcards');//->middleware('auth.basic');
Route::post('/admin/giftcards/update-giftcard','AdminGiftcardsController@updateGiftcard')->name('json-update-giftcard');

Route::get("/admin/giftcards/delete",array('as'=>'giftcardDelete','uses'=> 'AdminGiftcardsController@delete'));
//Orders
Route::match(['post','get'], '/admin/orders/list', 'AdminOrdersController@getOrdersList')->name('admin-order-list');
Route::match(['post','get'], '/admin/orders/add', 'AdminOrdersController@addOrder')->name('admin-order-add');

Route::match(['post'],'/admin/orders/update-order/{id}','AdminOrdersController@getUpdateOrder')
->name('admin-update-order');
Route::match(['post', 'get'],'/admin/orders/set-price/{id}','AdminOrdersController@setPrice')->name('admin-order-set-price');
Route::match(['get'],'/admin/orders/set-ordered/{id}','AdminOrdersController@setOrdered')->name('admin-order-set-ordered');
Route::match(['get'],'/admin/orders/set-paid/{id}','AdminOrdersController@setPaid')->name('admin-order-set-paid');
Route::match(['get'],'/admin/orders/cleanup', 'AdminOrdersController@testCleanup')->name('admin-order-cleanup');
Route::match(['get'],'/admin/orders/set-declined/{id}','AdminOrdersController@decline')->name('admin-order-set-decline');


//some JSON
Route::get('/admin/packages/json-packages','AdminPackagesController@getJsonPackages')->name('json-packages');//->middleware('auth.basic');
Route::get('/admin/packages/json-shipments','AdminShipmentsController@getJsonShipments')->name('json-shipments');
Route::post('/admin/packages/update-shipment-type','AdminPackagesController@getUpdateShipmentType')->name('json-update-packages');

  //Pre login

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
  /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
  Route::get('/', 'frontofficeController@index')
        ->name('home');
  Route::get('/about-us', 'frontofficeController@about')
        ->name('about');
  Route::get('/faq', 'frontofficeController@faq')
        ->name('faq');
  Route::match(['post','get'],'/contact', 'frontofficeController@contact')
        ->name('contact');
  Route::get('/track-and-trace', 'frontofficeController@tracktrace')
        ->name('tracktrace');
  Route::match(['post','get'],'/my-account','frontofficeController@myAccount')
    ->name('my-account');
  Route::match(['post'],'/signup', 'frontofficeController@signup')
        ->name('signup');
  Route::post('/register', 'Auth\RegisterController@register')->name('register');

  Route::match(['post'],'/login', 'frontofficeController@login')
        ->name('login');
  Route::match(['get'],'/logout', 'frontofficeController@logout')
        ->name('logout');
  Route::get('/product/{id}','frontofficeController@viewProduct')
      ->name('view-product');
  Route::get('/my-packages','frontofficeController@myPackages')
      ->name('my-packages');
  Route::get('/my-invoices','frontofficeController@myInvoices')
      ->name('my-invoices');
  Route::post('/my-packages','frontofficeController@updateMyPackage')
      ->name('update-my-package');
  Route::get('/providers', 'frontofficeController@getProviders')
      ->name('providers');
  Route::match(['get'],'/print-invoice/{id}','frontofficeController@getPrintInvoice')
->name('front-print-invoice');
    //Post login
  Route::get('/my-orders', 'frontofficeController@getOrders')
        ->name('my-orders');
  Route::get('/confirm-order', 'frontofficeController@confirmOrder')->name('confirm-order');
  Route::get('/decline-order', 'frontofficeController@declineOrder')->name('decline-order');
  Route::get('/my-giftcards', 'frontofficeController@getGiftcards')
        ->name('my-giftcards');
  Route::match(['post','get'],'/new-giftcard', 'frontofficeController@newGiftcard')
        ->name('new-giftcard');
  Route::match(['post','get'],'/new-order', 'frontofficeController@newOrder')
        ->name('new-order');

  //Maintenance mode
  Route::get('/offline', function(){
    return view('frontoffice.maintenance');
  })->name('maintenance');


});


//WebService


//Maintenance mode
Route::get('/offline', function(){
  return view('frontoffice.maintenance');
})->name('maintenance');

