<?php

namespace App\Http\Controllers;

use App\org;
use App\Form;
use App\Purse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PurseController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function fill( Request $request)
  {
        $card = new Card;
     $card->card_num = $request->card_num;
     $card->card_ccv = $request->card_ccv;
     $card->card_date = $request->card_date;
     $card->card_user_id = Auth::id();
     $card->save();

     $purses = Purse::orderBy('created_at', 'desc')
     ->where('purse_client',  Auth::id())
     ->get();

    return view('moneyfill',[
    'purses' => $purses
    ]);
  }

  public function index(){
    return view('fill');
  }

}
