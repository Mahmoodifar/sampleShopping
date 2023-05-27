<?php

use App\Models\User\Role;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\Notify\SMSController;
use App\Http\Controllers\Admin\Content\FAQController;
use App\Http\Controllers\Admin\Content\MenuController;
use App\Http\Controllers\Admin\Content\PageController;
use App\Http\Controllers\Admin\Content\PostController;
use App\Http\Controllers\Admin\Market\BrandController;
use App\Http\Controllers\Admin\Market\OrderController;
use App\Http\Controllers\Admin\Market\StoreController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\Notify\EmailController;
use App\Http\Controllers\Admin\User\CustomerController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\Content\BannerController;
use App\Http\Controllers\Admin\Market\CommentController;
use App\Http\Controllers\Admin\Market\GalleryController;
use App\Http\Controllers\Admin\Market\PaymentController;
use App\Http\Controllers\Admin\Market\ProductController;
use App\Http\Controllers\Admin\User\AdminUserController;
use App\Http\Controllers\Admin\Market\CategoryController;
use App\Http\Controllers\Admin\Market\DeliveryController;
use App\Http\Controllers\Admin\Market\DiscountController;
use App\Http\Controllers\Admin\Market\PropertyController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\Market\GuaranteeController;
use App\Http\Controllers\Admin\Notify\EmailFileController;
use App\Http\Controllers\Admin\Ticket\TicketController;
use App\Http\Controllers\Admin\Ticket\AdminTicketController;
use App\Http\Controllers\Admin\Ticket\TicketAdminController;
use App\Http\Controllers\Customer\Profile\ProfileController;
use App\Http\Controllers\Admin\Market\ProductColorController;
use App\Http\Controllers\Customer\Profile\FavoriteController;
use App\Http\Controllers\Admin\Market\PropertyValueController;
use App\Http\Controllers\Customer\SalesProcess\CartController;
use App\Http\Controllers\Admin\Ticket\TicketCategoryController;
use App\Http\Controllers\Admin\Ticket\TicketPriorityController;
use App\Http\Controllers\Auth\Customer\LoginRegisterController;
use App\Http\Controllers\Customer\SalesProcess\AddressController;
use App\Http\Controllers\Customer\SalesProcess\ProfileCompletionController;
use App\Http\Controllers\Customer\Profile\OrderController as ProfileOrderController;
use App\Http\Controllers\Admin\Content\CommentController as ContentCommentController;
use App\Http\Controllers\Admin\Content\CategoryController as ContentCategoryController;
use App\Http\Controllers\Customer\Market\ProductController as ProductCustomerController;
use App\Http\Controllers\Customer\Profile\AddressController as ProfileAddressController;
use App\Http\Controllers\Customer\SalesProcess\PaymentController as CustomerPaymentController;
use App\Http\Controllers\Customer\Profile\TicketController as CustomerTicketController;


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
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
//TODO fixed admin middlware
Route::prefix('admin')->namespace('Admin')->group(function () {

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    //---Market

    Route::prefix('market')->namespace('Market')->group(function () {

        //Category
        Route::prefix('category')->group(function () {

            Route::get('/', [CategoryController::class, 'index'])->name('admin.market.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.market.category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('admin.market.category.store');
            Route::get('/edit/{productCategory}', [CategoryController::class, 'edit'])->name('admin.market.category.edit');
            Route::put('/update/{productCategory}', [CategoryController::class, 'update'])->name('admin.market.category.update');
            Route::delete('/destroy/{productCategory}', [CategoryController::class, 'destroy'])->name('admin.market.category.destroy');
            Route::get('/status/{productCategory}', [CategoryController::class, 'status'])->name('admin.market.category.status');
            Route::get('/show-in-menu/{productCategory}', [CategoryController::class, 'showInMenu'])->name('admin.market.category.show-in-menu');
        });



        //Brand
        Route::prefix('brand')->group(function () {

            Route::get('/', [BrandController::class, 'index'])->name('admin.market.brand.index');
            Route::get('/create', [BrandController::class, 'create'])->name('admin.market.brand.create');
            Route::post('/store', [BrandController::class, 'store'])->name('admin.market.brand.store');
            Route::get('/edit/{brand}', [BrandController::class, 'edit'])->name('admin.market.brand.edit');
            Route::put('/update/{brand}', [BrandController::class, 'update'])->name('admin.market.brand.update');
            Route::delete('/destroy/{brand}', [BrandController::class, 'destroy'])->name('admin.market.brand.destroy');
            Route::get('/status/{brand}', [BrandController::class, 'status'])->name('admin.market.brand.status');
        });

        //Comment
        Route::prefix('comment')->group(function () {


            Route::get('/', [CommentController::class, 'index'])->name('admin.market.comment.index');
            Route::get('/show/{comment}', [CommentController::class, 'show'])->name('admin.market.comment.show');
            Route::get('/status/{comment}', [CommentController::class, 'status'])->name('admin.market.comment.status');
            Route::get('/approved/{comment}', [CommentController::class, 'approved'])->name('admin.market.comment.approved');
            Route::post('/answer/{comment}', [CommentController::class, 'answer'])->name('admin.market.comment.answer');
        });

        //Delivery

        Route::prefix('delivery')->group(function () {

            Route::get('/', [DeliveryController::class, 'index'])->name('admin.market.delivery.index');
            Route::get('/create', [DeliveryController::class, 'create'])->name('admin.market.delivery.create');
            Route::post('/store', [DeliveryController::class, 'store'])->name('admin.market.delivery.store');
            Route::get('/edit/{delivery}', [DeliveryController::class, 'edit'])->name('admin.market.delivery.edit');
            Route::put('/update/{delivery}', [DeliveryController::class, 'update'])->name('admin.market.delivery.update');
            Route::delete('/destroy/{delivery}', [DeliveryController::class, 'destroy'])->name('admin.market.delivery.destroy');
            Route::get('/status/{delivery}', [DeliveryController::class, 'status'])->name('admin.market.delivery.status');
        });

        //discount

        Route::prefix('discount')->group(function () {

            Route::get('/copan', [DiscountController::class, 'copan'])->name('admin.market.discount.copan');
            Route::get('/copan/create', [DiscountController::class, 'copanCreate'])->name('admin.market.discount.create');
            Route::post('/copan/store', [DiscountController::class, 'copanStore'])->name('admin.market.discount.copanStore');
            Route::get('/copan/edit/{copan}', [DiscountController::class, 'copanEdit'])->name('admin.market.discount.copanEdit');
            Route::put('/copan/update/{copan}', [DiscountController::class, 'copanUpdate'])->name('admin.market.discount.copanUpdate');
            Route::delete('/copan/delete/{copan}', [DiscountController::class, 'copanDelete'])->name('admin.market.discount.copanDelete');
            Route::get('/copan-status/{copan}', [DiscountController::class, 'copanStatus'])->name('admin.market.discount.copanStatus');
            //comon
            Route::get('/common-discount', [DiscountController::class, 'commonDiscount'])->name('admin.market.discount.commonDiscount');
            Route::get('/common-discount/create', [DiscountController::class, 'commonDiscountCreate'])->name('admin.market.discount.commonDiscountCreate');
            Route::post('/common-discount/store', [DiscountController::class, 'commonDiscountStore'])->name('admin.market.discount.commonDiscountStore');
            Route::get('/common-discount/edit/{common}', [DiscountController::class, 'commonDiscountEdit'])->name('admin.market.discount.commonDiscountEdit');
            Route::put('/common-discount/update/{common}', [DiscountController::class, 'commonDiscountUpdate'])->name('admin.market.discount.commonDiscountUpdate');
            Route::delete('/common-discount/delete/{common}', [DiscountController::class, 'commonDiscountDelete'])->name('admin.market.discount.commonDiscountDelete');
            Route::get('/change-common-status/{common}', [DiscountController::class, 'commonStatus'])->name('admin.market.discount.commonStatus');
            //amazing sale
            Route::get('/amazing-sale', [DiscountController::class, 'amazingSale'])->name('admin.market.discount.amazingSale');
            Route::get('/amazing-sale/create', [DiscountController::class, 'amazingSaleCreate'])->name('admin.market.discount.amazingSaleCreate');
            Route::post('/amazing-sale/store', [DiscountController::class, 'amazingSaleStore'])->name('admin.market.discount.amazingSaleStore');
            Route::get('/amazing-sale/edit/{amazing}', [DiscountController::class, 'amazingSaleEdit'])->name('admin.market.discount.amazingSaleEdit');
            Route::put('/amazing-sale/update/{amazing}', [DiscountController::class, 'amazingSaleUpdate'])->name('admin.market.discount.amazingSaleUpdate');
            Route::delete('/amazing-sale/delete/{amazing}', [DiscountController::class, 'amazingSaleDelete'])->name('admin.market.discount.amazingSaleDelete');
            Route::get('/amazing-sale-status/{amazing}', [DiscountController::class, 'amazingStatus'])->name('admin.market.discount.amazingSaleStatus');
        });

        //Order

        Route::prefix('order')->group(function () {

            Route::get('/', [OrderController::class, 'index'])->name('admin.market.order.index');
            Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.market.order.newOrders');
            Route::get('/sending', [OrderController::class, 'sending'])->name('admin.market.order.sending');
            Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.market.order.unpaid');
            Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.market.order.canceled');
            Route::get('/returned', [OrderController::class, 'returned'])->name('admin.market.order.returned');
            Route::get('/show/{order}', [OrderController::class, 'show'])->name('admin.market.order.show');
            Route::get('/show/{order}/detail', [OrderController::class, 'detail'])->name('admin.market.order.show.detail');
            Route::get('/change-order-status/{order}', [OrderController::class, 'changeOrderStatus'])->name('admin.market.order.changeOrderStatus');
            Route::get('/change-send-status/{order}', [OrderController::class, 'changeSendStatus'])->name('admin.market.order.changeSendStatus');
            Route::delete('/delete-orde/{order}', [OrderController::class, 'deleteOrder'])->name('admin.market.order.deleteOrder');
        });

        //Payment

        Route::prefix('payment')->group(function () {

            Route::get('/', [PaymentController::class, 'index'])->name('admin.market.payment.index');
            Route::get('/online', [PaymentController::class, 'online'])->name('admin.market.payment.online');
            Route::get('/offline', [PaymentController::class, 'offline'])->name('admin.market.payment.offline');
            Route::get('/cash', [PaymentController::class, 'cash'])->name('admin.market.payment.cash');
            Route::get('/confirm/{payment}', [PaymentController::class, 'confirm'])->name('admin.market.payment.confirm');
            Route::get('/canceled/{payment}', [PaymentController::class, 'canceled'])->name('admin.market.payment.canceled');
            Route::get('/returned/{payment}', [PaymentController::class, 'returned'])->name('admin.market.payment.returned');
            Route::get('/show/{payment}', [PaymentController::class, 'show'])->name('admin.market.payment.show');
        });

        //Product

        Route::prefix('product')->group(function () {

            Route::get('/', [ProductController::class, 'index'])->name('admin.market.product.index');
            Route::get('/create', [ProductController::class, 'create'])->name('admin.market.product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('admin.market.product.store');
            Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.market.product.edit');
            Route::put('/update/{product}', [ProductController::class, 'update'])->name('admin.market.product.update');
            Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('admin.market.product.destroy');
            Route::get('/status/{product}', [ProductController::class, 'status'])->name('admin.market.product.status');
            Route::get('/marketable/{product}', [ProductController::class, 'marketable'])->name('admin.market.product.marketable');

            //Guarantee

            Route::get('/guarantee/{product}', [GuaranteeController::class, 'index'])->name('admin.market.guarantee.index');
            Route::get('/guarantee/create/{product}', [GuaranteeController::class, 'create'])->name('admin.market.guarantee.create');
            Route::post('/guarantee/store/{product}', [GuaranteeController::class, 'store'])->name('admin.market.guarantee.store');
            Route::get('/{product}/guarantee/edit/{guarantee}', [GuaranteeController::class, 'edit'])->name('admin.market.guarantee.edit');
            Route::put('/{product}/guarantee/update/{guarantee}', [GuaranteeController::class, 'update'])->name('admin.market.guarantee.update');
            Route::delete('/{product}/guarantee/destroy/{guarantee}', [GuaranteeController::class, 'destroy'])->name('admin.market.guarantee.destroy');

            //ProductColor

            Route::get('/color/{product}', [ProductColorController::class, 'index'])->name('admin.market.color.index');
            Route::get('/color/create/{product}', [ProductColorController::class, 'create'])->name('admin.market.color.create');
            Route::post('/color/store/{product}', [ProductColorController::class, 'store'])->name('admin.market.color.store');
            Route::get('/{product}/color/edit/{color}', [ProductColorController::class, 'edit'])->name('admin.market.color.edit');
            Route::put('/{product}/color/update/{color}', [ProductColorController::class, 'update'])->name('admin.market.color.update');
            Route::delete('/{product}/color/destroy/{color}', [ProductColorController::class, 'destroy'])->name('admin.market.color.destroy');

            //Gallery
            Route::get('/{product}/gallery', [GalleryController::class, 'index'])->name('admin.market.gallery.index');
            Route::get('/gallery/{product}/create', [GalleryController::class, 'create'])->name('admin.market.gallery.create');
            Route::post('/{product}/gallery/store', [GalleryController::class, 'store'])->name('admin.market.gallery.store');
            Route::get('/{product}/gallery/edit/{gallery}', [GalleryController::class, 'edit'])->name('admin.market.gallery.edit');
            Route::put('/{product}/gallery/update/{gallery}', [GalleryController::class, 'update'])->name('admin.market.gallery.update');
            Route::delete('/{product}/gallery/destroy/{gallery}', [GalleryController::class, 'destroy'])->name('admin.market.gallery.destroy');
        });


        //Property

        Route::prefix('property')->group(function () {

            Route::get('/', [PropertyController::class, 'index'])->name('admin.market.property.index');
            Route::get('/create', [PropertyController::class, 'create'])->name('admin.market.property.create');
            Route::post('/store', [PropertyController::class, 'store'])->name('admin.market.property.store');
            Route::get('/edit/{categoryAttribute}', [PropertyController::class, 'edit'])->name('admin.market.property.edit');
            Route::put('/update/{categoryAttribute}', [PropertyController::class, 'update'])->name('admin.market.property.update');
            Route::delete('/destroy/{categoryAttribute}', [PropertyController::class, 'destroy'])->name('admin.market.property.destroy');

            //PropertyValue

            Route::get('/{categoryAttribute}/value', [PropertyValueController::class, 'index'])->name('admin.market.value.index');
            Route::get('/property/{categoryAttribute}/create', [PropertyValueController::class, 'create'])->name('admin.market.value.create');
            Route::post('/{categoryAttribute}/value/store', [PropertyValueController::class, 'store'])->name('admin.market.value.store');
            Route::get('/{categoryAttribute}/value/edit/{value}', [PropertyValueController::class, 'edit'])->name('admin.market.value.edit');
            Route::put('/{categoryAttribute}/value/update/{value}', [PropertyValueController::class, 'update'])->name('admin.market.value.update');
            Route::delete('/{categoryAttribute}/value/destroy/{value}', [PropertyValueController::class, 'destroy'])->name('admin.market.value.destroy');
        });

        //Store

        Route::prefix('store')->group(function () {

            Route::get('/', [StoreController::class, 'index'])->name('admin.market.store.index');
            Route::get('/add-to-store/{product}', [StoreController::class, 'addToStore'])->name('admin.market.store.add-to-store');
            Route::post('/store/{product}', [StoreController::class, 'store'])->name('admin.market.store.store');
            Route::get('/edit/{product}', [StoreController::class, 'edit'])->name('admin.market.store.edit');
            Route::put('/update/{product}', [StoreController::class, 'update'])->name('admin.market.store.update');
            Route::delete('/destroy/{product}', [StoreController::class, 'destroy'])->name('admin.market.store.destroy');
        });
    });

    //---Content

    Route::prefix('content')->namespace('Content')->group(function () {

        // //Category
        // Route::prefix('category')->group(function () {

        //     Route::get('/', [ContentCategoryController::class, 'index'])->name('admin.content.category.index');
        //     Route::get('/create', [ContentCategoryController::class, 'create'])->name('admin.content.category.create');
        //     Route::post('/store', [ContentCategoryController::class, 'store'])->name('admin.content.category.store');
        //     Route::get('/edit/{postCategory}', [ContentCategoryController::class, 'edit'])->name('admin.content.category.edit');
        //     Route::put('/update/{postCategory}', [ContentCategoryController::class, 'update'])->name('admin.content.category.update');
        //     Route::delete('/destroy/{postCategory}', [ContentCategoryController::class, 'destroy'])->name('admin.content.category.destroy');
        //     Route::get('/status/{postCategory}', [ContentCategoryController::class, 'status'])->name('admin.content.category.status');
        // });

        //Comment
        Route::prefix('comment')->group(function () {

            Route::get('/', [ContentCommentController::class, 'index'])->name('admin.content.comment.index');
            Route::get('/show/{comment}', [ContentCommentController::class, 'show'])->name('admin.content.comment.show');
            Route::get('/status/{comment}', [ContentCommentController::class, 'status'])->name('admin.content.comment.status');
            Route::get('/approved/{comment}', [ContentCommentController::class, 'approved'])->name('admin.content.comment.approved');
            Route::post('/answer/{comment}', [ContentCommentController::class, 'answer'])->name('admin.content.comment.answer');
        });

        //Faq
        Route::prefix('faq')->group(function () {

            Route::get('/', [FAQController::class, 'index'])->name('admin.content.faq.index');
            Route::get('/create', [FAQController::class, 'create'])->name('admin.content.faq.create');
            Route::post('/store', [FAQController::class, 'store'])->name('admin.content.faq.store');
            Route::get('/edit/{faq}', [FAQController::class, 'edit'])->name('admin.content.faq.edit');
            Route::put('/update/{faq}', [FAQController::class, 'update'])->name('admin.content.faq.update');
            Route::delete('/destroy/{faq}', [FAQController::class, 'destroy'])->name('admin.content.faq.destroy');
            Route::get('/status/{faq}', [FAQController::class, 'status'])->name('admin.content.faq.status');
        });

        //Menu
        Route::prefix('menu')->group(function () {

            Route::get('/', [MenuController::class, 'index'])->name('admin.content.menu.index');
            Route::get('/create', [MenuController::class, 'create'])->name('admin.content.menu.create');
            Route::post('/store', [MenuController::class, 'store'])->name('admin.content.menu.store');
            Route::get('/edit/{menu}', [MenuController::class, 'edit'])->name('admin.content.menu.edit');
            Route::put('/update/{menu}', [MenuController::class, 'update'])->name('admin.content.menu.update');
            Route::delete('/destroy/{menu}', [MenuController::class, 'destroy'])->name('admin.content.menu.destroy');
            Route::get('/status/{menu}', [MenuController::class, 'status'])->name('admin.content.menu.status');
        });

        //Banner
        Route::prefix('banner')->group(function () {

            Route::get('/', [BannerController::class, 'index'])->name('admin.content.banner.index');
            Route::get('/create', [BannerController::class, 'create'])->name('admin.content.banner.create');
            Route::post('/store', [BannerController::class, 'store'])->name('admin.content.banner.store');
            Route::get('/edit/{banner}', [BannerController::class, 'edit'])->name('admin.content.banner.edit');
            Route::put('/update/{banner}', [BannerController::class, 'update'])->name('admin.content.banner.update');
            Route::delete('/destroy/{banner}', [BannerController::class, 'destroy'])->name('admin.content.banner.destroy');
            Route::get('/status/{banner}', [BannerController::class, 'status'])->name('admin.content.banner.status');
        });

        //Page
        Route::prefix('page')->group(function () {

            Route::get('/', [PageController::class, 'index'])->name('admin.content.page.index');
            Route::get('/create', [PageController::class, 'create'])->name('admin.content.page.create');
            Route::post('/store', [PageController::class, 'store'])->name('admin.content.page.store');
            Route::get('/edit/{page}', [PageController::class, 'edit'])->name('admin.content.page.edit');
            Route::put('/update/{page}', [PageController::class, 'update'])->name('admin.content.page.update');
            Route::delete('/destroy/{page}', [PageController::class, 'destroy'])->name('admin.content.page.destroy');
            Route::get('/status/{page}', [PageController::class, 'status'])->name('admin.content.page.status');
        });

        //Post
        // Route::prefix('post')->group(function () {

        //     Route::get('/', [PostController::class, 'index'])->name('admin.content.post.index');
        //     Route::get('/create', [PostController::class, 'create'])->name('admin.content.post.create');
        //     Route::post('/store', [PostController::class, 'store'])->name('admin.content.post.store');
        //     Route::get('/edit/{post}', [PostController::class, 'edit'])->name('admin.content.post.edit');
        //     Route::put('/update/{post}', [PostController::class, 'update'])->name('admin.content.post.update');
        //     Route::delete('/destroy/{post}', [PostController::class, 'destroy'])->name('admin.content.post.destroy');
        //     Route::get('/status/{post}', [PostController::class, 'status'])->name('admin.content.post.status');
        //     Route::get('/commentable/{post}', [PostController::class, 'commentable'])->name('admin.content.post.commentable');
        // });
    });

    //---User

    Route::prefix('user')->namespace('User')->group(function () {

        //admin-user

        Route::prefix('admin-user')->group(function () {

            Route::get('/', [AdminUserController::class, 'index'])->name('admin.user.admin-user.index');
            Route::get('/create', [AdminUserController::class, 'create'])->name('admin.user.admin-user.create');
            Route::post('/store', [AdminUserController::class, 'store'])->name('admin.user.admin-user.store');
            Route::get('/edit/{admin}', [AdminUserController::class, 'edit'])->name('admin.user.admin-user.edit');
            Route::put('/update/{admin}', [AdminUserController::class, 'update'])->name('admin.user.admin-user.update');
            Route::delete('/destroy/{admin}', [AdminUserController::class, 'destroy'])->name('admin.user.admin-user.destroy');
            Route::get('/status/{user}', [AdminUserController::class, 'status'])->name('admin.user.admin-user.status');
            Route::get('/activation/{user}', [AdminUserController::class, 'activation'])->name('admin.user.admin-user.activation');
            Route::get('/roles/{admin}', [AdminUserController::class, 'roles'])->name('admin.user.admin-user.roles');
            Route::post('/roles/{admin}/store', [AdminUserController::class, 'rolesStore'])->name('admin.user.admin-user.roles.store');
            Route::get('/permissions/{admin}', [AdminUserController::class, 'permissions'])->name('admin.user.admin-user.permissions');
            Route::post('/permissions/{admin}/store', [AdminUserController::class, 'permissionsStore'])->name('admin.user.admin-user.permissions.store');
        });

        //Customer

        Route::prefix('customer')->group(function () {

            Route::get('/', [CustomerController::class, 'index'])->name('admin.user.customer.index');
            Route::get('/create', [CustomerController::class, 'create'])->name('admin.user.customer.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('admin.user.customer.store');
            Route::get('/edit/{customer}', [CustomerController::class, 'edit'])->name('admin.user.customer.edit');
            Route::put('/update/{customer}', [CustomerController::class, 'update'])->name('admin.user.customer.update');
            Route::delete('/destroy/{customer}', [CustomerController::class, 'destroy'])->name('admin.user.customer.destroy');
            Route::get('/status/{user}', [CustomerController::class, 'status'])->name('admin.user.customer.status');
            Route::get('/activation/{user}', [CustomerController::class, 'activation'])->name('admin.user.customer.activation');

        });


        //Role


        Route::prefix('role')->group(function () {

            Route::get('/', [RoleController::class, 'index'])->name('admin.user.role.index');
            Route::get('/create', [RoleController::class, 'create'])->name('admin.user.role.create');
            Route::post('/store', [RoleController::class, 'store'])->name('admin.user.role.store');
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('admin.user.role.edit');
            Route::put('/update/{role}', [RoleController::class, 'update'])->name('admin.user.role.update');
            Route::delete('/destroy/{role}', [RoleController::class, 'destroy'])->name('admin.user.role.destroy');
            Route::get('/permission-form/{role}', [RoleController::class, 'permissionForm'])->name('admin.user.role.permission-form');
            Route::put('/permission-update/{role}', [RoleController::class, 'permissionUpdate'])->name('admin.user.role.permission-update');
        });

        //Permission

        Route::prefix('permission')->group(function () {

            Route::get('/', [PermissionController::class, 'index'])->name('admin.user.permission.index');
            Route::get('/create', [PermissionController::class, 'create'])->name('admin.user.permission.create');
            Route::post('/store', [PermissionController::class, 'store'])->name('admin.user.permission.store');
            Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('admin.user.permission.edit');
            Route::put('/update/{permission}', [PermissionController::class, 'update'])->name('admin.user.permission.update');
            Route::delete('/destroy/{permission}', [PermissionController::class, 'destroy'])->name('admin.user.permission.destroy');
        });
    });

    //---Notify
    Route::prefix('notify')->namespace('Notify')->group(function () {

        //Email

        Route::prefix('email')->group(function () {

            Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
            Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
            Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
            Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
            Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
            Route::delete('/destroy/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
            Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');
        });

        //Email-File

        Route::prefix('email-file')->group(function () {

            Route::get('/{email}', [EmailFileController::class, 'index'])->name('admin.notify.email-file.index');
            Route::get('/{email}/create', [EmailFileController::class, 'create'])->name('admin.notify.email-file.create');
            Route::post('/{email}/store', [EmailFileController::class, 'store'])->name('admin.notify.email-file.store');
            Route::get('/edit/{file}', [EmailFileController::class, 'edit'])->name('admin.notify.email-file.edit');
            Route::put('/update/{file}', [EmailFileController::class, 'update'])->name('admin.notify.email-file.update');
            Route::delete('/destroy/{file}', [EmailFileController::class, 'destroy'])->name('admin.notify.email-file.destroy');
            Route::get('/status/{file}', [EmailFileController::class, 'status'])->name('admin.notify.email-file.status');
        });

        //SMS

        Route::prefix('sms')->group(function () {

            Route::get('/', [SMSController::class, 'index'])->name('admin.notify.sms.index');
            Route::get('/create', [SMSController::class, 'create'])->name('admin.notify.sms.create');
            Route::post('/store', [SMSController::class, 'store'])->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', [SMSController::class, 'edit'])->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', [SMSController::class, 'update'])->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', [SMSController::class, 'destroy'])->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', [SMSController::class, 'status'])->name('admin.notify.sms.status');
        });
    });


    //---Ticket
    Route::prefix('ticket')->namespace('Ticket')->group(function () {


        //category
        Route::prefix('category')->group(function () {
            Route::get('/', [TicketCategoryController::class, 'index'])->name('admin.ticket.category.index');
            Route::get('/create', [TicketCategoryController::class, 'create'])->name('admin.ticket.category.create');
            Route::get('/show', [TicketCategoryController::class, 'show'])->name('admin.ticket.category.show');
            Route::post('/store', [TicketCategoryController::class, 'store'])->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', [TicketCategoryController::class, 'edit'])->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', [TicketCategoryController::class, 'update'])->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', [TicketCategoryController::class, 'destroy'])->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', [TicketCategoryController::class, 'status'])->name('admin.ticket.category.status');
        });
        //priority
        Route::prefix('priority')->group(function () {
            Route::get('/', [TicketPriorityController::class, 'index'])->name('admin.ticket.priority.index');
            Route::get('/create', [TicketPriorityController::class, 'create'])->name('admin.ticket.priority.create');
            Route::get('/show', [TicketPriorityController::class, 'show'])->name('admin.ticket.priority.show');
            Route::post('/store', [TicketPriorityController::class, 'store'])->name('admin.ticket.priority.store');
            Route::get('/edit/{ticketPriority}', [TicketPriorityController::class, 'edit'])->name('admin.ticket.priority.edit');
            Route::put('/update/{ticketPriority}', [TicketPriorityController::class, 'update'])->name('admin.ticket.priority.update');
            Route::delete('/destroy/{ticketPriority}', [TicketPriorityController::class, 'destroy'])->name('admin.ticket.priority.destroy');
            Route::get('/status/{ticketPriority}', [TicketPriorityController::class, 'status'])->name('admin.ticket.priority.status');
        });

        //Admin Ticket
        Route::prefix('admin')->group(function () {
            Route::get('/', [TicketAdminController::class, 'index'])->name('admin.ticket.admin.index');
            Route::get('/set/{admin}', [TicketAdminController::class, 'set'])->name('admin.ticket.admin.set');
        });

        //ticket
        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('/new-tickets', [TicketController::class, 'newTickets'])->name('admin.ticket.new-tickets');
        Route::get('/open-tickets', [TicketController::class, 'openTickets'])->name('admin.ticket.open-tickets');
        Route::get('/close-tickets', [TicketController::class, 'closeTickets'])->name('admin.ticket.close-tickets');
        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
        Route::get('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
        Route::get('/change/{ticket}', [TicketController::class, 'change'])->name('admin.ticket.change');
    });


    //---Setting

    Route::prefix('setting')->namespace('Setting')->group(function () {

        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
        Route::get('/edit/{setting}', [SettingController::class, 'edit'])->name('admin.setting.edit');
        Route::put('/update/{setting}', [SettingController::class, 'update'])->name('admin.setting.update');
    });

    //notification rote
    Route::post('/notification/read-all', [NotificationController::class, 'readAll'])->name('admin.notification.readAll');
});


Route::namespace('Auth')->group(function () {

    Route::namespace('Auth')->group(function () {
        Route::get('login-register', [LoginRegisterController::class, 'loginRegisterForm'])->name('auth.customer.login-register-form');
        Route::middleware('throttle:customer-login-register-limiter')->post('/login-register', [LoginRegisterController::class, 'loginRegister'])->name('auth.customer.login-register');
        Route::get('login-confirm/{token}', [LoginRegisterController::class, 'loginConfirmForm'])->name('auth.customer.login-confirm-form');
        Route::middleware('throttle:customer-login-confirm-limiter')->post('/login-confirm/{token}', [LoginRegisterController::class, 'loginConfirm'])->name('auth.customer.login-confirm');
        Route::middleware('throttle:customer-login-resend-otp-limiter')->get('/login-resend-otp/{token}', [LoginRegisterController::class, 'loginResendOtp'])->name('auth.customer.login-resend-otp');
        Route::get('logout', [LoginRegisterController::class, 'logout'])->name('auth.customer.logout');
    });
});


Route::get('/', [HomeController::class, 'home'])->name('customer.home');
Route::get('/products', [HomeController::class, 'products'])->name('customer.products');

Route::namespace('saleProcess')->group(function () {

    Route::get('/cart', [CartController::class, 'cart'])->name('customer.sales-process.cart');
    Route::post('/cart', [CartController::class, 'updateCart'])->name('customer.sales-process.update-cart');
    Route::post('/add-to-cart/{product:slug}', [CartController::class, 'addToCart'])->name('customer.sales-process.add-to-cart');
    Route::get('/remove-from-cart/{cartItem}', [CartController::class, 'removeFromCart'])->name('customer.sales-process.remove-from-cart');

    //profile completion
    Route::get('/profile-completion', [ProfileCompletionController::class, 'profileCompletion'])->name('customer.sales-process.profile-completion');
    Route::post('/profile-completion', [ProfileCompletionController::class, 'update'])->name('customer.sales-process.profile-completion-update');


    Route::middleware('profile.completion')->group(function () {

        //address
        Route::post('/add-address', [AddressController::class, 'addAddress'])->name('customer.sales-process.add-address');
        Route::put('/update-address/{address}', [AddressController::class, 'updateAddress'])->name('customer.sales-process.update-address');
        Route::get('/get-cities/{province}', [AddressController::class, 'getCities'])->name('customer.sales-process.get-cities');
        Route::get('/address-and-delivery', [AddressController::class, 'addressAndDelivery'])->name('customer.sales-process.address-and-delivery');
        Route::post('/choose-address-and-delivery', [AddressController::class, 'chooseAddressAndDelivery'])->name('customer.sales-process.choose-address-and-delivery');

        //payment
        Route::get('/payment', [CustomerPaymentController::class, 'payment'])->name('customer.sales-process.payment');
        Route::post('/copan-discount', [CustomerPaymentController::class, 'copanDiscount'])->name('customer.sales-process.copan-discount');
        Route::post('/copan-discount', [CustomerPaymentController::class, 'copanDiscount'])->name('customer.sales-process.copan-discount');
        Route::post('payment-submit', [CustomerPaymentController::class, 'paymentSubmit'])->name('customer.sales-process.payment-submit');
        Route::any('payment-callback/{order}/{onlinePeyment}', [CustomerPaymentController::class, 'paymentCallback'])->name('customer.sales-process.payment-call-back');
    });
});


Route::namespace('Market')->group(function () {
    Route::get('/product/{product:slug}', [ProductCustomerController::class, 'product'])->name('customer.market.product');
    Route::post('/add-comment/prodcut/{product:slug}', [ProductCustomerController::class, 'addComment'])->name('customer.market.add-comment');
    Route::get('/add-to-favorite/prodcut/{product:slug}', [ProductCustomerController::class, 'addToFavorite'])->name('customer.market.add-to-favorite');
});

Route::namespace('Profile')->group(function () {

    Route::get('/orders', [ProfileOrderController::class, 'index'])->name('customer.profile.orders');
    Route::get('/my-favorites', [FavoriteController::class, 'index'])->name('customer.profile.my-favorites');
    Route::get('/my-favorites/delete/{product}', [FavoriteController::class, 'delete'])->name('customer.profile.my-favorites-delete');
    Route::get('/profile', [ProfileController::class, 'index'])->name('customer.profile.profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('customer.profile.profile.update');
    Route::get('/my-addresses', [ProfileAddressController::class, 'index'])->name('customer.profile.my-addresses');
    Route::get('/my-ticket', [CustomerTicketController::class, 'index'])->name('customer.profile.my-ticket');
    Route::get('my-ticket/show/{ticket}', [CustomerTicketController::class, 'show'])->name('customer.profile.my-ticket.show');
    Route::post('my-tickets/answer/{ticket}', [CustomerTicketController::class, 'answer'])->name('customer.profile.my-ticket.answer');
    Route::get('my-ticket/change/{ticket}', [CustomerTicketController::class, 'change'])->name('customer.profile.my-ticket.change');
    Route::get('my-ticket/create', [CustomerTicketController::class, 'create'])->name('customer.profile.my-ticket.create');
    Route::post('my-ticket/store', [CustomerTicketController::class, 'store'])->name('customer.profile.my-ticket.store');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});