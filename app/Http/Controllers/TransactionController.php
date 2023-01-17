<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Transaction;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
 protected $totalDebit =0;
 protected $totalCredit=0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('client.show_transaction', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::where('status', '0')->orWhere('type', 'sub')->get();
        return view('client.transaction', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'date' =>'date'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('success', 'Enter Date please');
        }

        foreach ($request->debit_balance as $key => $item) {

            $this->totalDebit+=$request->debit_balance[$key];
            $this->totalCredit+=$request->credit_balance[$key];
        }
        if($this->totalCredit != $this->totalDebit){
            return redirect()->back()->with('success', 'the total not equal');
        }

        foreach ($request->credit_balance as $key => $item)
            if($request->credit_balance[$key]!=null) {
                $transaction = new Transaction();
                $name = Client::where('number',$request->client_name[$key])->pluck('name');
                $transaction->name =  $name[0];
                $transaction->number =$request->client_name[$key];
                $transaction->debit_balance =0.00;
                $transaction->credit_balance =  $request->credit_balance[$key];
                $transaction->created_at =  $request->date;

                $transaction->save();
            }
        foreach ($request->debit_balance as $key => $item)
            if($request->debit_balance[$key]!=null) {
                $transaction = new Transaction();
                $name = Client::where('number',$request->client_name[$key])->pluck('name');
                $transaction->name = $name[0];
                $transaction->number = $request->client_name[$key];
                $transaction->debit_balance = $request->debit_balance[$key] ;
                $transaction->credit_balance = 0.00;
                $transaction->created_at =  $request->date;
                $transaction->save();
            }
             return redirect()->route('transaction-show');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
