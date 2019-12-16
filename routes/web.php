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

/*
 * Test admin layout
 */

// Route::get('/linh', function () {
//     return view('admin.home.index');
// });
Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');

Route::group(['namespace' => 'Client'], function () {
    // đăng nhập
    Route::get('dang-nhap', 'LoginController@showLoginForm')->name('login');
    Route::post('postLogin', 'LoginController@postLogin')->name('postLogin');
    Route::get('login/redirect/{social}', 'SocialAuthController@redirect')->name('redirectSocial');
    Route::get('login/callback/{social}', 'SocialAuthController@callback')->name('callbackSocial');;

    // đăng ký
    Route::get('dang-ky', 'RegisterController@showRegisterForm')->name('register');
    Route::post('postRegister', 'RegisterController@postRegister')->name('postRegister');
    Route::get('xac-nhan-tai-khoan', 'RegisterController@confirmUser')->name('confirmUser');

    // Đăng xuất
    Route::get('dang-xuat', 'LoginController@logOut')->name('logOut');

    // trang chủ
    Route::get('/', 'HomeController@index')->name('/');

    //quên mật khẩu
    Route::get('quen-mat-khau', 'ForgetPasswordController@showForgetPasswordForm')->name('forget_password');
    Route::post('postForgetPassword', 'ForgetPasswordController@postForgetPassword')->name('postForgetPassword');
    Route::get('thay-doi-mat-khau', 'ForgetPasswordController@changePassword')->name('changePassword');
    Route::post('saveChangePassword', 'ForgetPasswordController@saveChangePassword')->name('saveChangePassword');

    Route::get('tin-tuc', 'PostController@list_post')->name('list_post');
    Route::get('tin-tuc/{slug}', 'PostController@detail_post')->name('detail_post');

    Route::get('{slug_product}.html', 'ProductController@detail')->name('product_detail');

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    });

    Route::get('shop', 'ShopController@index')->name('shop');
    Route::get('danh-muc/{cate}', 'CategoryController@index')->name('category');

    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route::post('addCart', 'CartController@addCart')->name('addCart');
        Route::post('removeCart/{id}', 'CartController@removeCart')->name('removeCart');
        Route::post('removeCartHeader/{id}', 'CartController@removeCartHeader')->name('removeCartHeader');
        Route::post('updateCart/{id}', 'CartController@updateCart')->name('updateCart');
        Route::post('clearCart', 'CartController@clearCart')->name('clearCart');
        Route::post('saveOrder', 'CartController@saveOrder')->name('saveOrder');
    });
    Route::get('gio-hang', 'CartController@cart')->name('cart');
    Route::post('sendCodeDiscount', 'CartController@sendCodeDiscount')->name('sendCodeDiscount');
    Route::post('saveCouponIntoCookie', 'CartController@saveCouponIntoCookie')->name('saveCouponIntoCookie');
    Route::get('thanh-toan', 'CheckoutController@index')->name('checkout');

    Route::get('cam-on', 'CheckoutController@page_thank')->name('page_thank');
    Route::get('test_payment', function () {
        return view('test_payment');
    })->name('test_payment');

    Route::post('load_more_comment', 'ProductController@load_more_comment')->name('load_more_comment');
    Route::post('send_comment', 'ProductController@send_comment')->name('send_comment');
    Route::post('add_wishlist', 'HomeController@add_wishlist')->name('add_wishlist');
    Route::post('remove_wishlist', 'HomeController@remove_wishlist')->name('remove_wishlist');

    // trang lien he fake
    Route::get('lien-he', 'PageController@contact')->name('contact');
    Route::post('submitContact', 'PageController@submitContact')->name('submitContact');

});

Route::group(['namespace' => 'Client', 'middleware' => ['checkIsLogin']], function () {

    Route::get('tai-khoan', 'UserController@index')->name('account');
    Route::get('tai-khoan/doi-diem', 'UserController@get_reward')->name('get_reward');
    Route::post('get_voucher', 'UserController@get_voucher')->name('get_voucher');

    Route::get('tai-khoan/hoat-dong', 'UserController@history_reward')->name('history_reward');

    Route::get('tai-khoan/gioi-thieu-ban-be', 'UserController@share_refferal_code')->name('share_code');

    Route::get('tai-khoan/thong-tin', 'UserController@info_account')->name('info_account');

    Route::get('tai-khoan/don-hang', 'UserController@orderUser')->name('orderUser');

    Route::post('save_edit_info_account', 'UserController@save_edit_info_account')->name('save_edit_info_account');

    Route::get('tai-khoan/nhap-ma-gioi-thieu', 'UserController@enter_refferal_code')->name('enter_refferal_code');

    Route::post('use_refferal_code', 'UserController@use_refferal_code')->name('use_refferal_code');

    Route::post('send_comment', 'ProductController@send_comment')->name('send_comment');

    Route::post('add_wishlist', 'HomeController@add_wishlist')->name('add_wishlist');
    Route::get('san-pham-yeu-thich', 'HomeController@wishlist')->name('wishlist');
});

// ==================== cliend ==================== #

// ==================== ADMIN ==================== #
Route::group(['prefix' => 'admin', 'middleware' => ['checkIsAdmin'], 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    /*
     * Home
     */

    Route::get('/', 'HomeController@index')->name('home');
    Route::any('getNewOrders', 'HomeController@getNewOrders')->name('getNewOrders');
    Route::any('home', 'HomeController@home')->name('home');
    /*
     * Categories
     */
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', 'CategoryController@index')->name('index');
        Route::get('add', 'CategoryController@create')->name('add');
        Route::any('save_add', 'CategoryController@store')->name('saveAdd');

        Route::get('edit/{id}', 'CategoryController@edit')->name('edit');
        Route::post('save_edit/{id}', 'CategoryController@update')->name('saveEdit');
        Route::any('delete', 'CategoryController@destroy')->name('delete');

        #categoriesList
        Route::get('categories-data', 'CategoryController@categoriesList')->name('data');

        # multiDel
        Route::any('multiDel', 'CategoryController@multiDel')->name('multiDel');
    });

    /*
     * Users
     */
    Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
        Route::get('/', 'UserController@index')->name('index');
        Route::get('add', 'UserController@create')->name('add');
        Route::post('saveAdd', 'UserController@store')->name('saveAdd');
        Route::get('edit/{id}', 'UserController@edit')->name('edit');
        Route::post('saveEdit/{id}', 'UserController@update')->name('saveEdit');
        Route::post('delete', 'UserController@destroy')->name('delete');

        # multiDel
        Route::any('multiDel', 'UserController@multiDel')->name('multiDel');

    });

    /*
     * Posts
     */
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::any('getData', 'PostController@getData')->name('data');

        Route::get('/', 'PostController@index')->name('index');

        Route::get('add', 'PostController@add')->name('add');
        Route::post('saveAdd/{action?}', 'PostController@saveAdd')->name('saveAdd');

        Route::get('edit/{id}', 'PostController@edit')->name('edit');
        Route::post('saveEdit/{id}/{action?}', 'PostController@saveEdit')->name('saveEdit');

        Route::post('delete', 'PostController@delete')->name('delete');
        Route::post('deleteMulti', 'PostController@deleteMulti')->name('deleteMulti');

    });

    /*
     * page
     */
    Route::group(['prefix' => 'pages', 'as' => 'pages.'], function () {
        Route::any('getData', 'PageController@getData')->name('data');

        Route::get('/', 'PageController@index')->name('index');

        Route::get('add', 'PageController@add')->name('add');
        Route::post('saveAdd/{action?}', 'PageController@saveAdd')->name('saveAdd');

        Route::get('edit/{id}', 'PageController@edit')->name('edit');
        Route::post('saveEdit/{id}/{action?}', 'PageController@saveEdit')->name('saveEdit');

        Route::post('delete', 'PageController@delete')->name('delete');
        Route::post('deleteMulti', 'PageController@deleteMulti')->name('deleteMulti');
    });

    /*
     * Orders
     */
    Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
        Route::get('/', 'OrderController@index')->name('index');
        Route::get('edit/{id}', 'OrderController@edit')->name('edit');
        Route::post('saveEdit/{id}', 'OrderController@saveEdit')->name('saveEdit');
        Route::post('delete', 'OrderController@delete')->name('delete');
        Route::post('deleteMulti', 'OrderController@deleteMulti')->name('deleteMulti');
    });

    // /*
    //  * Colors
    //  */
    // Route::group(['prefix' => 'colors', 'as' => 'colors.'], function () {
    //     Route::get('/', 'ColorController@index')->name('index');
    //     // Route::get('add', 'ColorController@create')->name('add');
    // });

    /*
     * Attribute
     */
    Route::group(['prefix' => 'attribute', 'as' => 'attribute.'], function () {
        Route::get('/', 'AttributeController@index')->name('index');
        // Route::get('add', 'ColorController@create')->name('add');
        Route::post('save_add', 'AttributeController@store')->name('saveAdd');
        Route::get('edit/{id}', 'AttributeController@edit')->name('edit');
        Route::any('saveEdit/{id}', 'AttributeController@update')->name('saveEdit');
        Route::any('delete', 'AttributeController@destroy')->name('delete');
        Route::any('getData', 'AttributeController@getData')->name('getData');
        //value
        Route::get('/{id}', 'AttributeController@attribute')->name('attribute');
        Route::post('/saveAddValue/{attr_id}', 'AttributeController@storeValue')->name('saveAddValue');
        Route::post('/deleteValue', 'AttributeController@destroyValue')->name('deleteValue');
        Route::get('/edit_value/{id}', 'AttributeController@editValue')->name('editValue');
        Route::any('/saveEditValue/{id}', 'AttributeController@updateValue')->name('saveEditValue');
        Route::post('/dataValues', 'AttributeController@dataValues')->name('dataValues');

        Route::any('getAttributeValue/{attr_id}', 'AttributeController@getAttributeValue')->name('getAttributeValue');
    });

    /*
     * Products
     */
    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', 'ProductController@index')->name('index');
        Route::get('add', 'ProductController@create')->name('add');
        Route::post('saveAdd', 'ProductController@store')->name('saveAdd');
        Route::any('getData', 'ProductController@getData')->name('getData');
        Route::any('remove', 'ProductController@destroy')->name('remove');
        Route::any('multiDel', 'ProductController@multiDel')->name('multiDel');
        // sửa sản phẩm
        Route::get('edit/{id}', 'ProductController@edit')->name('edit');
    });
    /*
     * Discounts
     */
    Route::group(['prefix' => 'discounts', 'as' => 'discounts.'], function () {
        Route::any('getData', 'DiscountController@getData')->name('data');
        Route::get('/', 'DiscountController@index')->name('index');
        Route::post('saveAdd', 'DiscountController@saveAdd')->name('saveAdd');
        Route::get('edit/{id}', 'DiscountController@edit')->name('edit');
        Route::post('saveEdit/{id}/{action?}', 'DiscountController@saveEdit')->name('saveEdit');
        Route::post('delete', 'DiscountController@delete')->name('delete');
        Route::post('deleteMulti', 'DiscountController@deleteMulti')->name('deleteMulti');
    });

    /*
     * Vouchers
     */
    Route::group(['prefix' => 'vouchers', 'as' => 'vouchers.'], function () {
        Route::get('/', 'VoucherController@index')->name('index');
        Route::any('getData', 'VoucherController@getData')->name('data');
        Route::post('saveAdd', 'VoucherController@saveAdd')->name('saveAdd');
        Route::get('edit/{id}', 'VoucherController@edit')->name('edit');
        Route::post('saveEdit/{id}/{action?}', 'VoucherController@saveEdit')->name('saveEdit');
        Route::post('delete', 'VoucherController@delete')->name('delete');
        Route::post('deleteMulti', 'VoucherController@deleteMulti')->name('deleteMulti');
    });

    /*
     * Comments
     */
    Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
        Route::get('/', 'CommentController@index')->name('index');
        Route::post('delete', 'CommentController@delete')->name('delete');
        Route::post('deleteMulti', 'CommentController@deleteMulti')->name('deleteMulti');
        // Route::get('add', 'CommentController@create')->name('add');
    });

    /*
     * Options
     */
    Route::group(['prefix' => 'options', 'as' => 'options.'], function () {
        Route::get('theme_option', 'OptionController@index')->name('index');
        Route::get('menu', 'OptionController@menu')->name('menu');
        Route::get('contact', 'OptionController@contact')->name('contact');

        Route::post('saveContact', 'OptionController@saveContact')->name('saveContact');
        Route::post('saveLogo', 'OptionController@saveLogo')->name('saveLogo');
        Route::post('saveSlide', 'OptionController@saveSlide')->name('saveSlide');
        Route::post('savePoint', 'OptionController@savePoint')->name('savePoint');
        Route::post('saveMenu', 'OptionController@saveMenu')->name('saveMenu');
        Route::post('saveService', 'OptionController@saveService')->name('saveService');
    });

});
