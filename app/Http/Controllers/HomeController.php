<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {

      $transactions = Transaction::orderBy('created_at', 'asc')
                      ->where('trans_pay_purse_client_id', Auth::id())
                      ->get();
    //
    //   // $trans = Transaction::orderBy('created_at', 'asc')
    //   //                 ->where('trans_id', $id)
    //   //                 ->first();

    $trans = ($id) ? Transaction::where('trans_id', $id)->first() : Transaction::first();

    return view('home', compact('transactions', 'trans'));

}
public function get($id){
  $transactions = Transaction::orderBy('created_at', 'asc')
                  ->where('trans_pay_purse_client_id', Auth::id())
                  ->get();

  $trans = Transaction::orderBy('created_at', 'asc')
                  ->where('trans_id', $id)
                  ->first();

  return view('home/{id}', [
  'transactions' => $transactions,
  'trans' =>$trans
  ]);
}
}
