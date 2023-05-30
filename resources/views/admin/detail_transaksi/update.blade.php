@extends('admin.layout.appadmin')

@section('content')
<form class="mt-4" action="{{route('detail_transaksi.update',$detail->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Transaksi ID</label>
        <div class="col-8">
            <select id="select" name="transaksi" class="custom-select">
                @foreach($transaksi as $t)
                <option value="{{$t->id}}" {{($detail->transaksi_id == $t->id) ? 'selected' : ''}}>{{$t->id}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="text1" class="col-4 col-form-label">Produk</label>
        <div class="col-8">
            <select id="select" name="produk" class="custom-select">
                @foreach($produk as $p)
                <option value="{{$p->id}}" {{($detail->product_id == $p->id) ? 'selected' : ''}}>{{$p->nama}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-4 col-form-label">Quantity</label>
        <div class="col-8">
            <input id="text" name="quantity" type="number" class="form-control" value="{{$detail->quantity}}">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection