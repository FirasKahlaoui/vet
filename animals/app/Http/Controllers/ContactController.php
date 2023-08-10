<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Récupérer les données du formulaire
        $name = $request->input('name');
        $email = $request->input('mail');
        $phone = $request->input('mobile');
        $message = $request->input('message');

        // Envoyer l'e-mail
        $mailData = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message,
        ];

        // Mail::to('ahmedarfaoui1600@gmail.com','mansour.noucair11@gmail.com')->send(new ContactEmail($mailData));


        Mail::to('ahmedarfaoui1600@gmail.com')
    ->cc('mansour.noucair11@gmail.com')
    ->send(new ContactEmail($mailData));

        return back()->with('success', 'Email Envoyé Avec Succées');
        }
}
