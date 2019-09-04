<?php
//group middleware
Route::group(['middleware'=>['web']],function(){
    // Authentication routes
Route::get('auth/login', ['as' => 'auth/login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('auth/login', ['as' => 'auth/login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\LoginController@logout']);

//Resgistration routes
 Route::get('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
 Route::post('auth/register', ['as' => 'auth/register.post', 'uses' => 'Auth\RegisterController@register']);
 
//Blog
    Route::get('project_blog/{slug}', ['as'=>'project_blog.single','uses'=>'BlogController@getSingle'])
        ->where('slug','[\w\d\-\_]+');
    Route::get('project_blog',['uses'=>'BlogController@getList','as'=>'project_blog.index']);
    Route::get('/', 'PagesController@getIndex');
    Route::get('about', 'PagesController@getAbout');
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
    Route::resource('posts','PostController');
});
//Category
Route::resource('categories','CategoryController', ['except'=>['create']]);
//Tag
Route::resource('tags','TagController', ['except'=>['create']]);
//Comments
Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}/edit',['uses'=>'CommentsController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'CommentsController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'CommentsController@destroy','as'=>'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'CommentsController@delete','as'=>'comments.delete']);


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
