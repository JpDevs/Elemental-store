<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Stripe\Stripe;
use Stripe\StripeClient;

class StoreController extends Controller
{
    private $stripe;

    protected $rules = [
        'product' => ['required', 'integer'],
        'product_id' => ['required', 'integer'],
        'player_id' => ['required', 'integer'],
    ];

    public function __construct()
    {
        $this->stripe = new StripeClient(env('STRIPE_SECRET'));
    }

    public function index()
    {
        try {
            $response = [
                'categories' => Category::with('products')->get()
            ];
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response);
    }

    public function getProductsByCategory($id)
    {
        try {
            $response = [
                'products' => Category::findOrFail($id)->products
            ];
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response);
    }

    public function getAllCategories()
    {
        try {
            $response = Category::all();
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response);
    }

    public function order()
    {
        try {

        } catch (\Throwable $th) {
            return $this->setError($th);
        }
    }

    public function getOrders($hash)
    {
        try {
            if ($hash != env('SYSTEM_HASH')) {
                throw new \Exception('Hash Inválido');
            }
            $response = [
                'orders' => Sales::NotProcessed()->with('product')->get()->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'player_id' => $item->player_id,
                        'product' => [
                            'id' => $item->product->id,
                            'name' => $item->product->name,
                        ],
                        'sales_status' => [
                            'id' => $item->salesStatus->id,
                            'name' => $item->salesStatus->name,
                        ],
                    ];
                })
            ];
        } catch (\Throwable $th) {
            return $this->setError($th, 401);
        }
        return $this->setResponse($response);
    }

    public function persist(Request $request)
    {
        try {

        } catch (\Throwable $th) {
            return $this->setError($th);
        }
    }

    public function preprocess(Request $request, $productId)
    {
        try {
            $validated = $this->validate($request, [
                'playerId' => ['required', 'integer'],
                'fullName' => ['required', 'string'],
                'email' => ['required', 'email'],
            ]);
            $response = DB::transaction(function () use ($validated, $productId, $request) {
                $sales = Sales::create([
                    'player_id' => $validated['playerId'],
                    'sales_status_id' => 1,
                    'products_id' => $productId,
                    'date' => Carbon::now(),
                ]);
                session_start();
                $_SESSION['order_id'] = $sales->id;
                return $sales;
            });
            $response['success'] = true;
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($response);
    }

    public function getStripeSession(Request $request)
    {
        try {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            $validated = $this->validate($request, [
                'playerId' => ['required', 'integer'],
                'fullName' => ['required', 'string'],
                'email' => ['required', 'email'],
                'productId' => ['required', 'integer'],
            ]);

            $product = Products::findOrFail($validated['productId']);
            $id = $product->id;
            $session = $this->stripe->checkout->sessions->create([
                'success_url' => url('/api/order/process/' . $validated['playerId'] . '/' . $id),
                'cancel_url' => url('/'),
                'payment_method_types' => ['card'],
                'mode' => 'payment',
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'brl',
                            'product_data' => [
                                'name' => $product->name,
                                'description' => $product->description,
                            ],
                            'unit_amount' => $product->price * 100,
                        ],
                        'quantity' => 1,
                    ],
                ],
            ]);
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return $this->setResponse($session);
    }

    public function process($playerId, $productId)
    {
        try {
            if (!isset($_SESSION)) {
                session_start();
            }
            $order = Sales::findOrFail($_SESSION['order_id']);
            $product = Products::findOrFail($productId);
            if($order->sales_status_id == 4){
                return view('loja.success', ['order' => $order, 'product' => $product]);
            }
            $response = DB::transaction(function () use ($order, $playerId, $productId) {
                $order->update([
                    'sales_status_id' => 4,
                ]);
                return $order;
            });
            $hash = "81500e0e-1018-11ed-861d-0242ac120002";
            $url = 'http://elementalroleplay.online/api/?hash='.$hash.'&user_id='.$playerId.'&categoria='.$product->category_id.'&product='.$productId;
            $set = Http::get($url);
            $response['success'] = true;
        } catch (\Throwable $th) {
            return $this->setError($th);
        }
        return view('loja.success', ['response' => $response, 'order' => $order, 'set' => $set, 'product' => $product]);
    }
}
