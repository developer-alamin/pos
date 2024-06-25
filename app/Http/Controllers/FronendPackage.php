<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Plan as ModelsPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FronendPackage extends Controller
{
    //frontend checkout option start
    public function allPlans()
    {

        $all = ModelsPlan::where('status', 1)->get();
        return view('frontend.subscription.plan.allPlan', compact('all'));
    }

    public function checkout(Request $request)
    {

            $plan = ModelsPlan::where('id', $request->plan)->first();
            if (!$plan) {
                return back()->withErrors([
                    'message' => 'Unable to locate the plan'
                ]);
            }

            return view('frontend.subscription.plan.checkout', [
                'plan' => $plan,
                'intent' => auth()->user()->createSetupIntent(),
                'customer' => $request->customer,
                'paymentMethod' => $request->paymentMethod,
            ]);
      
    }

    public function processPlan(Request $request)
    {
        //

        $customer = Customer::find($request->customer);
        $customer->createOrGetStripeCustomer(); 

        $input = $request->all();

        $paymentMethod = $request->method;
        $paymentMethod = $request->payment_method;
        if ($paymentMethod != null) {
            $paymentMethod = $customer->addPaymentMethod($paymentMethod);
        }
        $plan = $request->plan_id;

        try {
            $customer->newSubscription(
                'default',
                $plan
            )->trialUntil(Carbon::now()->addDays(7))->create($paymentMethod != null ? $paymentMethod->id : '',['email' => $customer->email]);

        } catch (Exception $ex) {
            return back()->withErrors([
                'error' => 'Unable to create subscription due to this issue ' . $ex->getMessage()
            ]);
        }

        $request->session()->flash('alert-success', 'You are subscribed to this plan');
        return redirect()->route('subscriptions.all');
    }
    //frontend checkout option end
}
