<?php

namespace App\Exports;

use App\Trade;
use App\Purse;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Auth;
use Carbon\Carbon;

class TradeReceiptExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {	
    	$user = Auth::user()->id;
    	$purse = Purse::where('user_id', $user)->first();
        return Trade::with('category','purse')->where('from', $purse->id)->where('category_id', '<>' , 1)
        ->whereDate('created_at', '>', Carbon::now()->day - 30)->get();    
    }

    public function map($trade): array
    {
    	return [
    		$trade->category->name,
    		$trade->to,
            $trade->money,
            $trade->updated_at,
    	];
    }

    public function headings(): array
    {
        return [
            'Danh mục',
            'Đến tài khoản',
            'Số tiền',
            'Thời gian',
        ];
    }
}
