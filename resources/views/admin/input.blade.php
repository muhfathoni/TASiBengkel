@extends('layouts.master')


@section('title')
    Input
@endsection

@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/tambah barang" method="POST">
        {{ csrf_field() }}

      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Stock</label>
            <input type="text" name="stock" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Harga</label>
            <input type="text" name="harga" class="form-control" id="recipient-name">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>

    </div>
  </div>
</div>

<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Input Barang 
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">+</button>

                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Nama Barang</th>
                      <th>Deskripsi</th>
                      <th>Stock</th>
                      <th>Harga</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          tes
                        </td>
                        <td>
                          tes
                        </td>
                        <td>
                          tes
                        </td>
                        <td>
                          tes
                        </td>
                        <td>
                          <a href="#" class="btn btn-success">EDIT</a>
                        </td>
                        <td> 
                          <a href="#" class="btn btn-danger">DELETE</a> 
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
                  

@endsection


@section('scripts')

@endsection

