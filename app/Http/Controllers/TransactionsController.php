<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class TransactionsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('add')->with('users', User::all());
    }

    /**
     * Save a new transaction.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'amount' => 'required',
            'type' => 'required',
        ]);
        if ($validatedData->fails()) {
            return redirect()->route('add')
                ->withErrors($validatedData)
                ->withInput();
        }
        $transaction = new Transaction;
        $transaction->user_id = $request->name;
        $transaction->amount = $request->amount;
        $transaction->type = $request->type;
        if ($transaction->save()) {
            return redirect()->route('add')->with('status', 'New transaction added!');
        }
    }

    /**
     * Generate Line graph data.
     *
     * @return Object Json Array
     */
    public function graphData()
    {
        $credits = Transaction::select('created_at', DB::raw('sum(amount) AS amount'))->where('type', 'credit')->groupBy('created_at')->get();
        $debits = Transaction::select('created_at', DB::raw('sum(amount) AS amount'))->where('type', 'debit')->groupBy('created_at')->get();

        $arr['data'] = array();
        $arr2['data'] = array();
        $num = 0;
        foreach ($credits as $credit) {
            $num++;
            $amount = round($credit->amount / 100);

            $ar = array($num, $amount);
            array_push($arr['data'], $ar);
        }
        $num = 0;
        foreach ($debits as $debit) {
            $num++;
            $amount = round($debit->amount / 100);

            $ar = array($num, $amount);
            array_push($arr2['data'], $ar);
        }

        $data = [
            $arr, $arr2,
        ];

        return json_encode(compact('data'));
    }
}
