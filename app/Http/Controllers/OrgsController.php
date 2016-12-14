<?php
namespace App\Http\Controllers;

use App\org;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Gate;

class OrgsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function add(Request $request){
      // <---- вот это важная строчка
     $validator = Validator::make($request->all(), [
       'orgs_name' => 'required|max:255',
       'orgs_adress' => 'required|max:255',
     ]);

     if ($validator->fails()) {
       return redirect('/')
         ->withInput()
         ->withErrors($validator);
     }


        $org = new Org;
     $org->orgs_name = $request->orgs_name;
     $org->orgs_adress = $request->orgs_adress;
     $org->save();

     return redirect('/client');
    }
    public function edit($id, Request $request)
    {
        $org = Org::find($id);
        $org->orgs_name = $request->orgs_name;
        $org->orgs_adress = $request->orgs_adress;
        $org->save();
        return redirect('/client');
    }

    public function index()
    {
    $this->authorize('orgs');
      return view('orgs');
    }

    public function delete( $id )
    {
      $this->authorize('orgs');
      Org::findOrFail($id)->delete();
      return redirect('/client');
    }
    public function get($id)
    {
      $this->authorize('orgs');
      $org = Org::findOrFail($id);
      return view('edit', array('orgs' => $org));
    }

}
