<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://www.datos.gov.co/resource/xdk5-pm3f.json');
        $response = $request->getBody()->getContents();
       
       $response2= json_decode($response, true);
        $arraya= array();
        foreach ($response2 as $municipio){
               $departamento=  $municipio["departamento"];
             $resultado= $this->verificar($departamento,$arraya);
               ($resultado)? "": array_push($arraya,$departamento);
               
       }  
      
        return view('auth.register',['Departamentos'=>$arraya,'Municipios'=>$response2]);
    }
    public function verificar($departamento,$arraya){
        $res=false;
        foreach($arraya as $b){
           
          if($b==$departamento){
            $res= true;
          break;
          }
        }
        return $res;

    }
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
