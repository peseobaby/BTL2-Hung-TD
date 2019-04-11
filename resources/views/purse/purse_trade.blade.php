@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                     @if (session('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="head">
                        <h1>Chuyển tiền từ ví {{ $purse->name }}</h1>
                    </div>
                    <div class="content">
                        <form method="post" action="{{ route('purse.send', $purse->id) }}" role="form">
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Số tiền hiện có</td>
                                    <td>{{ $purse->money }}</td>
                                </tr>
                                <tr>
                                    <td>Ví cần chuyển <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="number" name="id" class="form-control" placeholder="Tài khoản cần chuyển">
                                        @if($errors->has('id'))
                                            <li style="color: red">
                                            {{ $errors->first('id') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tên người cần chuyển <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" class="form-control" placeholder="Tên chủ tài khoản">
                                        @if($errors->has('name'))
                                             <li style="color: red">
                                            {{ $errors->first('name') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Số tiền cần chuyển <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="number" name="money"  class="form-control" placeholder="Số tiền cần chuyển">
                                        @if($errors->has('money'))
                                            <li style="color: red">
                                            {{ $errors->first('money') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mục đích chuyển tiền</td>
                                    <td>
                                        <select name="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mật khẩu cá nhân <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="password" name="password"  class="form-control" placeholder="mật khẩu">
                                        @if($errors->has('password'))
                                            <li style="color: red">
                                            {{ $errors->first('password') }}
                                        @endif
                                    </td>
                                </tr>
                                 <tr>
                                    <td>Xác thực mật khẩu cá nhân <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="password" name="password_confirmation"  class="form-control" placeholder="xác thực mật khẩu">
                                        @if($errors->has('password_confirmation'))
                                            <li style="color: red">
                                            {{ $errors->first('password_confirmation') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Giao dịch</button></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection