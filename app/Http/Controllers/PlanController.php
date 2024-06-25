<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\CustomerGroup;
use App\Warehouse;
use App\Biller;
use App\Product;
use App\Unit;
use App\Tax;
use App\Product_Warehouse;
use App\ProductBatch;

use App\Returns;
use App\Account;
use App\ProductReturn;
use App\ProductVariant;
use App\Variant;
use App\CashRegister;
use App\GeneralSetting;
use App\Sale;
use App\Product_Sale;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Mail\UserNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\PaymentMethod;
use Exception;
use App\Plan as ModelsPlan;
use GuzzleHttp\Client;
use Laravel\Cashier\Cashier;
use Laravel\Cashier\Subscription;
use Stripe\Plan;

class PlanController extends Controller
{
    // single change payment srtarsingleCharge
    public function index(Request $request)
    {
        // $role = Role::find(Auth::user()->role_id);
        // if ($role->hasPermissionTo('returns-index')) {
        // $permissions = Role::findByName($role->name)->permissions;
        $user = auth()->user();
        return view(
            'frontend.subscription.plan.checkout',
            [
                'intent' => $user->createSetupIntent(),
            ]
        );
        // } else
        //     return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    //make subscription
    public function singleCharge(Request $request)
    {

        $amount = $request->amount;
        $amount = $amount * 100;
        $paymentMethod = $request->payment_method;


        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        // if ($paymentMethod != null) {
        //     $paymentMethod = $user->addPaymentMethod($paymentMethod);

        // }
        $paymentMethod = $user->addPaymentMethod($paymentMethod);

        $user->charge($amount, $paymentMethod->id);


        return back();
    }

    //single payment end 

    //plan start
    public function showPlanForm()
    {
        return view('backend.subcription.plan.create');
    }
    public function savePlan(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $amount = ($request->price * 100);

        if ($request->subscription == 'quaterly') {
            $interval = 'month';
            $interval_count = 3;
        } elseif ($request->subscription == 'half_yearly') {
            $interval = 'month';
            $interval_count = 6;
        } elseif ($request->subscription == '9_months') {
            $interval = 'month';
            $interval_count = 9;
        } else {
            $interval = $request->subscription;
            $interval_count = 1;
        }


        try {
            $plan = Plan::create([
                'amount' => $amount,
                'currency' => $request->currency,
                'interval' => $interval,
                'interval_count' => $interval_count,
                'active' =>  $request->status == 'on' ? 'true' : 'false',
                'product' => [
                    'name' => $request->name
                ]
            ]);

            if ($plan) {
                ModelsPlan::create([
                    'plan_id' => $plan->id,
                    'name' => $request->name,
                    'price' => $request->price,
                    'subscription' => $plan->interval,
                    'interval_count' => $interval_count,
                    'currency' => $plan->currency,
                    'status' => $request->status == 'on' ? 1 : 0,
                ]);

                return redirect()->route('plans.all.view')->with('message', 'Plan created successfully');
            }
        } catch (Exception $ex) {
            return back()->with('message3', 'Error :' . $ex->getMessage());
            // dd($ex->getMessage());
        }
    }

    // public function editPlan($id)
    // {
    //     $plan = ModelsPlan::findOrFail($id);

    //     return view('backend.subcription.plan.edit', compact('plan'));
    // }


    // public function updatePlan(Request $request, $id)
    // {

    //     $plan = ModelsPlan::findOrFail($id);
    //     $planId = $plan->plan_id;
    //     if ($request->subscription == 'quaterly') {
    //         $interval = 'month';
    //         $interval_count = 3;
    //     } elseif ($request->subscription == 'half_yearly') {
    //         $interval = 'month';
    //         $interval_count = 6;
    //     } elseif ($request->subscription == '9_months') {
    //         $interval = 'month';
    //         $interval_count = 9;
    //     } else {
    //         $interval = $request->subscription;
    //         $interval_count = 1;
    //     }
    //     try {

    //         \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    //         $updatedPlan = \Stripe\Plan::retrieve($planId);
    //         $updatedPlan = \Stripe\Plan::update(
    //             $planId,
    //             [
    //                 'nickname' => $request->name,
    //                 'price' => $request->price * 100,
    //                 'metadata' => [
    //                     'custom_key' => 'custom_value'
    //                 ]
    //             ]
    //         );

    //         $plan1 = ModelsPlan::where('id', $id)->first();
    //         $plan1->price = $request->price;
    //         $plan1->name = $request->name;
    //         $plan1->currency = $request->currency;
    //         $plan1->subscription = $interval;
    //         $plan1->interval_count = $interval_count;
    //         $plan1->status = $request->status == 'on' ? 1 : 0;
    //         $plan1->update();


    //         return redirect()->route('plans.all.view')->with('message', 'Plan Updated successfully');
    //     } catch (\Exception $ex) {
    //         dd($ex->getMessage());
    //         return back()->withErrors(['error' => 'Plan update failed. ' . $ex->getMessage()]);
    //     }
    // }


    public function deletePlan($id)
    {

        $plantoDelete =  ModelsPlan::findOrFail($id);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        try {
            $plan = \Stripe\Plan::retrieve($plantoDelete->plan_id);

            $checkIfSubs = Subscription::where('stripe_price', $plantoDelete->plan_id)->get();

            if ($checkIfSubs != null) {
                return back()->with('message', 'This plan has subscriber, Unable to delete!');
            }


            if ($plan->delete()) {
                $plantoDelete->delete();
                return redirect()->route('plans.all.view')->with('message', 'Plan Deleted successfully');
            }
            return back()->with('message', 'Something went wrong');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            return back()->with('message', 'Something went wrong' . $e->getMessage());
        }
    }

    //Plan Activation or deactivation

    public function activePlan(Request $rq, $id)
    {
        $updatedPlan =  ModelsPlan::findOrFail($id);
        $planId = $updatedPlan->plan_id;

        if ($rq->status == 0) {
            $activation = true;
        } else {
            $activation = false;
        }


        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        try {

            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            $updatedPlan = \Stripe\Plan::update(
                $planId,
                [
                    'active' => $activation
                ]
            );

            if ($updatedPlan) {
                $plan1 = ModelsPlan::where('id', $id)->first();
                $plan1->status = $activation == true ? 1 : 0;
                $plan1->update();
                return redirect()->route('plans.all.view')->with('message', 'Plan Updated successfully');
            }
        } catch (\Exception $ex) {
            return redirect()->route('plans.all.view')->with('message3', 'Error:' . $ex->getMessage());
        }
    }


    public function allPlans()
    {
        $plans = ModelsPlan::latest()->get();

        return view('backend.subcription.plan.index', compact('plans'));
    }
    //plan end


    // subcription option start
    public function allSubscriptions()
    {

        $subscriptions = Subscription::all();

        return view('backend.subcription.allsubcription', compact('subscriptions'));
    }
    public function cancelSubscriptions(Request $request)
    {
        $subscriptionName = $request->subscriptionName;
        if ($subscriptionName) {
            $user = auth()->user();
            $user->subscription($subscriptionName)->cancel();
            return 'subcription is canceled';
        }
    }
    public function resumeSubscriptions(Request $request)
    {
        $user = auth()->user();
        $subscriptionName = $request->subscriptionName;
        if ($subscriptionName) {
            $user->subscription($subscriptionName)->resume();
            return 'subcription is resumed';
        }
    }

    public function subscriptionsActive(Request $request)
    {
        // $user = auth()->user();
        $stripe_id  = $request->stripe_id;
        $theRow = Subscription::where('stripe_id', $stripe_id)->first();
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        if ($theRow->stripe_status == 'active' || 'trialing') {
            $sub = \Stripe\Subscription::retrieve($stripe_id);

            if ($sub->cancel()) {
                $theRow->stripe_status = 'cancelled';
                $theRow->update();
                return back()->with('message', 'Cancelled Successfully');
            }
            // } 
            // else {
            //     $sub = \Stripe\Subscription::retrieve($stripe_id);

            //     if ($sub->resume()) {
            //         $theRow->stripe_status = 'active';
            //         $theRow->update();
            //         return back()->with('message', 'Resumed Successfully');
            //     }

            return back()->with('message3', 'Something went wrong!');
        }
        return back()->with('message3', 'Cancelled can not be undone!');
    }

    public function create(){

        $customers = Customer::all();
        $plans = ModelsPlan::all();
        $products = Product::all();

        return view('backend.subcription.create', [
            'customers' => $customers,
            'plans' => $plans,
            'products' => $products,
        ]);
    }

    //Delete Subscription By Selection

    public function deleteBySelection(Request $request)
    {
        $customer_id = $request['customerIdArray'];
        foreach ($customer_id as $id) {
            $lims_customer_data = Subscription::find($id);
            $lims_customer_data->is_active = false;
            $lims_customer_data->save();
        }
        return 'Subscriptions deleted successfully!';
    }
    public function subDelete(){
    
        $subC = Subscription::find(request('subId'));
       
        if ( $subC ->delete()) {
            return redirect()->back()->with('success', 'Subscription deleted successfully !');
        }

    }
}
