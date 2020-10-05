<?php 
Route::get('/', function() {
    return redirect()->route('admin.login.form');
    //return view('admin.dashboard');
});



Route::group(['middleware' => 'admin.guest'], function() {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login.post');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.request');

    Route::get('new-password/{id}', 'Auth\ResetPasswordController@newPasswordForm')->name('admin.password.newPassword');

    Route::post('password/set-password/{id}', 'Auth\ResetPasswordController@sepPassword')->name('admin.password.setPassword');
});




Route::group(['middleware' => 'admin','as' => 'admin.'], function() { 


    Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout.post');
    


    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index')->middleware('can:browse_dashboard');

    Route::post('file', 'DashboardController@file')->name('file');


    Route::get('bread', 'BreadController@index')->name('bread.index')->middleware('can:browse_bread');
    Route::get('bread/create', 'BreadController@create')->name('bread.create')->middleware('can:add_bread');
    Route::get('bread/{slug}/edit', 'BreadController@edit')->name('bread.edit')->middleware('can:edit_bread');
    Route::put('bread/{bread}/update', 'BreadController@update')->name('bread.update')->middleware('can:edit_bread');
    Route::delete('bread/{slug}/delete', 'BreadController@destroy')->name('bread.destroy')->middleware('can:delete_bread');
    Route::post('bread', 'BreadController@store')->name('bread.store')->middleware('can:add_bread');


    Route::get('role', 'RoleController@index')->name('role.index')->middleware('can:browse_role');
    Route::get('role/create', 'RoleController@create')->name('role.create')->middleware('can:add_role');
    Route::get('role/{role}/edit', 'RoleController@edit')->name('role.edit')->middleware('can:edit_role');
    Route::post('role', 'RoleController@store')->name('role.store')->middleware('can:add_role');
    Route::put('role/{role}', 'RoleController@update')->name('role.update')->middleware('can:edit_role');


    Route::get('menu', 'MenuController@index')->name('menu.index')->middleware('can:browse_menu');
    Route::get('menu/create', 'MenuController@create')->name('menu.create')->middleware('can:add_menu');
    Route::get('menu/{menu}/edit', 'MenuController@edit')->name('menu.edit')->middleware('can:edit_menu');
    Route::post('menu', 'MenuController@store')->name('menu.store')->middleware('can:add_menu');
    Route::put('menu/{menu}', 'MenuController@update')->name('menu.update')->middleware('can:edit_menu');
    Route::delete('menu/{menu}', 'MenuController@destroy')->name('menu.destroy')->middleware('can:delete_menu');

    Route::get('setting', 'MenuController@index')->name('setting.index')->middleware('can:browse_setting');
    Route::get('site-setting', 'SiteSettingController@index')->name('site-setting.index')->middleware('can:browse_site_setting');
    Route::get('blog', 'SiteSettingController@index')->name('blog.index')->middleware('can:browse_blog');


    Route::post('logo', 'SiteSettingController@logo')->name('site-setting.logo')->middleware('can:logo_site_setting');


    //sliders
    Route::match(['get','patch'],'project', 'ProjectController@index')->name('project.index')->middleware('can:browse_project');
    Route::get('project/create', 'ProjectController@create')->name('project.create')->middleware('can:add_project');
    Route::get('project/{project}', 'ProjectController@show')->name('project.show')->middleware('can:read_project');
    Route::get('project/{project}/edit', 'ProjectController@edit')->name('project.edit')->middleware('can:edit_project');
    Route::post('project', 'ProjectController@store')->name('project.store')->middleware('can:add_project');
    Route::put('project/{project}', 'ProjectController@update')->name('project.update')->middleware('can:edit_project');
    Route::delete('project/{project}', 'ProjectController@destroy')->name('project.destroy')->middleware('can:delete_project');
    Route::patch('project','ProjectController@index')->name('project.index')->middleware('can:browse_categories');

    //Slider
    Route::match(['get','patch'],'slider', 'SliderController@index')->name('slider.index')->middleware('can:browse_slider');
    Route::get('slider/create', 'SliderController@create')->name('slider.create')->middleware('can:add_slider');
    Route::get('slider/{slider}', 'SliderController@show')->name('slider.show')->middleware('can:read_slider');
    Route::get('slider/{slider}/edit', 'SliderController@edit')->name('slider.edit')->middleware('can:edit_slider');
    Route::post('slider', 'SliderController@store')->name('slider.store')->middleware('can:add_slider');
    Route::put('slider/{slider}', 'SliderController@update')->name('slider.update')->middleware('can:edit_slider');
    Route::delete('slider/{slider}', 'SliderController@destroy')->name('slider.destroy')->middleware('can:delete_slider');

    //Post
    Route::match(['get','patch'],'post', 'PostController@index')->name('post.index')->middleware('can:browse_post');
    Route::get('post/create', 'PostController@create')->name('post.create')->middleware('can:add_post');
    Route::get('post/{post}', 'PostController@show')->name('post.show')->middleware('can:read_post');
    Route::get('post/{post}/edit', 'PostController@edit')->name('post.edit')->middleware('can:edit_post');
    Route::post('post', 'PostController@store')->name('post.store')->middleware('can:add_post');
    Route::put('post/{post}', 'PostController@update')->name('post.update')->middleware('can:edit_post');
    Route::delete('post/{post}', 'PostController@destroy')->name('post.destroy')->middleware('can:delete_post');

    //Category
    Route::match(['get','patch'],'category', 'CategoryController@index')->name('category.index')->middleware('can:browse_category');
    Route::get('category/create', 'CategoryController@create')->name('category.create')->middleware('can:add_category');
    Route::get('category/{category}', 'CategoryController@show')->name('category.show')->middleware('can:read_category');
    Route::get('category/{category}/edit', 'CategoryController@edit')->name('category.edit')->middleware('can:edit_category');
    Route::post('category', 'CategoryController@store')->name('category.store')->middleware('can:add_category');
    Route::put('category/{category}', 'CategoryController@update')->name('category.update')->middleware('can:edit_category');
    Route::delete('category/{category}', 'CategoryController@destroy')->name('category.destroy')->middleware('can:delete_category');


    //Tag
    Route::match(['get','patch'],'tag', 'TagController@index')->name('tag.index')->middleware('can:browse_tag');
    Route::get('tag/create', 'TagController@create')->name('tag.create')->middleware('can:add_tag');
    Route::get('tag/{tag}', 'TagController@show')->name('tag.show')->middleware('can:read_tag');
    Route::get('tag/{tag}/edit', 'TagController@edit')->name('tag.edit')->middleware('can:edit_tag');
    Route::post('tag', 'TagController@store')->name('tag.store')->middleware('can:add_tag');
    Route::put('tag/{tag}', 'TagController@update')->name('tag.update')->middleware('can:edit_tag');
    Route::delete('tag/{tag}', 'TagController@destroy')->name('tag.destroy')->middleware('can:delete_tag');


    //fearure
    Route::match(['get','patch'],'feature', 'FeatureController@index')->name('feature.index')->middleware('can:browse_feature');
    Route::get('feature/create', 'FeatureController@create')->name('feature.create')->middleware('can:add_feature');
    Route::get('feature/{feature}', 'FeatureController@show')->name('feature.show')->middleware('can:read_feature');
    Route::get('feature/{feature}/edit', 'FeatureController@edit')->name('feature.edit')->middleware('can:edit_feature');
    Route::post('feature', 'FeatureController@store')->name('feature.store')->middleware('can:add_feature');
    Route::put('feature/{feature}', 'FeatureController@update')->name('feature.update')->middleware('can:edit_feature');
    Route::delete('feature/{feature}', 'FeatureController@destroy')->name('feature.destroy')->middleware('can:delete_feature');


    //backlog
    Route::match(['get','patch'],'backlog', 'BacklogController@index')->name('backlog.index');
    Route::get('backlog/create', 'BacklogController@create')->name('backlog.create');
    Route::get('backlog/{backlog}', 'BacklogController@show')->name('backlog.show');
    Route::get('backlog/download/{backlog}', 'BacklogController@download')->name('backlog.download');
    Route::post('backlog', 'BacklogController@store')->name('backlog.store');
    Route::put('backlog/{backlog}', 'BacklogController@update')->name('backlog.update');
    Route::delete('backlog/{backlog}', 'BacklogController@destroy')->name('backlog.destroy');

    Route::put('keep/status', 'BacklogController@changeStatus')->name('keep.changeStatus');

    Route::put('keep-print/status', 'BacklogController@printStatus')->name('keep.printStatus');
    Route::put('keep-shipped/status', 'BacklogController@shippedStatus')->name('keep.shippedStatus');

    Route::match(['get','patch'],'backlog-user-image/{user}', 'BacklogController@UserImage')->name('backlog.user.image');




    //user-image
    Route::match(['get','patch'],'user-image', 'UserImageController@index')->name('user-image.index')->middleware('can:browse_user_image');
    Route::get('user-image/create', 'UserImageController@create')->name('user-image.create')->middleware('can:add_user_image');
    Route::get('user-image/{id}', 'UserImageController@show')->name('user-image.show')->middleware('can:read_user_image');
    Route::get('user-image/{id}/edit', 'UserImageController@edit')->name('user-image.edit')->middleware('can:edit_user_image');
    Route::post('user-image', 'UserImageController@store')->name('user-image.store')->middleware('can:add_user_image');
    Route::put('user-image/{id}', 'UserImageController@update')->name('user-image.update')->middleware('can:edit_user_image');
    Route::delete('user-image/{id}', 'UserImageController@destroy')->name('user-image.destroy')->middleware('can:delete_user_image');



     //user 
    Route::match(['get','patch'],'user', 'UserController@index')->name('user.index')->middleware('can:browse_user');
    Route::post('user/export', 'UserController@export')->name('user.export')->middleware('can:export_user');
    Route::get('user/{user}/edit', 'UserController@edit')->name('user.edit')->middleware('can:edit_user');
    Route::get('user/{user}', 'UserController@show')->name('user.show')->middleware('can:read_user');
    Route::get('user/{user}/login', 'UserController@login')->name('user.login')->middleware('can:login_user');


     //help 
    Route::match(['get','patch'],'help', 'HelpController@index')->name('help.index')->middleware('can:browse_help');
    Route::post('help/export', 'HelpController@export')->name('help.export')->middleware('can:export_help');
    Route::get('help/{help}/edit', 'HelpController@edit')->name('help.edit')->middleware('can:edit_help');
    Route::get('help/{help}', 'HelpController@show')->name('help.show')->middleware('can:read_help');
    Route::get('help/{help}/login', 'HelpController@login')->name('help.login')->middleware('can:login_help');
   
   Route::get('user/{user}/{backlog}/edit', 'BacklogController@edit')->name('backlog.edit');


    //admin 
    Route::match(['get','patch'],'admin', 'AdminController@index')->name('admin.index')->middleware('can:browse_admin');
    Route::get('admin/create', 'AdminController@create')->name('admin.create')->middleware('can:add_admin');
    Route::get('admin/{admin}', 'AdminController@show')->name('admin.show')->middleware('can:read_admin');
    Route::get('admin/{admin}/edit', 'AdminController@edit')->name('admin.edit')->middleware('can:edit_admin');
    Route::post('admin', 'AdminController@store')->name('admin.store')->middleware('can:add_admin');
    Route::put('admin/{admin}', 'AdminController@update')->name('admin.update')->middleware('can:edit_admin');
    Route::delete('admin/{admin}', 'AdminController@destroy')->name('admin.destroy')->middleware('can:delete_admin');

    Route::put('admin/status', 'AdminController@changeStatus')->name('admin.change-status')->middleware('can:change_status_admin');


    //fearure
    Route::match(['get','patch'],'image', 'ImageController@index')->name('image.index')->middleware('can:browse_image');
    Route::get('image/create', 'ImageController@create')->name('image.create')->middleware('can:add_image');
    Route::get('image/{image}', 'ImageController@show')->name('image.show')->middleware('can:read_image');
    Route::get('image/{image}/edit', 'ImageController@edit')->name('image.edit')->middleware('can:edit_image');
    Route::post('image', 'ImageController@store')->name('image.store')->middleware('can:add_image');
    Route::put('image/{image}', 'ImageController@update')->name('image.update')->middleware('can:edit_image');
    Route::delete('image/{image}', 'ImageController@destroy')->name('image.destroy')->middleware('can:delete_image');

    
    Route::get('password', 'ProfileController@changePasswordForm')->name('change-password');
    Route::put('password', 'ProfileController@updatePassword');
    Route::get('profile', 'ProfileController@edit')->name('profile.update');
    Route::put('profile/{admin}', 'ProfileController@update')->name('myprofile.update');


    Route::post('keep/assign-editor', 'BacklogController@assignEditor')->name('editor.assign');



    //order
    Route::match(['get','patch'],'transaction', 'TransactionController@index')->name('transaction.index')->middleware('can:browse_transaction');
    Route::get('transaction/create', 'TransactionController@create')->name('transaction.create')->middleware('can:add_transaction');
    Route::get('transaction/{transaction}', 'TransactionController@show')->name('transaction.show')->middleware('can:read_transaction');
    Route::get('transaction/{transaction}/edit', 'TransactionController@edit')->name('transaction.edit')->middleware('can:edit_transaction');
    Route::post('transaction', 'TransactionController@store')->name('transaction.store')->middleware('can:add_transaction');
    Route::put('transaction/{transaction}', 'TransactionController@update')->name('transaction.update')->middleware('can:edit_transaction');
    Route::delete('transaction/{transaction}', 'TransactionController@destroy')->name('transaction.destroy')->middleware('can:delete_transaction');


    //order
    Route::match(['get','patch'],'order', 'OrderController@index')->name('order.index')->middleware('can:browse_order');
    Route::get('order/create', 'OrderController@create')->name('order.create')->middleware('can:add_order');
    Route::get('order/{order}', 'OrderController@show')->name('order.show')->middleware('can:read_order');
    Route::get('order/{order}/edit', 'OrderController@edit')->name('order.edit')->middleware('can:edit_order');
    Route::post('order', 'OrderController@store')->name('order.store')->middleware('can:add_order');
    Route::put('order/{order}', 'OrderController@update')->name('order.update')->middleware('can:edit_order');
    Route::delete('order/{order}', 'OrderController@destroy')->name('order.destroy')->middleware('can:delete_order');
  

    
//Slider
    Route::match(['get','patch'],'notification', 'NotificationController@index')->name('notification.index')->middleware('can:browse_notification');
    Route::get('notification/create', 'NotificationController@create')->name('notification.create')->middleware('can:add_notification');
    Route::get('notification/{notification}', 'NotificationController@show')->name('notification.show')->middleware('can:read_notification');
    Route::get('notification/{notification}/edit', 'NotificationController@edit')->name('notification.edit')->middleware('can:edit_notification');
    Route::post('notification', 'NotificationController@store')->name('notification.store')->middleware('can:add_notification');
    Route::put('notification/{notification}', 'NotificationController@update')->name('notification.update')->middleware('can:edit_notification');
    Route::delete('notification/{notification}', 'NotificationController@destroy')->name('notification.destroy')->middleware('can:delete_notification');
    
    


});

    
