@extends('admin.layout.appadmin')

@section('content')
<form class="mt-4" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Username</label>
        <div class="col-8">
            <input id="text1" name="username" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Password</label>
        <div class="col-8">
            <input id="text" name="password" type="password" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Role</label>
        <div class="col-8">
            <select id="select" name="role" class="custom-select">
                <option value="Admin">Admin</option>
                <option value="Penjual">Penjual</option>
                <option value="Siswa">Siswa</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection