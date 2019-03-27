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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->group(function() {

    Route::prefix('user-management')->group(function() {

        Route::get('/','UserController@index')->name('userIndex');

        Route::get('edit/{user}','UserController@edit')->name('userEdit');
        Route::post('update/{user}','UserController@update')->name('userUpdate');
        
        Route::get('create','UserController@create')->name('userCreate');
        Route::post('store','UserController@store')->name('userStore');

        Route::get('delete/{user}','UserController@delete')->name('userDelete');
    });    

});

Route::prefix('oauth')->group(function() {
    Route::get('/',function() {
        return view('oauth');
    });

    Route::get("test", function() {
        $http = new \GuzzleHttp\Client;

        $response = $http->post('http://your-app.com/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => 'client-id',
                'client_secret' => 'client-secret',
                'username' => 'taylor@laravel.com',
                'password' => 'my-password',
                'scope' => '',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);

    });
});

Route::prefix('playground')->group(function() {

    Route::get('base64', function() {
        $xml = '<?xml version="1.0"?>
        <md:EntityDescriptor xmlns:md="urn:oasis:names:tc:SAML:2.0:metadata"
                             validUntil="2019-03-23T13:18:28Z"
                             cacheDuration="PT604800S"
                             entityID="http://spwebapp.test/saml/login">
            <md:SPSSODescriptor AuthnRequestsSigned="false" WantAssertionsSigned="false" protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">
                <md:NameIDFormat>urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified</md:NameIDFormat>
                <md:AssertionConsumerService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST"
                                             Location="http://spwebapp.test/saml/consume"
                                             index="1" />
                
            </md:SPSSODescriptor>
        </md:EntityDescriptor>';

        $data = base64_encode($xml);

        // $decoded = base64_decode(trim($data));
        
        // $xml = gzinflate($xml);


        return $xml;
    });

});