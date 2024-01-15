<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use App\Models\Membership;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // $membership = Car::query()->get();
        $activeCars = Car::whereDate('exp_membership', ">", now())->count();
        $expiredCars = Car::whereDate('exp_membership', "<=", Carbon::now())->count();

        $transactionJan = Transaction::whereYear('created_at', '=', '2024')
                            ->whereMonth('created_at', '=', '1')
                            ->get();
        $transactionFeb = Transaction::whereYear('created_at', '=', '2024')
                            ->whereMonth('created_at', '=', '2')
                            ->get();

        $transactionMarch = Transaction::whereYear('created_at', '=', '2024')
                            ->whereMonth('created_at', '=', '3')
                            ->get();

        $transactionAprl = Transaction::whereYear('created_at', '=', '2024')
                            ->whereMonth('created_at', '=', '4')
                            ->get();

        $transactionMay = Transaction::whereYear('created_at', '=', '2024')
                            ->whereMonth('created_at', '=', '5')
                            ->get();

        $transactionJun = Transaction::whereYear('created_at', '=', '2024')
                            ->whereMonth('created_at', '=', '6')
                            ->get();

        $transactionJul = Transaction::whereYear('created_at', '=', '2024')
                            ->whereMonth('created_at', '=', '7')
                            ->get();
        $totalJan = 0;
        $totalFeb = 0;
        $totalMarch = 0;
        $totalAppril = 0;
        $totalMay = 0;
        $totalJun = 0;
        $totalJul = 0;

        $totalAll = Transaction::sum('total_price');


        foreach ($transactionJan as $key => $value) {
            $totalJan += $value->total_price;
        }

        foreach ($transactionFeb as $key => $value) {
            $totalFeb += $value->total_price;
        }

        foreach ($transactionMarch as $key => $value) {
            $totalMarch += $value->total_price;
        }

        foreach ($transactionAprl as $key => $value) {
            $totalAppril += $value->total_price;
        }

        foreach ($transactionMay as $key => $value) {
            $totalMay += $value->total_price;
        }

        foreach ($transactionJun as $key => $value) {
            $totalJun += $value->total_price;
        }

        foreach ($transactionJul as $key => $value) {
            $totalJul += $value->total_price;
        }

        return view('home', [
            // 'memberships' => $membership,
            'activeCars' => $activeCars,
            'expiredCars' => $expiredCars,
            'totalJan' => $totalJan,
            'totalFeb' => $totalFeb,
            'totalMarch' => $totalMarch,
            'totalAppril' => $totalAppril,
            'totalMay' => $totalMay,
            'totalJun' => $totalJun,
            'totalJul' => $totalJul,
            'totalAll' => $totalAll,
        ]);
    }

    public function create()
    {
        return view('admin.admin');
    }

    public function inbox()
    {
        return view('admin.inbox');
    }

    public function transaction()
    {
        $transactions = Transaction::query()
            ->get();

        $total_price = 0;
        foreach ($transactions as $key => $value) {
            $transactions[$key]->car = json_decode($value->car);
            $transactions[$key]->membership = json_decode($value->membership);

            $total_price += $value->total_price;
        }

        return view('admin.transaction', [
            'transactions' => $transactions,
            'total_price' => $total_price,
        ]);
    }

    public function transactionDetail($id)
    {
        // dd($transaction);
        $transaction = Transaction::findOrFail($id);

        $transaction->car = json_decode($transaction->car);
        $transaction->membership = json_decode($transaction->membership);

        $member = User::findOrFail($transaction->car->user_id);

        return view('admin.transactionDetail', [
            'transaction' => $transaction,
            'member' => $member,
        ]);
    }
}
