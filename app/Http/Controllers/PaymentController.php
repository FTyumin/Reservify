<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyTestEmail;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'reservation_id' => 'required|integer',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'credit_card_number' => 'required|string',
            'expiry_date' => 'required|string',
            'cvv' => 'required|string',
            'email' => 'required|email',
        ]);

        // Create the payment
        $payment = Payment::create([
            'reservation_id' => $request->reservation_id,
            'amount' => $request->amount,
            'date' => $request->date,
            'credit_card_number' => $request->credit_card_number,
            'expiry_date' => $request->expiry_date,
            'cvv' => $request->cvv,
            'email' => $request->email,
        ]);

        // Send the email
        Mail::to($request->email)->send(new MyTestEmail($payment));
        
        // Store paid reservations in session
        $paidReservations = session()->get('paid_reservations', []);
        $paidReservations[] = $request->reservation_id;
        session(['paid_reservations' => $paidReservations]);

        return redirect()->route('myprofile.show')->with('success', 'Payment was successful.');
    }
}
