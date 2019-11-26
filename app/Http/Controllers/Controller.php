<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Carrinho;
use Auth;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
  
    
    public function __construct() {

       $user = Auth::user();
       View::share ( 'carrinho_conta', Carrinho::where('user_id', @Auth::user()->id)->count() );
       View::share ( 'user', $user );
    } 
}
