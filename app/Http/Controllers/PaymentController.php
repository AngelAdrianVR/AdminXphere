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
        $users = User::where('sphere_id', $my_sphere)
                    ->where('is_active', true)
                    ->get();

        return inertia('Payment/Create', compact('users'));
    }

   
    public function store(Request $request)
    {

        // return $request->users_selected[1];

        $request->validate([
            'concept' => 'required',
            'description' => 'nullable',
            'expired_date' => 'nullable|date',
            'amount' => 'required|numeric|min:1',
            'all_users' => 'boolean',
        ]);

        //if the payment ticket is not for all users. (checkbox "all_users" is not selected)
        if(!$request->all_users){
            //bucle in array which contains all ticket's users
            foreach ($request->users_selected as $user ) {
                //obj user saved. founded with name in array sended in request
                $my_sphere = auth()->user()->sphere_id;
                $user = User::where('name', $user)->where('sphere_id', $my_sphere)->get();
                $user_id = $user[0]->id;
                Payment::create($request->except('all_users') + [
                    'user_id' => $user_id,
                    'sphere_id' => $my_sphere,
                ]);
            }
        }else{
            return 'No se ha hecho la logica para crear pago a todos los usuarios, pensar si es eficiente que se haga un 
            registro de pago para cada usuario';
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
