<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Credit
        $credit = Transaction::where('type', 'credit')->sum('amount');

        // Debit
        $debit = Transaction::where('type', 'debit')->sum('amount');

        // Balance
        $balance = $credit - $debit;

        // Chart Data
        $data = [
            'credit' => $this->thousandsCurrencyFormat($credit),
            'c' => round($credit / 100) / 100,
            'debit' => $this->thousandsCurrencyFormat($debit),
            'd' => round($debit / 100) / 100,
            'balance' => $this->thousandsCurrencyFormat($balance),
            'b' => round($balance / 100) / 100,
            'transactions' => Transaction::orderBy('id', 'desc')->limit(5)->get(),
        ];
        return view('admin.index', compact('data'));
    }

    /**
     * Show the successful transaction dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function successTransaction()
    {
        return view('admin.success')->with('transactions', Transaction::where('status', 1)->get());
    }

    /**
     * Show the pending transaction dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pendingTransaction()
    {
        return view('admin.pending')->with('transactions', Transaction::where('status', 2)->get());
    }

    /**
     * Show the users dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function users()
    {
        return view('admin.users')->with('users', User::all());
    }

    /**
     * Split large amount into k, m, b, t.
     * @param $num Amount to be converted
     * @return string Converted amount
     */
    private function thousandsCurrencyFormat($num)
    {
        if ($num > 1000) {

            $x = round($num);
            $x_number_format = number_format($x);
            $x_array = explode(',', $x_number_format);
            $x_parts = array('k', 'm', 'b', 't');
            $x_count_parts = count($x_array) - 1;
            $x_display = $x;
            $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
            $x_display .= $x_parts[$x_count_parts - 1];

            return $x_display;

        }

        return $num;
    }

}
