<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PurchaseConfirmation;
use App\Models\Product;

class CartController extends Controller
{
    public function __construct(Mail $mail)
    {
        $this->mail = $mail;
    }

    public function cart(Request $request): \Illuminate\View\View
    {
        $sessionData = $this->getSessionData($request);

        return view('cart', compact('sessionData'));
    }

    public function add(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->getRequestData($request);
        $sessionData = $this->getSessionData($request);

        $sessionData = $this->updateSessionData($sessionData, $data);

        $request->session()->put('session_data', $sessionData);

        return redirect()->route('cart');
    }

    public function remove(Request $request): \Illuminate\Http\RedirectResponse
    {
        $sessionData = $this->getSessionData($request);

        foreach ($sessionData as $key => $item) {
            if ($item['id'] == $request->id) {
                unset($sessionData[$key]);
                break;
            }
        }

        $request->session()->put('session_data', $sessionData);

        return redirect()->route('cart');
    }

    public function purchase(Request $request): \Illuminate\Http\RedirectResponse
    {
        $sessionData = $this->getSessionData($request);

        // Send email notification
        $userEmail = $request->user()->email; // Assuming the user is authenticated
        $this->mail::to($userEmail)->send(new PurchaseConfirmation($sessionData));

        $request->session()->forget('session_data');

        return redirect()->route('product')->with('sessionData', $sessionData);
    }

    private function getSessionData(Request $request): array
    {
        return $request->session()->get('session_data', []);
    }

    private function getRequestData(Request $request): array
    {
        return [
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'session_quantity' => $request->quantity,
        ];
    }

    private function updateSessionData(array $sessionData, array $data): array
    {
        $found = false;
        foreach ($sessionData as &$item) {
            if ($item['id'] == $data['id']) {
                $item['session_quantity'] += $data['session_quantity'];
                $found = true;
                break;
            }
        }

        if (!$found) {
            $sessionData[] = $data;
        }

        return $sessionData;
    }
}
