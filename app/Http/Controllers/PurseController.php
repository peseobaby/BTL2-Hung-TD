<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Purse;
use App\Trade;
use App\Category;
use App\Http\Requests\SendRequest;
use App\Http\Requests\CreatePurseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PurseController extends Controller
{
    public function show($id)
    {
        $purse = Purse::with('user')->where('user_id', $id)->first();
       
        return view('purse/purse', compact('purse'));
    }

   public function createPurse()
    {
        return view('purse/create_purse');
    }

    public function store(CreatePurseRequest $request)
    {
        $purse = Purse::store($request->all());
        $id = Auth::id();
        return view('purse/purse', compact('id', 'purse'))->with('alert', 'Tạo ví thành công');
    }

    public function edit($id)
    {
        $purse = Purse::find($id);
        return view('purse/purse_edit', compact('purse'));
    }

    public function updatePurse(CreatePurseRequest $request, $id)
    {
        $data = $request->all();
        $purse = Purse::updatePurse($data, $id);
        return redirect()->route('purse',['purse' => $purse, 'id' => $purse->user_id])
        ->with('alert', 'Cập nhật thành công');
    }

    public function destroy($id)
    {
        $purse = Purse::find($id)->delete();
        $user_id = Auth::id();
        return view('purse/purse', compact('user_id'))->with('alert', 'Xóa ví thành công');
   	}

    public function trade($id)
    {
        $purse = Purse::find($id);
        $categories = Category::where('parent_id', '2')->where('user_id', Auth::id())->get();
        return view('purse/purse_trade', compact('purse', 'categories'));
    }
    
    public function send(SendRequest $request, $id)
    {
        $password = $request->password;
        $userIn = Purse::with('user')->where('id', $request->id)->first();
        if (($userIn != Null) && ($request->name == $userIn->user->name)) {
   	        $purseFrom= Purse::find($id);
            $purseFromMoney = $purseFrom->money;
            if((($purseFromMoney - $request->money) > ZERO) && ($request->money > ZERO)) {
                $purseFrom->update([
                    'money' => $purseFromMoney - $request->money,
                 ]); 
                $purseTo = Purse::find($request->id);
                $purseToMoney = $purseTo->money;
                $purseTo->update([
                'money' => $purseToMoney + $request->money,
                ]);
                $category = is_null($request->category) ? $category = Category::find(expense) :
                Category::where('name', $request->category)->first();
                $tradeOut = Trade::create([
                    'name' => $request->category,
                    'from' => $purseFrom->id,
                    'to' => $purseTo->id,
                    'category_id' => $category->id,
                    'money' => $request->money,
                ]); 
                $tradeIn = Trade::create([
                    'name' => $request->category,
                    'from' => $purseTo->id,
                    'to' => $purseFrom->id,
                    'category_id' => receipt,
                    'money' => $request->money,
                ]); 
            } else {
                return redirect()->route('purse.trade', ['id' =>$id])->with('alert', 
                'Số tiền cần chuyển phải nhỏ hơn số tiền đang có và lớn hơn 0');
            } 
        } else {
            return redirect()->route('purse.trade', ['id' =>$id])->with('alert', 
            'Sai tên người nhận hoặc tài khoản');
        }
        return redirect()->back()->with('alert', 'Chuyển tiền thành công');
    }   
}
