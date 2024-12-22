<?php

namespace App\Http\Controllers;

use App\Services\PayTech;
use Illuminate\Http\Request;



class PaymentController extends Controller
{
   
    public function makePayment(PayTech $paytech)
    {

        //Crée une instance de PayTech avec les clés de l'API
        $response = new \App\Services\PayTech(env('PAYTECH_API_KEY'), env('PAYTECH_API_SECRET'));


        //  $refCommand = 'commande_' . uniqid(); // Génère une référence unique
        $response = $paytech->setQuery([
            'item_name' => 'Abonnement chez UAS-BC',
            'item_price' => 500,
            'command_name' => 'Commande #1234',
        ])
        ->setRefCommand('commande_1234') // Ajoute la référence
            ->setNotificationUrl([
                'success_url' => url('https://uasbc.net/success'),
                'cancel_url' => url('https://uasbc.net/cancel'),
                'ipn_url' => url('https://uasbc.net/ipn'),
            ])
            ->send();

                if ($response['success'] === 1) {
                    return redirect($response['redirect_url']); // Redirige vers PayTech pour le paiement
                }
                // return back()->withErrors(['message' => 'Erreur : ' . implode(', ', $response['errors'])]);

                return response()->json($response); // montre l'erreur du transfer
    }
}
