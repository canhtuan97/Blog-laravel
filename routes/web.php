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


//Hiển thị trang chủ
Route::get('/','HomeController@home')->name('/');
//Login-logout-register
Auth::routes();


//Group display page admin
Route::group(['prefix'=>'/','middleware'=>'checkadmin'],function(){
	Route::get('adminpost','AdminControllers@getAdminPost')->name('admin.post.get');
	Route::post('adminpostdelete','AdminControllers@deleteAdminPost')->name('admin.post.delete');
	Route::get('adminuser','AdminControllers@getAdminUser')->name('admin.user.get');
	Route::post('adminuserdelete','AdminControllers@deleteAdminUser')->name('admin.user.delete');

	
	Route::get('admin_details_post/{id}','AdminControllers@adminDetailsPost')->name('admin.details.post');
	Route::post('admin_delete_comment','AdminControllers@adminDeleteComment')->name('admin.delete.comment');
	// hiển thị form gửi maiil
	Route::get('mail','AdminControllers@getMail')->name('mail');

});


//Group display Home
Route::group(['prefix'=>'/display/home'],function(){
	//Tigm kiếm sp
	Route::post('find','SearchController@find')->name('find');
	Route::post('timkiem','SearchController@timKiem')->name('timkiem');
	Route::get('timkiem','SearchController@timKiem')->name('timkiem');
	Route::get('find','SearchController@getFind');
	
	//Hiển thị chi tiet bai viet
	Route::get('show_details_post/{id}','HomeController@showDetailsPost')->name('show.details.post');
	Route::post('show','HomeController@addComment')->name('add.comment');
	//Bắt sự click vào nút like
	Route::post('like','HomeController@like')->name('like');
	//Hiển thị chi tiết câu hỏi
	Route::get('show_details_question/{id}','HomeController@showDetailsQuestion')->name('show.details.question');
	//Hiển thị danh sách bài viết
	Route::get('list_post','HomeController@listPost')->name('list.post');
	//Hiển thị danh sách câu hỏi
	Route::get('list_question','HomeController@listQuestion')->name('list.question');
});

//Group User
Route::group(['prefix'=>'/user','middleware'=>'loginmiddleware'],function(){
//    //Hiển thị thông tin user ân nút xem thông tin
	Route::post('getUser', 'UserControllers@getUser')->name('getUser');
	//hiển thị thông tin người dùng khi ấn reset trang
	Route::get('getUser', 'UserControllers@getUser');
		//Update thông tin user
		Route::post('update', 'UserControllers@updateUser')->name('update');


	//Hiển thị form thay đổi mật khẩu
	Route::get('edit-password', function () {
	    return view('user/info/edit_password');
	})->name('edit.password');
	Route::post('edit-password', 'UserControllers@updatePassword')->name('user.edit-password');





	// Hiển thị form viết bài 
	Route::get('write','WriteControllers@get')->name('write');	
		// Save bài viết csdl
		Route::post('write','WriteControllers@post')->name('write.post');


	// Hiển thị form đặt câu hỏi
	Route::get('question','WriteControllers@questionGet')->name('write.question');
		// Thêm câu hỏi vào csdl
		Route::post('question','WriteControllers@questionPost')->name('question.post');


	//Hiển thị quản lí bài viết
	Route::get('managerpost','WriteControllers@managerpost')->name('managerpost');
		//Xử lí sự kiện delete hoặc edit 1 bài viết
		Route::post('delete_edit','WriteControllers@deleteAndEdit')->name('delete.edit');
		//Hiển thị form edit bài viết
		Route::get('edit_get_post/{id}','WriteControllers@editGetPost')->name('edit.get.post');
		//Update edit bài viết	
		Route::post('update_post','WriteControllers@updatePost')->name('update.post');
		//hiển thị form edit question
		Route::get('edit_get_question/{id}','WriteControllers@editGetQuestion')->name('edit.get.question');
		//update câu hỏi
		Route::post('updatepostquestion','WriteControllers@updateQuestion')->name('update.question');
// 		Route::get('getUser', 'UserControllers@getUser');


});