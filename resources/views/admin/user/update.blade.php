@extends('admin.layout.appadmin')

@section('content')
<form class="mt-4" action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Username</label>
        <div class="col-8">
            <input id="text1" name="username" type="text" class="form-control" value="{{$user->username}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="select" class="col-4 col-form-label">Role</label>
        <div class="col-8">
            <select id="select" name="role" class="custom-select">
                <option value="Admin" {{($user->role == 'Admin') ? 'selected' : ''}}>Admin</option>
                <option value="Penjual" {{($user->role == 'Penjual') ? 'selected' : ''}}>Penjual</option>
                <option value="Siswa" {{($user->role == 'Siswa') ? 'selected' : ''}}>Siswa</option>
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