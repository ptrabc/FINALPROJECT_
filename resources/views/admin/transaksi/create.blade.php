@extends('admin.layout.appadmin')

@section('content')
<form class="mt-4" action="{{route('transaksi.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">User</label>
        <div class="col-8">
            <select id="select" name="user" class="custom-select">
                @foreach($user as $u)
                <option value="{{$u->id}}">{{$u->username}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="text3" class="col-4 col-form-label">Tanggal</label>
        <div class="col-8">
            <input id="text3" name="tanggal" type="date" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <label for="textarea" class="col-4 col-form-label">Lokasi</label>
        <div class="col-8">
            <textarea id="textarea" name="lokasi" cols="40" rows="5" class="form-control"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Total</label>
        <div class="col-8">
            <input id="text" name="total" type="text" class="form-control">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection