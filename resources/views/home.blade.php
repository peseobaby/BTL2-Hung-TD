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
                        <h1>Thông tin cá nhân {{ $user->name }}</h1>
                        <table width="100%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $user->id }}</td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $user->email }}</td>
                                </tr>    
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $user->address }}</td>
                                </tr>
                                <tr>
                                    <td>Ví</td>
                                    <td><a href="{{ route('purse', $user->id) }}"><button class="purse">Xem thông tin ví của ban</button></a></td>
                                </tr> 
                                <tr>  
                                    <td><a href="{{ route('edit.infor', $user->id) }}"><button class="edit">Cập nhật thông tin</button></a></td>
                                    <td><a href=""><button class="sheet">Quản lý chi tiêu</button></a></td>
                                </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
