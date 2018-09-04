<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('pages.home2');
// });
Route::get('/', 'pageController@index');

Auth::routes();

Route::get('/deshboard', 'HomeController@index')->name('deshboard');

//admin routes here
Route::get('/admin-profile', 'AdminController@profile');
//product route here
Route::get('/add-product', 'productController@index')->name('add.product');
Route::post('/save.product', 'productController@save_product');
Route::get('/all-product', 'productController@all_product')->name('all.product');
Route::get('/active-product/{product_id}', 'productController@active_product');
Route::get('/unactive-product/{product_id}', 'productController@unactive_product');
Route::get('/edit-product/{product_id}', 'productController@edit_product');
Route::post('/update-product', 'productController@update_product')->name('update.product');
Route::get('/delete-product/{product_id}', 'productController@delete_product');






//category routs here
Route::get('/add-category', 'categoryController@index')->name('add.category');
Route::post('/save.category', 'categoryController@save_category');
Route::get('/all-category', 'categoryController@all_category')->name('all.category');
Route::get('/active-category/{cat_id}', 'categoryController@active_category');
Route::get('/unactive-category/{cat_id}', 'categoryController@unactive_category');
Route::get('/edit-category/{cat_id}', 'categoryController@edit_category');
Route::post('/update-category', 'categoryController@update_category')->name('update.category');
Route::get('/delete-category/{cat_id}', 'categoryController@delete_category');
	//child category routs here
Route::get('/child-category', 'categoryController@child_category')->name('child.category');
Route::post('/add.child', 'categoryController@save_category');
Route::get('/all-child-category', 'categoryController@all_child_category')->name('all.child.category');
Route::get('/active-child_category/{child_id}', 'categoryController@active_child_category');
Route::get('/unactive-child_category/{child_id}', 'categoryController@unactive_child_category');
Route::get('/edit-child_category/{child_id}', 'categoryController@edit_child_category');
Route::post('/update-child', 'categoryController@update_child')->name('update.child');
Route::get('/delete_child_category/{child_id}', 'categoryController@delete_child_category');
//brands routes here//

Route::get('/add-brands', 'brandController@index')->name('add.brands');
Route::post('/save.brands', 'brandController@save_brands');
Route::get('/all-brands', 'brandController@all_brands')->name('all.brands');
Route::get('/active-brand/{brand_id}', 'brandController@active_brand');
Route::get('/unactive-brand/{brand_id}', 'brandController@unactive_brand');
Route::get('/edit-brand/{brand_id}', 'brandController@edit_brand');
Route::post('/update.brand/', 'brandController@update_brand');
Route::get('delete-brand/{brand_id}', 'brandController@delete_brand');


//slider routes here
Route::get('/add-slider', 'sliderController@add_slider')->name('add.slider');
Route::post('/save.slider', 'sliderController@save_slider');
Route::get('/all-slider', 'sliderController@all_slider')->name('all.slider');
Route::get('/active-slider/{slider_id}', 'sliderController@active_slider');
Route::get('/unactive-slider/{slider_id}', 'sliderController@unactive_slider');
Route::get('/edit-slider/{slider_id}', 'sliderController@edit_slider');
Route::post('/update.slider/', 'sliderController@update_slider');
Route::get('delete-slider/{slider_id}', 'sliderController@delete_slider');


//checkout route here...........
Route::get('/checkout', 'checkoutController@checkout');
Route::get('/shipping-address', 'checkoutController@shipping_address');
Route::get('/customer-login', 'checkoutController@customer_loging')->name('customer.login');
Route::post('/registe-customer', 'checkoutController@registe_customer')->name('registe.customer');
Route::post('/check-customer', 'checkoutController@check_customer')->name('check.customer');
Route::post('/save-shipping', 'checkoutController@save_shipping')->name('save.shipping');
//payment
Route::get('payment', 'checkoutController@payment');
Route::post('/porduct_order', 'checkoutController@porduct_order')->name('porduct.order');


//cart  route are here-----------
Route::get('/single/{product_id}', 'cartController@single');
Route::post('/quentity', 'cartController@quentity');
Route::get('/show-cart', 'cartController@show_cart');
Route::post('/update-quentity', 'cartController@update_quentity');
Route::get('/remove-product/{rowId}', 'cartController@remove_product');

//page-controlle route here




Route::get('/catgetory/{category_name}/{cat_id}', 'pageController@vegetables');
Route::get('/customer-logout', 'pageController@customer_logout')->name('customer.logout');

//contact routs

Route::get('add-contact','contactController@index')->name('add.contact');
Route::post('save.contact','contactController@save_contact');
Route::get('edit-contact','contactController@edit_contact')->name('edit.contact');
Route::post('update.contact','contactController@update_contact');