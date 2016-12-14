<?php

namespace App\Http\Controllers;

use App\org;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Client;
use App\Purse;
use App\Currency;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PurseCreateController extends Controller
{
  public $lenght=16;
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){
    $currencys = Currency::orderBy('cur_id', 'desc')
              ->get();
    return view('purse', [
    'currencies' => $currencys
    ]);
    return view ('purse');
  }

  public function create(Request $request)
  {

    $cur = new Currency;
    $cur->cur_name=$request->cur_name;

      //dd($request->all());

        $purse = Purse::where('purse_client', Auth::id())->where('purse_cur', $request->purse_cur)->first();
        if ($purse) {

            return redirect()->back()->with('msg', 'Кошелек с такой валютой уже существует, попробуйте еще...');
        }
        else{
        $purse= new Purse;
        $purse->purse_name = $this->RandomNumber();
        $purse->purse_cur = $request->purse_cur;
        $purse->purse_client = Auth::id();
        $purse->save();
      }

    return view('home');
  }

  public function RandomNumber(){
    $result = '';
    for($i=0; $i<$this->lenght; $i++)
    {
      $result .=mt_rand(0,9);
    }
    return $result;
  }
}
