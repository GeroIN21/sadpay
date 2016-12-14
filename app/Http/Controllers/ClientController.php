<?php

namespace App\Http\Controllers;

use App\org;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $this->authorize('client');
        $orgs = Org::orderBy('created_at', 'desc')->get();

        $clients = DB::table( 'clients' )
                  ->leftJoin( 'users', 'clients.client_user_id', '=', 'users.id' )
                  ->get();

        return view('client', [
        'orgs' => $orgs
        ]);
    }
}
