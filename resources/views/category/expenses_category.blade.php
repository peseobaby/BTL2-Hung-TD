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
                        <h1>Quản lý thu chi</h1>
                        <a href="{{ route('category.show', Auth::id()) }}" class ="button" >Quay lại</a> <br/> <br/>
                        <div id="menu">
                            <ul>
                                <li><a href="{{ route('category.receipt', Auth::id()) }}" class ="button" >Quản lý thu
                                </a></li>
                                <li><a href="{{ route('category.expense', Auth::id()) }}" class ="button" >Quản lý chi
                                </a></li>
                            </ul>
                        </div>
                        <table width="100%" border="1" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>ID</td>
                                    <td>Tên danh mục</td>
                                    <td>Options</td>
                                </tr>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('category.edit',$category->id) }}"><button class="edit">Sửa
                                        </button></a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post" 
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="delete">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach                                      
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
<style>
    #menu ul {
  background: #1F568B;
  list-style-type: none;
  text-align: center;
}
#menu li {
  color: #f1f1f1;
  display: inline-block;
  width: 120px;
  height: 40px;
  line-height: 40px;
  margin-left: -5px;
}
#menu a {
  text-decoration: none;
  color: #fff;
  display: block;
}
#menu a:hover {
  background: #F1F1F1;
  color: #333;
}
</style>
@endsection
