@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản lý danh mục</div>
                <div class="card-body">
                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="content">
                        <h1>Lịch sử giao dịch</h1>
                        <a href="{{ route('purse.trade', $purse->id) }}" class ="button" >Thêm giao dịch</a><br/><br/>
                        <table id="tradetable" width="100%" class="display">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Danh mục</td>
                                    <td>Từ tài khoản</td>
                                    <td>Đến tài khoản</td>
                                    <td>Số tiền</td>
                                    <td>Thời gian</td>
                                    <td>Options</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($trades as $trade)
                                    <tr>
                                        <td>{{ $trade->id }}</td>
                                        <td>{{ $trade->category->name }}</td>
                                        <td>{{ $trade->from }}</td>
                                        <td>{{ $trade->to }}</td>
                                        <td>{{ $trade->money }}</td>
                                        <td>{{ $trade->updated_at }}</td>
                                        <td>
                                            <form action="{{ route('trade.destroy', $trade->id) }}" method="post" 
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="delete">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach    
                            </tbody>                                  
                        </table>
                        <button><a href="{{ route('export.expense', $purse->id) }}">Xuất danh sách thu theo tháng</a>
                        </button>
                        <button><a href="{{ route('export.receipt', $purse->id) }}">Xuất danh sách chi theo tháng</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#tradetable').DataTable();
    });
</script>
@endsection
