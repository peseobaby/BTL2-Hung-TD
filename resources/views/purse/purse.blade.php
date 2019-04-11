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
                        @if(isset($purse))
                            <h1>Thông tin ví của {{ $purse->user->name }}</h1>
                                <table width="100%" cellspacing="0" cellpadding="10">
                                    <tr>
                                        <td>ID</td>
                                        <td>{{ $purse->id }}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $purse->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Số tiền</td>
                                        <td>{{ $purse->money }}</td>
                                    </tr>    
                                    <tr>
                                        <td>
                                            <a href="{{ route('purse.edit',$purse->id) }}"><button class="edit">Sửa</button>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ asset('') }}deletepurse/{{ $purse->id }}" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="delete">Xóa</button>
                                            </form>
                                        </td>
                                         <td>
                                            <a href="{{ route('purse.trade',$purse->id) }}"><button class="edit">Chuyển khoản</button></a>
                                        </td>
                                    </tr>
                            </table>
                        @else
                            <table width="100%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Bạn chưa có ví , hãy tạo ví : </td>
                                    <td>
                                        <a href="{{ route('purse.create') }}"><button class="create">Tạo ví</button></a>
                                    </td>
                                </tr>
                        @endif 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
