<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Purse;
use App\Trade;
use App\Category;
use App\Exports\TradeExport;
use App\Exports\TradeReceiptExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TradeController extends Controller
{
    public function show($id)
    {
        $purse = Purse::where('user_id', $id)->first();
        $trades = Trade::with('category')->where('from', $purse->id)->get();
        return view('trade/trade', compact('trades', 'purse'));
    }


    public function destroy($id)
    {
        $trade = Trade::find($id)->delete();
        $purse = Purse::where('user_id', $id)->first();
        $trades = Trade::with('category')->where('from', $purse->id)->get();
        $user_id = Auth::id();
        return view('trade/trade', compact('user_id', 'trades'))->with('alert', 'Xóa giao dịch thành công');
    }

    public function exportExpense($id)
    {
        return Excel::download(new TradeExport, 'user.xlsx');
    }

    public function exportReceipt($id)
    {
        return Excel::download(new TradeReceiptExport, 'user.xlsx');
    }

}
