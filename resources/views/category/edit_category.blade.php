@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>
                <div class="card-body">
                    <div class="head">
                        <h1>Sửa thông tin danh mục {{ $category->name }}</h1>
                    </div>
                    <div class="content">
                        <form method="post" action="{{ route('category.update', $category->id) }}" role="form">
                            {{ method_field('put') }}
                            {{ csrf_field() }}
                            <table width="50%" cellspacing="0" cellpadding="10">
                                <tr>
                                    <td>Tên danh mục <span class="errors" style="color: red" >*</span></td>
                                    <td>
                                        <input type="text" name="name" value="{{ $category->name }}" class="form-control" placeholder="tên nhân viên">
                                        @if($errors->has('name'))
                                            <li style="color: red">
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