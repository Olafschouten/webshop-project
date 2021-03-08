<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function checkout(Request $request): JsonResponse
    {
        $this->validate($request, [
            'cart'        => 'required|string',
            'firstName'   => 'required|string',
            'lastName'    => 'required|string',
            'street'      => 'required|string',
            'houseNumber' => 'required|string',
            'zip'         => 'required|string',
            'email'       => 'required|email',
        ]);

        $user = auth()->user();

        $order = [
            "cart"        => serialize($request->input('cart')),
            "user_id"     => $user->id,
            "firstName"   => $request->input('firstName'),
            "lastName"    => $request->input('lastName'),
            "street"      => $request->input('street'),
            "houseNumber" => $request->input('houseNumber'),
            "zip"         => $request->input('zip'),
            "email"       => $request->input('email'),
        ];

        Order::create($order);

        return response()->json(null, 200);
    }
}
