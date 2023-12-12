<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    private $stripe;

    public function __construct()
    {
        $this->stripe = new Stripe();
    }

    public function payment($id)
    {
        $product = Products::findOrFail($id);
        return view('jpdevs.payment', compact('product'));
    }

    public function checkout($id)
    {
        $produto = Products::findOrFail($id);
        return view('loja.checkout', compact('produto'));
    }

    public function stripePost()
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Charge::create([
                'amount' => 100,
                'currency' => 'brl',
                'source' => request('stripeToken'),
                'description' => 'Test charge'
            ]);
            Session::flash('success', 'Pagamento realizado com sucesso!');
            return back();
        } catch (\Exception $e) {
            dd($e);
        }

    }

}
