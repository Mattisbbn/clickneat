<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Order;
use App\Models\Cart;

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('stripe.secret_key'));
    }

            public function showPayment()
    {
        $userId = Auth::id();

        // Récupérer la dernière commande de l'utilisateur
        $order = Order::where('user_id', $userId)
                     ->with('orderItems', 'reservation.table')
                     ->latest()
                     ->first();

        if (!$order) {
            return redirect()->route('cart.index')->with('error', 'Aucune commande trouvée.');
        }

        // Calculer le total
        $total = $order->orderItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.payment', [
            'order' => $order,
            'total' => $total
        ]);
    }

    public function createCheckoutSession(Request $request)
    {
        $userId = Auth::id();

        // Récupérer la dernière commande de l'utilisateur
        $order = Order::where('user_id', $userId)
                     ->with('orderItems')
                     ->latest()
                     ->first();

        if (!$order) {
            return response()->json(['error' => 'Aucune commande trouvée'], 404);
        }

        // Préparer les items pour Stripe
        $lineItems = [];
        foreach ($order->orderItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $item->name,
                    ],
                    'unit_amount' => $item->price, // Prix en centimes
                ],
                'quantity' => $item->quantity,
            ];
        }

        try {
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => $lineItems,
                'mode' => 'payment',
                'success_url' => route('payment.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel'),
                'metadata' => [
                    'order_id' => $order->id,
                    'user_id' => $userId,
                ],
            ]);

            return response()->json(['checkout_url' => $session->url]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function paymentSuccess(Request $request)
    {
        $sessionId = $request->get('session_id');

        if (!$sessionId) {
            return redirect()->route('cart.index')->with('error', 'Session de paiement invalide.');
        }

        try {
            $session = Session::retrieve($sessionId);

            if ($session->payment_status === 'paid') {
                // Mettre à jour le statut de la commande
                $orderId = $session->metadata->order_id;
                $order = Order::find($orderId);

                if ($order) {
                    $order->status = 'paid';
                    $order->stripe_session_id = $sessionId;
                    $order->save();
                }

                return view('cart.payment-success', ['order' => $order]);
            }
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'Erreur lors de la vérification du paiement.');
        }

        return redirect()->route('cart.index')->with('error', 'Paiement non confirmé.');
    }

    public function paymentCancel()
    {
        return view('cart.payment-cancel');
    }
}
