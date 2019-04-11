<?php
namespace App\Http\Controllers;

use App\User;
use Auth;
use App\Http\Requests\UpdateInforRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;

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
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function editInfor($id)
    {
        $user = User::find($id);
        return view('user/edit_infor', compact('user', 'id'));
    }
    
    public function updateInfor(UpdateInforRequest $request, $id)
    {
        $data = $request->all();
        User::updateInfor($data, $id);
        return redirect('home')->with('alert', 'Cập nhật thành công');
    }

    public function password($id)
    {
        $user = User::find($id);
        return view('user/change_password', compact('user', 'id'));
    }
    

    public function changePassword(ChangePasswordRequest $request, $id)
    {   
        $user = new User;
        $data = $request->all();
        $userid = $user->find($id);
        $userid->password = bcrypt($data['password']);
        $userid->save();
        return redirect()->route('home', ['user' => $userid])->with('alert', 'Đổi mật khẩu thành công');
    }
}
