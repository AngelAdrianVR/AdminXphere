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
                    ->paginate(30));
        return Inertia::render('Payment/Index',compact('payments'));
    }

    public function historyPayment()
    {
        $my_sphere_id = auth()->user()->sphere_id;
        $payments = PaymentResource::collection(Payment::where('sphere_id', $my_sphere_id)
                    ->with('user')
                    ->latest()
                    ->paginate(30));

        return Inertia::render('Payment/History',compact('payments'));
    }


    public function create()
    {
        $my_sphere = auth()->user()->sphere_id;
        $users = User::where('sphere_id', $my_sphere)->get();

        return inertia('Payment/Create', compact('users'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'concept' => 'required',
            'description' => 'nullable',
            'expired_date' => 'nullable|date',
            'amount' => 'required|numeric|min:1',
            'all_users' => 'boolean',
        ]);

        if(!$request->all_users){
            foreach ($user as $request->all_users) {
                Payment::create($request->except('all_users') + [
                    'user_id' => User::where('name', $user),
                    'sphere_id ' => auth()->user()->sphere_id,
                ]);
            }
        }

        return to_route('payments.history');
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
