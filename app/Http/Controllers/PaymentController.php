<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmation;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function create($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);
        
        // Calculate total price including room prices and services
        $totalPrice = $reservation->room->price; // Assuming room price is per night
        
        foreach ($reservation->services as $service) {
            $totalPrice += $service->price;
        }
        $today = Carbon::today()->format('Y-m-d');

        $reservation = Reservation::with('guest')->findOrFail($reservation_id);
        $user = auth()->user();
        $creditCardNumber = null;
        $expiryDate = null;
        $expiryMonth=null;


        if ($reservation->guest && $reservation->guest->credit_card_number) {
            $creditCardNumber = $reservation->guest->credit_card_number;
            $expiryDate = $reservation->guest->expiry_date;
        } elseif ($user && $user->credit_card_number) {
            // Fallback to user's credit card number
            $creditCardNumber = $user->credit_card_number;
        }

        return view('payments.create', compact('reservation', 'totalPrice','today','creditCardNumber'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reservation_id' => 'required|exists:reservations,id',
            'amount' => 'required|integer|min:1',
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

        $user = $request->user();
        $guest = \App\Models\Guest::firstOrNew(['user_id' => $user->id]);
        $guest->credit_card_number = $request->credit_card_number;
        $guest->expiry_date = $request->expiry_date;
        $guest->cvv = $request->cvv;
        $guest->save();


        // Send confirmation email
        Mail::to($request->email)->send(new PaymentConfirmation($payment));
        $paidReservations = session()->get('paid_reservations', []);
        $paidReservations[] = $request->reservation_id;
        session(['paid_reservations' => $paidReservations]);
        return redirect()->route('myprofile.show')->with('success', 'Payment was successful.');
    }
}