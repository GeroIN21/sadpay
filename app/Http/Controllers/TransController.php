<?php

namespace App\Http\Controllers;

use App\org;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Client;
use App\Purse;
use App\Pay;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class TransController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

public function trans(Request $request){
   $transactions = new Transaction;
   $purse = new Purse;
   $transactions->trans_pay_sum = $request->trans_pay_sum;
   $transactions->trans_pay_appoint = $request->trans_pay_appoint;
   $transactions->trans_pay_purse_name = $request->trans_pay_purse_name;
   $transactions->trans_pay_purse_client_id = Auth::id();

   if($request->get('page') == 'moneyfill')
   {
   $this->purse($request);
   }
   if($request->get('page') == 'payment')
   {
   $this->payment($request);
   }
   $transactions->save();

   $transactions = Transaction::orderBy('created_at', 'desc')
   ->where('trans_pay_purse_client_id',  Auth::id())
   ->get();

   return view('home',[
   'transactions' => $transactions
   ]);
  return view('home');
  }

  public function purse(Request $request){

     $purse = Purse::where('purse_name', $request->trans_pay_purse_name)->first();
     $purse->increment('purse_balance',  $request->trans_pay_sum);
     $purse->update();
     return view('home');
  }
  public function payment(Request $request){

    $purse = Purse::where('purse_name', $request->trans_pay_purse_name)->first();
if ($purse) {
  if ($request->trans_pay_sum > $purse->purse_balance){
    return redirect()->back()->with('msg', 'Сумма превышает имеющуюся');
  }
    $purse->decrement('purse_balance',  $request->trans_pay_sum);
    $purse->update();
}
else {
    return redirect()->back()->withInput()->with('error', 'Кошелек не найден!');
}
  }
}
