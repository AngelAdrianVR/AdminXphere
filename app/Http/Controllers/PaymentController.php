<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PaymentController extends Controller
{

 
    public function index()
    {
        $my_sphere_id = auth()->user()->sphere_id;
        $payments = PaymentResource::collection(Payment::where('sphere_id', $my_sphere_id)
                    ->whereNull('payed_at')
                    ->whereDate('expired_date', '>', today())
                    ->orWhereNull('expired_date')
                    ->with('user')
                    ->latest()
                    ->get());
        // return $payments;
        return Inertia::render('Payment/Index',compact('payments'));
    }

    public function historyPayment()
    {
        $my_sphere_id = auth()->user()->sphere_id;
        $payments = PaymentResource::collection(Payment::where('sphere_id', $my_sphere_id)->with('user')->latest()->get());
        // return $payments;
        return Inertia::render('Payment/History',compact('payments'));
    }


    public function create()
    {
        $users = User::where('sphere_id', 5)->get();

        return inertia('Payment/Create', compact('users'));
    }

   
    public function store(Request $request)
    {
        //
    }


    public function show(Payment $payment)
    {
        //
    }


    public function edit(Payment $payment)
    {
        //
    }


    public function update(Request $request, Payment $payment)
    {
        //
    }

    public function destroy(Payment $payment)
    {
        //
    }
}
