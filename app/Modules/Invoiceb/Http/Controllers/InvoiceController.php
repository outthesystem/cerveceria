<?php

namespace App\Modules\Invoiceb\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Modules\Invoiceb\Models\Invoice;
use App\Modules\Invoiceb\Models\InvoiceItem;
use App\Modules\Client\Models\Client;
use App\Modules\Product\Models\Product;
use App\Modules\Product\Models\Regstock;
use Session;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->search;

      if (isset($search)) {
        $invoices = Invoice::where('name', 'like', '%' . $search . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(15);
        }
        else {
        $invoices = Invoice::orderBy('created_at', 'desc')->paginate(15);
        }

      return view('invoiceb::index', compact('invoices', 'search'));
    }

    public function create_step1(Request $request)
    {
      $clients = Client::all();

      return view('invoiceb::step1', compact('clients'));
    }

    public function step1_store(Client $client, Request $request)
    {
      $client = Client::find($request->client_id);

      $invoice = Invoice::create([
        'client_id' => $client->id,
        'name' => $client->name,
        'phone' => $client->phone
      ]);

      Session::flash('success', 'La factura se creo correctamente.');

      return redirect('invoiceb/edit/'.$invoice->id);
    }

    public function edit(Invoice $invoice, Request $request)
    {
      $search = $request->search;
      $clients = Client::all();

      if (isset($search)) {
        $products = Product::where('name', 'like', '%' . $search . '%')
        ->paginate(15);
        }
        else {
        $products = Product::paginate(15);
        }

      return view('invoiceb::edit', compact('invoice', 'products', 'search', 'clients'));
    }

    public function updateClient(Invoice $invoice, Request $request)
    {
      $invoice->client_id = $request->client_id;
      $invoice->update();

      Session::flash('success', 'Se cambio el cliente de la factura correctamente.');

      return redirect('invoiceb/edit/'.$invoice->id);
    }

    public function storeItem(Invoice $invoice, Request $request)
    {
      $product = Product::find($request->product_id);

      $total = $product->price * $request->quantity;

      $invoiceitem = InvoiceItem::create([
        'invoice_id' => $invoice->id,
        'product_id' => $product->id,
        'price' => $product->price,
        'time' => $product->time,
        'total' => $total,
        'quantity' => $request->quantity,
      ]);

      if ($product->count_stock != 1) {
        $regstock = Regstock::create([
          'product_id' => $product->id,
          'invoice_item_id' => $invoiceitem->id,
          'stock_old' => $product->stock,
          'stock_modify' => $invoiceitem->quantity,
          'stock_new' => $product->stock - $invoiceitem->quantity,
          'sum' => NULL,
          'reason' => 'Descontado por venta. en esta <a href="'.url('invoiceb/edit/'.$invoice->id).'">Factura</a>'
        ]);
        $product->stock = $product->stock - $invoiceitem->quantity;
        $product->update();
      }

      $invoice->total = $invoice->total + $total;

      if ($product->is_cut == 1) {
        $total_minutes = $product->time * $invoiceitem->quantity;

        $total_time = $invoice->time_total + $total_minutes;

        $invoice->time_total = $total_time;
      }

      $invoice->update();

      Session::flash('success', 'Se agrego el producto correctamente.');

      return redirect('invoiceb/edit/'.$invoice->id);
    }

    public function deleteItem(InvoiceItem $invoiceitem, Request $request)
    {
      $product = Product::find($invoiceitem->product_id);
      $invoice = Invoice::find($invoiceitem->invoice_id);

        if ($product->count_stock != 1) {
          $regstock = Regstock::create([
            'product_id' => $product->id,
            'invoice_item_id' => $invoiceitem->id,
            'stock_old' => $product->stock,
            'stock_modify' => $invoiceitem->quantity,
            'stock_new' => $product->stock + $invoiceitem->quantity,
            'sum' => 1,
            'reason' => ''.$request->reason.' <a href="'.url('invoiceb/edit/'.$invoice->id).'">Factura</a>'
          ]);
          if ($request->return_stock == 1) {
            $product->stock = $product->stock + $invoiceitem->quantity;
            $product->update();

          }
        }


      $invoice->total = $invoice->total - $invoiceitem->total;

      if ($product->is_cut == 1) {
        $total_minutes = $invoiceitem->quantity * $invoiceitem->time;

        $total_time = $invoice->time_total - $total_minutes;

        $invoice->time_total = $total_time;
      }

      $invoice->update();

      $invoiceitem->delete();

      Session::flash('success', 'Se elimino el producto correctamente.');

      return redirect('invoiceb/edit/'.$invoice->id);
    }

    public function paidInvoice(Invoice $invoice, Request $request)
    {
      $invoice->paid = 1;
      $invoice->date_paid = date('Y-m-d', strtotime(Carbon::now()));
      $invoice->update();

      Session::flash('success', 'La factura se ha pagado correctamente.');

      return redirect('invoiceb/create_step1#step1');
    }

    public function cancelInvoice(Invoice $invoice, Request $request)
    {
      $invoice->paid = 0;
      $invoice->date_paid = NULL;
      $invoice->update();

      Session::flash('success', 'Ya podes editar la factura.');

      return redirect('invoiceb/edit/'.$invoice->id);
    }
}
