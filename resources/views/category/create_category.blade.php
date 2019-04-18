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
                        <a href="{{ route('category.show', Auth::id()) }}" class ="button" >Trở về</a> <br/> <br/>
                        <form method="post" action="{{ route('category.store') }}" role="form">
                             {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Tên danh mục <span class="errors" style="color: red" >*</span></a></td>
                                    <td>
                                        <input type="text" name="name" class="form-control" placeholder="Tên danh mục">
                                     @if($errors->has('name'))
                                        <span style="color: red">
                                        {{ $errors->first('name') }}
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Công việc </td>
                                    <td>
                                        <select name="parent">
                                            <option value="Thu">Thu</option>
                                            <option value="Chi">Chi</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><button type="submit" class="button">Tạo danh mục</button></td>
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
