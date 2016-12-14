<?php

namespace App\Http\Controllers;

use App\org;
use App\Form;
use App\Purse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Card;
use App\Transaction;
use App\Pay;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PayController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $purses = Purse::orderBy('created_at', 'desc')
              ->where('purse_client', Auth::id())
              ->get();

    $orgs = Org::orderBy('created_at', 'desc')->get();
    return view('payment', [
    'orgs' => $orgs,
    'purses' => $purses
    ]);
  }

}
