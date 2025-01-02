<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        // return response()->json(['message' => 'Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.']);

        Mail::to("contacto@agsoftweb.com.mx")->send(new ContactMail($request->input('telefono'), $request->input('nombre'), $request->input('email'), $request->input('mensaje')));

        return response()->json(['message' => 'Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.']);
        // Mail::send([], [], function ($message) use ($request) {
        //     $message->to('contacto@agsoftweb.com')
        //         ->subject('Contact Form | ' . $request->name)
        //         ->from($request->email, $request->name)
        //         ->setBody($request->mensaje, 'text/html');
        // });
        return redirect()->back()->with('message', 'Gracias por tu mensaje. Nos pondremos en contacto contigo pronto.');
    }
}
