<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class CalendarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function create()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Pedido::all();
        $data = [];

  foreach ($orders as $order) {
    $data[] = [
      'title' => $order->title,
      'start' => $order->start_date,
      'end' => $order->end_date
    ];}

        return view('calendario.Pindex', compact('orders',$data));
    }

    public function getOrders() {
        
        $data = [];

        print_r($orders);
        exit;

        
      
        return view('calendario.Pindex',compact('orders', $data));
      }
}
