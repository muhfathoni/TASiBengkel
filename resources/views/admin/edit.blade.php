@extends('layouts.master')


@section('title')
    edit
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Update </h4>

                <form action= {{ url('editbarang/'.$editbarang->id) }}  method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
            
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input value="{{$editbarang->nama}}" type="text" name="nama" class="form-control" id="recipient-name">
                      </div>
                      <p> ID Jenis Barang </p>
                      <select name='jenisbarang' class="form-control">
                        @foreach ($jenis as $key => $value)
                        <option value="{{$value->id}}" @if ($value->id==$editbarang->jenis_id) selected  @endif>{{$value->namajenis}}</option>
                      @endforeach
                                        
                      </select>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="message-text"> {{$editbarang->deskrip}} </textarea>
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Stock</label>
                        <input value="{{$editbarang->stock}}" type="number" name="stock" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Harga</label>
                        <input value="{{$editbarang->harga}}" type="number" name="harga" class="form-control" id="recipient-name">
                      </div>
                      <img src="{{url($editbarang->gambar_b)}}">
                      <input type="file" name ='gambar' class="form-control" id="customFile">

                      <a href="{{ url('input') }}" class="btn btn-secondary">Back</a>
                      <button type="submit" class="btn btn-primary">Save</button>
                      
                </form>

            </div>
        </div>
    </div>
</div>    
@endsection
