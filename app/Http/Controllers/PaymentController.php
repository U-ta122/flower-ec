<?php

namespace App\Http\Controllers;

// use App\Http\Requests\StorePaymentRequest;
use Illuminate\Http\Request;
use Exception;
use App\Models\Product;

class PaymentController extends Controller
{
    /**
     * 決済フォーム表示
     */
    public function create(Product $product)
    {
        return view('payment.create')->with(["data"=>$product]);
    }


    /**
     * 決済実行
     */
    public function store(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.stripe_secret_key'));
        try {
            \Stripe\Charge::create([
                'source' => $request->stripeToken,
                'amount' => $request->product["price"],
                'currency' => 'jpy',
            ]);
        } catch (Exception $e) {
            return back()->with('flash_alert', '決済に失敗しました！('. $e->getMessage() . ')');
        }
        return back()->with('status', '決済が完了しました！');
    }
}