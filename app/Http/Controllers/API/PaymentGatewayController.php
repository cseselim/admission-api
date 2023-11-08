<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\PaymentGatewayList;
use App\Exceptions\CustomException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentGateway\PaymentGatewayResource;

class PaymentGatewayController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  PaymentGatewayResource::collection(PaymentGatewayList::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_id' => 'required|numeric',
            'app_keys' => 'nullable',
            'app_secret' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'merchant_id' => 'nullable',
            'paymentGateway' => 'nullable',
            'amount' => 'required|numeric',
            'status' => 'nullable'
        ]);

        PaymentGatewayList::create($request->all());

        return response()->json(['message' => __('Payment gateway create successfully')], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  response()->json(['data' => PaymentGatewayList::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'school_id' => 'required|numeric',
            'amount' => 'required|numeric',
        ]);

        $data = PaymentGatewayList::find($id);
        if (!$data) {
            throw new CustomException(__('Payment gateway not found'),404);
        }
        $data->update($validated);

        return response()->json(['message' => __('Payment gateway updated successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = PaymentGatewayList::find($id);

        if ($data) {
            $data->delete();
            return response()->json(['message' => __('Payment gateway deleted successfully')]);
        }

        throw new CustomException(__('Payment gateway not found to delete'));
    }
}
