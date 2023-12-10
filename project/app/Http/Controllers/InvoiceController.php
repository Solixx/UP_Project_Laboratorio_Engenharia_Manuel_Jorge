<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function generateInvoice(Order $order)
    {
        $data = [
            'order' => $order
        ];

        $invoice = new Invoice();
        $invoice->order_id = $order->id;
        $invoice->user_id = $order->user_id;
        $invoice->total_price = $order->total_price;
        $invoice->date = (new \DateTime())->format('Y-m-d H:i:s');
        $invoice->save();

        $pdf = PDF::loadView('myInvoice', $data);
        return $pdf->download('myInvoice.pdf');
    }
}
