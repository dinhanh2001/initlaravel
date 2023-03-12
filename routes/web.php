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


Route::get('/check',function(){
	return url('123.jpeg');
	downFile('https://media.cooky.vn/recipe/g1/1565/s300x300/recipe1565-prepare-step3-635629822234067544.jpg','234.jpeg');
});
Route::get('/time',function(){
    
});

Route::get('test',function(){
	$currentUrl = "https://www.cooky.vn";

    $foodName = "Thịt gà";
    $foodName = str_replace(' ', '-', $foodName);
    $foodName = urlencode($foodName);
    $output = getRequest($currentUrl.'/cach-lam/'.$foodName);

    $result = loadDom($output,'//a[@class="photo"]');
    $url = [];
    if ($result->length > 0) {
        for($i = 0 ; $i < $result->length ; $i++){
            array_push($url, $result->item($i)->getAttribute("href"));
        }
    }
    // Get page công thức
    $output = getRequest($currentUrl.$url[1]);

    // Load dom html
    $elementImages = loadDom($output,'//img[@class="photo img-responsive u-photo"]');
    $images = $elementImages->item(0)->getAttribute("src");
    $elementTitle = loadDom($output,'//h1[@class="p-name fn recipe-title "]');
    $title = $elementTitle->item(0)->nodeValue;
    $elementShortTitle = loadDom($output,'//div[@class="summary p-summary"]');
    $shortTitle = $elementShortTitle->item(0)->nodeValue;
    $elementNguyenLieu = loadDom($output,'//ul[@class="list-inline recipe-ingredient-list"]',true);
    $elementContent = loadDom($output,'//div[@id="recipe-step"]',true);
    $elementImg = loadDom($elementContent,'//img[@class="lazy"]');
    $imgs = [];
    foreach ($elementImg as $key => $img) {
        $stepImg = "recipe_images/".'recipe' . time().'.jpeg';
        file_put_contents($stepImg, fopen($img->getAttribute('data-src'), 'r'));
        $img = [
            'old' => $img->getAttribute('data-src'),
            'new' => asset($stepImg)
        ];
        array_push($imgs, $img);
    }
    foreach ($imgs as $img) {
        $elementContent = str_replace($img['old'],$img['new'],$elementContent);
    }
    dd($elementContent);
    $content = "<h2>Nguyên liệu</h2>".$elementNguyenLieu . $elementContent;
	// dd(file_get_contents('https://www.cooky.vn/cong-thuc/thit-bo-sot-tieu-15516'));
});
// Xác thực người dùng
Route::get('/user/login','HomeController@getLogin')->name('user.get.login');
Route::post('/user/login','HomeController@postLogin')->name('user.post.login');
Route::post('/user/register','HomeController@postRegister')->name('user.post.register');
Route::get('/user/logout','HomeController@getLogout')->name('user.get.logout');
Route::get('/redirect/{social}', 'SocialController@redirect')->name('user.redirect.social');
Route::get('/callback/{social}', 'SocialController@callback')->name('user.callback.social');
// Nhóm route của khách hàng sd trang web
Route::group([],function(){
	Route::get('/', 'HomeController@index')->name('user.index');
	Route::get('/recipe', 'HomeController@recipe')->name('user.recipe');
	Route::get('/recipe/show/{id}', 'HomeController@recipeShow')->name('user.recipe.show');
	Route::middleware('customer')->group(function(){
		Route::get('/profile', 'HomeController@profile')->name('user.profile');
		Route::post('/profile', 'HomeController@updateProfile')->name('user.update.profile');
		Route::post('/change-password', 'HomeController@postChangePassword')->name('user.change-password');
		Route::get('/menu', 'HomeController@menu')->name('user.menu');
		Route::get('/menu/create', 'MenuController@create')->name('user.menu.create');
		Route::get('/menu/index', 'MenuController@index')->name('user.menu.index');
		Route::resource('question','QuestionController',['as' => 'user']);
		Route::resource('comment','CommentController',['as' => 'user']);
	});
});

// Xác thực admin
Route::get('/login','AdminController@getLogin')->name('admin.get.login');
Route::post('/login','AdminController@postLogin')->name('admin.post.login');
Route::get('/logout','AdminController@getLogout')->name('admin.get.logout');
// Nhóm route của admin
Route::group(['prefix' => 'admin','middleware'=>'admin'], function () {
	Route::get('/','AdminController@index')->name('admin.index');
	Route::get('/food/many','FoodController@createMany')->name('admin.food.createmany');
	Route::post('/food/many','FoodController@storeMany')->name('admin.food.storemany');
	Route::delete('/food/many','FoodController@deleteMany')->name('admin.food.deletemany');
	Route::delete('/user/many','UserController@deleteMany')->name('admin.user.deletemany');
	Route::delete('/recipe/many','RecipeController@deleteMany')->name('admin.recipe.deletemany');
	Route::delete('/question/many','QuestionController@deleteMany')->name('admin.question.deletemany');
	Route::resource('user','UserController',['as' => 'admin']);
	Route::resource('recipe','RecipeController',['as' => 'admin']);
	Route::resource('food','FoodController',['as' => 'admin']);
	Route::resource('question','QuestionController',['as' => 'admin']);
});