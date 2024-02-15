<?php

namespace App\Http\Controllers\AuthApi;

use App\Http\Controllers\Controller;
use App\Http\Requests\RequestLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    protected $user;
    public function __construct(User $user)
    {

        $this->user = $user;
        
    }

    public function login(Request $request){
   
        // pegando so campo email e password
        $credentials = $request->only('email','password');
        // autenticando se for true cria o token
        
        if(Auth::attempt($credentials)){
       
         
            // filtrando usuario e gerando token
            $user = $this->user->where('email',$request->email)->first();
          
            $token = $user->createToken('token');
             // retorno 
            return response()->json(['token'=>$token->plainTextToken,'user'=>$user],200);
         
        }
         // retorno de error
         return response()->json(['erros'=>'Verifique seu usuario e senha'],404);
    

        
    }

    public function logout(Request $request){
        $client = $request->user();
        $client->tokens()->delete();


        return response()->json(['message','Deslogado com sucesso'],200);

    }
}
