@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trang chủ</div>

                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="content">
                        <h1>Tạo ví</h1>
                        <a href="{{ route('purse', Auth::id()) }}" class="button">Trở về</a> <br/> <br/>
                        <form method="post" action="{{ route('purse', Auth::id()) }}" role="form">
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Tên ví <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" class="form-control" placeholder="tên ví">
                                        @if($errors->has('name'))
                                            <li style="color: red">
                                            {{ $errors->first('name') }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Tạo ví</button></td>
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
