<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// <?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//$user = \Auth::user()->name;
//if(\Auth::check()) {
//    $user = \Auth::user();
//}else
//{
//    $user = null;
//}
//dd(\Auth::user());



//View::share('currentUser',$user);
//View::share('adminAccess',1);
//dd(\Auth::user());
// Uploading files from article
Route::post('/fileupload','GeneralController@articleupload');

Route::get('/', function(){
   // return \Auth::user();

    //dd($currentUser);
    $page = App\Models\page::find(2);
    //return view('front.layouts.master');
    return view('front.home',compact('page'));
});

Route::get('home', 'HomeController@index');
Route::get('/test', function(){
	//echo Supyo::greeting();
	return view('awesom::newpackageview')->with('route_name','from main controller');
});


//Route::get('/myadmin', function(){
//
//    return
//	return redirect('/myadmin/news');
//});

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);



Route::group(['prefix' => 'myadmin', 'middleware' => 'auth'], function()
{
    Route::get('/', function(){

        //return redirect('myadmin/news');

        $pages = \App\Models\page::count();
        return view('admin/dashboard2', compact('pages'));

    });
//    Route::get('dashboard', [
//        'uses' => 'generalController@dashboard',
//    ]);


    Route::resource('api/pages', 'API\pageAPIController');

    Route::resource('pages', 'PageController');

    Route::get('pages/{id}/delete', [    'as' => 'pages.delete', 'uses' => 'PageController@destroy',
    ]);

    Route::resource('api/staff', 'API\StaffAPIController');

    Route::resource('staff', 'StaffController');

    Route::get('staff/{id}/delete', [    'as' => 'staff.delete', 'uses' => 'StaffController@destroy',
    ]);

    Route::resource('faqs', 'FaqController');

    Route::get('faqs/{id}/delete', [    'as' => 'faqs.delete', 'uses' => 'FaqController@destroy',
    ]);


    Route::resource('api/news', 'API\NewsAPIController');

    Route::resource('news', 'NewsController');

    Route::get('news/{id}/delete', [
        'as' => 'news.delete',
        'uses' => 'NewsController@destroy',
    ]);

    Route::resource('api/contacts', 'API\ContactAPIController');

    Route::resource('contacts', 'ContactController');

    Route::get('contacts/{id}/delete', [
        'as' => 'contacts.delete',
        'uses' => 'ContactController@destroy',
    ]);

    Route::resource('api/complaints', 'API\ComplaintAPIController');

    Route::resource('complaints', 'ComplaintController');

    Route::get('complaints/{id}/delete', [
        'as' => 'complaints.delete',
        'uses' => 'ComplaintController@destroy',
    ]);



    Route::resource('pots', 'PotController');

    Route::get('pots/{id}/delete', [
        'as' => 'pots.delete',
        'uses' => 'PotController@destroy',
    ]);


    Route::resource('api/pcategories', 'API\PcategoryAPIController');

    Route::resource('pcategories', 'PcategoryController');

    Route::get('pcategories/{id}/delete', [
        'as' => 'pcategories.delete',
        'uses' => 'PcategoryController@destroy',
    ]);


    Route::resource('api/vcategories', 'API\VcategoryAPIController');

    Route::resource('vcategories', 'VcategoryController');

    Route::get('vcategories/{id}/delete', [
        'as' => 'vcategories.delete',
        'uses' => 'VcategoryController@destroy',
    ]);


    Route::resource('api/palbums', 'API\PalbumAPIController');

    Route::resource('palbums', 'PalbumController');

    Route::get('palbums/{id}/delete', [
        'as' => 'palbums.delete',
        'uses' => 'PalbumController@destroy',
    ]);



    Route::resource('api/vcategories', 'API\VcategoryAPIController');

    Route::resource('vcategories', 'VcategoryController');

    Route::get('vcategories/{id}/delete', [
        'as' => 'vcategories.delete',
        'uses' => 'VcategoryController@destroy',
    ]);


    Route::resource('api/valbums', 'API\ValbumAPIController');

    Route::resource('valbums', 'ValbumController');

    Route::get('valbums/{id}/delete', [
        'as' => 'valbums.delete',
        'uses' => 'ValbumController@destroy',
    ]);


    Route::resource('api/mobiles', 'API\MobileAPIController');

    Route::resource('mobiles', 'MobileController');

    Route::get('mobiles/{id}/delete', [
        'as' => 'mobiles.delete',
        'uses' => 'MobileController@destroy',
    ]);


});



Route::get('faq', function(){

    $faqs = App\Models\Faq::all();

    if(empty($faqs))
    {
        Flash::error('There are no faq\'s found');
        return redirect(route(''));
    }

    return view('front.faqs',compact('faqs'));
});

Route::get('news', function(){

    $allnews = App\Models\News::paginate(5);
    if(empty($allnews))
    {
        Flash::error('There are no faq\'s found');
        return redirect(route(''));
    }
//dd($allnews);
    return view('front.news.index',compact('allnews'));
});

Route::get('news/{slug}', function($slug){

    $news = App\Models\News::whereSlug($slug)->first();

    if(empty($news))
    {
        Flash::error('There are no faq\'s found');
        return redirect(route(''));
    }

    return view('front.news.show',compact('news'));
});

Route::get('staff/{slug}', function($slug){

    $staffs = App\Models\Staff::whereCategory($slug)->get();

    //dd($staffs);

    if(empty($staffs))
    {
        Flash::error('Staff not found');
        return redirect('/');
    }
    else
    {
      //  echo 'not empty';
    }

    return view('front.staff',compact('staffs'));
});


//

//
//Route::get('photogallery',function(){
//
//  //  return 'sad';
//    //$data = App\Models\Pcategory::with('Palbums')->get();
//    $data = App\Models\Pcategory::find(2)->palbums();
//    dd($data);
//    //$data = App\Models\Pcategory::with('palbums')->get();
//
//    // return view('front/photogallery',compact('data') );
//});

Route::get('photogallery',function(){

    $data = App\Models\Pcategory::with('palbums')->get();
    return view('front/photogallery',compact('data') );
});
//

Route::get('videogallery',function(){

    $data = App\Models\Vcategory::with('valbums')->get();
    return view('front/videogallery',compact('data') );
});


Route::get('contact-us',function(){
    return view('front/contact');
});


Route::get('tour',function(){
    return view('front/tour');
});

//Route::get('contact-us',function(){
//
//   return 'Under construction';
//});

//Route::post('contact-us', 'ContactController@rrrr');

route::post('contact-us',function(){
   // dd();
    $input = Input::all();

    $contact = \App\Models\Contact::create($input);

    $name  = reset($input);
    Flash::success("Contact $name Submitted successfully");

    return redirect('/contact-us');
});


Route::get('reg', function(){

   // $bb = \App\Models\Mstring::all();

  //  var_dump($bb);

    $do1 = 15;

    $bb = \App\Models\Mstring::whereCreated(0)->get();
    dd();
    foreach($bb as $a)
    {


        if(!empty($a->mstring)) {
            $string1 = $a->mstring;

           // var_dump($a->pyear);

            if(is_null($a->pyear)) {
                dd("Please enter year");
            }

        $pattern = '/\d{4}/';
        ////var_dump($string1);
        $date = preg_match($pattern, $string1, $match);
        //str, replacement, 1
        $string = preg_replace($pattern,';', $string1,1);
        //var_dump($match);
        //var_dump($string);

        $pieces = explode(";", $string);
     //   dd($match);

        $input['authors'] = empty($pieces[0]) ? '' : $pieces[0];
        $input['year'] = empty($match[0]) ? '' : $match[0];
        $input['article'] = empty($pieces[1]) ? '' : $pieces[1];
        $input['contact'] = empty($pieces[2]) ? '' : $pieces[2];
        $input['pyear'] = $a->pyear;
        $input['serialno'] = $a->id;
           // var_dump($input['pyear']);


//            $input['authors'] = $pieces[0] ? $pieces[0] : '';
//            $input['year'] = $match[0] ? $match[0] : '';
//            $input['article'] = $pieces[1] ? $pieces[1] : '';
//            $input['contact'] = empty($pieces[2]) ? '' : $pieces[2];
        //dd('000');

        //$mobile = $this->mobileRepository->store($input);


            echo   \App\Models\Mobile::create($input);

           if( empty($pieces[2]))
           {
               $a->created = 2;
           }
            else {
                $a->created = 1;
            }
            $a->save();
        }
    }



//To split a camel-cased string using preg_split() with lookaheads and lookbehinds:
//
//
//function splitCamelCase($str) {
//    return preg_split('/(?<=\\w)(?=[A-Z])/', $str);
//}
//
});

Route::get('logic2', function(){



    // $bb = \App\Models\Mstring::all();

    //  var_dump($bb);

    $do1 = 15;
    $bb = \App\Models\Mstring::whereCreated(0)->get();
    $converted = [];
    $nonconverted = [];
    foreach($bb as $a)
    {


        if(!empty($a->mstring)) {
            $string1 = $a->mstring;

            // var_dump($a->pyear);

            if(is_null($a->pyear)) {
                dd("Please enter year");
            }

            // $pattern = '/\d{4}/';
            $p1 = '/\(/';
            $p2 = '/\)/';
            //$string = preg_replace($pattern,';', $string1,1);
            ////var_dump($string1);
            $date = preg_match($p1, $string1, $match);
            //str, replacement, 1
            $string = preg_replace($p1,';', $string1,1);
            $string = preg_replace($p2,';', $string,1);
            //var_dump($match);
            //var_dump($string);

            $pieces = explode(";", $string);
            //   dd($pieces);

            $input['authors'] = empty($pieces[0]) ? '' : $pieces[0];
            $input['year'] = empty($pieces[1]) ? '' : $pieces[1];
            //$input['year'] = empty($match[0]) ? '' : $match[0];
            // $input['article'] = empty($pieces[1]) ? '' : $pieces[1];
            $input['contact'] = empty($pieces[2]) ? '' : $pieces[2];
            $input['pyear'] = $a->pyear;
            $input['serialno'] = $a->id;
            // var_dump($input['pyear']);


//            $input['authors'] = $pieces[0] ? $pieces[0] : '';
//            $input['year'] = $match[0] ? $match[0] : '';
//            $input['article'] = $pieces[1] ? $pieces[1] : '';
//            $input['contact'] = empty($pieces[2]) ? '' : $pieces[2];
            //dd('000');

            //$mobile = $this->mobileRepository->store($input);


            echo   \App\Models\Mobile::create($input);

            if( empty($pieces[2]))
            {
                $nonconverted[] =$a->id ;
            }
            else {
                $converted[] =$a->id ;
            }
            //  $a->save();
            // view('blank');
        }
    }
//dd($converted);
    \App\Models\Mstring::whereIn('id', $converted) ->update(['created' => 1]);

    \App\Models\Mstring::whereIn('id', $nonconverted)->update(['created' => 2]);


//To split a camel-cased string using preg_split() with lookaheads and lookbehinds:
//
//
//function splitCamelCase($str) {
//    return preg_split('/(?<=\\w)(?=[A-Z])/', $str);
//}
//
});

Route::get('logic3', function(){

    $bb = \App\Models\Mstring::whereCreated(0)->get();

    $converted = [];
    $nonconverted = [];

    foreach($bb as $a)
    {
        if(!empty($a->mstring)) {
            $string1 = $a->mstring;

            // var_dump($a->pyear);

            if(is_null($a->pyear)) {
                dd("Please enter year");
            }

            $pattern = '/\d{4}/';
            $pattern2 = '/\./';
            ////var_dump($string1);
            $date = preg_match($pattern, $string1, $match);
            //str, replacement, 1
            $string = preg_replace($pattern,';', $string1,1);
            $string = preg_replace($pattern2,';', $string,1);
            //var_dump($match);
           // var_dump($string);

            $pieces = explode(";", $string);
            //dd($pieces);
            $input['serialno'] = $a->id;
            $input['authors'] = empty($pieces[0]) ? '' : $pieces[0];
            $input['year'] = empty($match[0]) ? '' : $match[0];
            $input['article'] = empty($pieces[1]) ? '' : $pieces[1];
            $input['contact'] = empty($pieces[2]) ? '' : $pieces[2];
            $input['pyear'] = $a->pyear;

            echo   \App\Models\Mobile::create($input);

            if( empty($pieces[2]))
            {
                $nonconverted[] =$a->id ;
            }
            else {
                $converted[] =$a->id ;
            }
          //  $a->save();
           // view('blank');
        }
    }
//dd($converted);
    \App\Models\Mstring::whereIn('id', $converted) ->update(['created' => 1]);

    \App\Models\Mstring::whereIn('id', $nonconverted)->update(['created' => 2]);

});


//Route::get('dashboard',); // cache clear kar ata kar





Route::get('logout', function() {

    Auth::logout();
    return redirect('/');

});




Route::get('pag','\App\Http\Controllers\PageController@test');
Route::get('pag2','\App\Http\Controllers\page2Controller@test2');

Route::get('pages/{id}', [
    'uses' => '\App\Http\Controllers\PageController@show',
]);
