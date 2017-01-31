<?php

namespace GDCE\Framework\Auth;

use App\Models\Access\User\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

trait GDCECNSWLogin{
    use AuthenticatesUsers;

    public function showLoginForm()
    {
        $query = http_build_query([
            'client_id' => config('gdce-cnsw-auth.cnsw_client_id'),
            'redirect_uri' => config('gdce-cnsw-auth.cnsw_redirect'),
            'response_type' => 'code',
            'scope' => '',
        ]);


        return redirect(config('gdce-cnsw-auth.cnsw_host').'/oauth/authorize?'.$query);
    }

    public function auth_callback(Request $request){
        $http = new \GuzzleHttp\Client();
        $response = $http->post(config('gdce-cnsw-auth.cnsw_host').'oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' =>  config('gdce-cnsw-auth.cnsw_client_id'),
                'client_secret' => config('gdce-cnsw-auth.cnsw_client_secret'),
                'redirect_uri' => config('gdce-cnsw-auth.cnsw_redirect'),
                'code' => $request->code,
            ],
        ]);
        $access = json_decode((string) $response->getBody(), true);
        // $access['access_token']; eyJ0eXAiOiJKV1Q....
        // $access['expires']; 1296000
        // $access['token_type']; "Bearer"

        $response = $http->request('GET', config('gdce-cnsw-auth.cnsw_host').'api/user', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$access['access_token'],
            ],
        ]);

        $user_ = json_decode((string) $response->getBody(), true);
        // $user['name'] user
        // $user['email'] user@user
        $user = User::where('email',$user_['email'])->first();

        if(is_null($user)){
            $user_['password'] = rand(1,20);
            $user_['status'] = 1;
            $user_['confirmed'] = 1;
            $this->users->create(['data' => $user_, 'roles' => []]);
        }
        $user = User::where('email',$user_['email'])->first();

        access()->loginUsingId($user->id);
//        dd(access()->loginUsingId($user->id));

        return redirect()->intended($this->redirectPath());
    }
}