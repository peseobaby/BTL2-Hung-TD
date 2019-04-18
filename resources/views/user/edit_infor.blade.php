@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <div class="head">
                        <h1>Sửa thông tin {{ $user->name }}</h1>
                    </div>
                    <div class="content">
                        <form method="post" action="{{ route('update.infor', $id) }}" role="form">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Tên người dùng <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="Tên nhân viên">
                                        @if($errors->has('name'))
                                            <span style="color: red">
                                            {{ $errors->first('name') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>
                                        <input type="text" name="address" value="{{ $user->address }}" class="form-control" placeholder="Địa chỉ">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Sửa thông tin</button></td>
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