<?php

namespace App\Modules\Client\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Client\Models\Client;
use Session;

class ClientController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->search;

      if (isset($search)) {
        $clients = Client::where('name', 'like', '%' . $search . '%')
        ->paginate(15);
        }
        else {
        $clients = Client::paginate(15);
        }

      return view('client::index', compact('clients', 'search'));
    }

    public function store(Request $request)
    {
          $client = new Client;
          $client->name = $request->name;
          $client->phone = $request->phone;
          $client->observaciones = $request->observaciones;
          $client->save();

          Session::flash('success', 'El cliente se ha creado correctamente.');

          return redirect('/client/index');
    }

    public function edit(Client $client)
    {
      return view('client::edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
      $client->name = $request->name;
      $client->phone = $request->phone;
      $client->observaciones = $request->observaciones;
      $client->save();

      Session::flash('success', 'El cliente se ha actualizado.');

      return redirect('/client/edit/'.$client->id);
    }

    public function destroy(Client $client)
    {
      $client->delete();

      Session::flash('success', 'El cliente se ha eliminado correctamente.');

      return redirect('/client/index');
    }
}
