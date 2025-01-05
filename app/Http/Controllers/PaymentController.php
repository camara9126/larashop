<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Services\PayTech;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;




class PaymentController extends Controller
{
   
    public function makePayment(PayTech $paytech, $articles)
    {        
        //Crée une instance de PayTech avec les clés de l'API
        $response = new \App\Services\PayTech(env('PAYTECH_API_KEY'), env('PAYTECH_API_SECRET'));

        //creation du ref_command avec la date et le matricule du client
        $ref_command = Carbon::now()->format('YmdHis').'-'.Auth::user()->matricule;


        // le prix del'article        
        $prix= 1000*(10/100);

        //  $refCommand = 'commande_' . uniqid(); // Génère une référence unique
        $response = $paytech->setQuery([
            'item_name' => 'Paiement chez UAS-BC',
            'item_price' => $prix,
            'command_name' => ': Abonnement du '.Carbon::now()->format('YmdHis').' pour '.Auth::user()->prename.'-'.Auth::user()->name.' chez UAS-BC',
        ])
        ->setRefCommand($ref_command) // Ajoute la référence
            ->setNotificationUrl([
                'success_url' => url('/success'),
                'cancel_url' => url('/cancel'),
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
