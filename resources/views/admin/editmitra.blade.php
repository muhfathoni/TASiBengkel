@extends('layouts.master')


@section('title')
    Edit Mitra
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"> Update </h4>

                <form action= {{ url('editmitra/'.$editmitra->id) }}  method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
            
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input value="{{$editmitra->nama}}" type="text" name="nama" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="message-text" class="col-form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" id="message-text"> {{$editmitra->deskripsi}} </textarea>
                      </div>
                      <img src="{{url($editmitra->gambar)}}">
                      <input type="file" name ='gambar' class="form-control" id="customFile">

                      <a href="{{ url('inputmitra') }}" class="btn btn-secondary">Back</a>
                      <button type="submit" class="btn btn-primary">Save</button>
                      
                </form>

            </div>
        </div>
    </div>
</div>    
@endsection
