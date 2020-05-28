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
      <form action="/tambahbarang" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama</label>
            <input type="text" name="nama" class="form-control" id="recipient-name">
          </div>
          <p> ID Jenis Barang </p>
          <select name='jenisbarang' class="form-control">
            @foreach ($jenis as $key => $value)
            <option value="{{$value->id}}">{{$value->namajenis}}</option>
          @endforeach
                            
          </select>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" id="message-text"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Stock</label>
            <input type="number" name="stock" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Harga</label>
            <input type="number" name="harga" class="form-control" id="recipient-name">
          </div>
          <input type="file" name ='gambar' class="form-control" id="customFile">
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
                  <table class="display nowrap" id='tableinput'>
                    <thead class=" text-primary">
                      <th>Nama Barang</th>
                      <th>Jenis Barang</th>
                      <th>Stock</th>
                      <th>Harga</th>
                      <th>Gambar</th>
                      <th>EDIT</th>
                      <th>DELETE</th>
                    </thead>
                    <tbody>
                      @foreach ($products as $row)
                      <tr>
                              <td>{{ $row->nama }}</td>
                              <td>{{ $row->jenis->namajenis }}</td>
                              <td>{{ $row->stock }}</td>
                              <td>{{ $row->harga }}</td> 
                              <td> <img src="{{url($row->gambar_b)}}"></td>
                        <td> 
                        <a href="editbarang/{{$row->id}}" class="btn btn-success">EDIT</a> 
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editbarang" data-barang="{{$row->toJson()}}">EDIT </button> --}}
                        </td>
                        <td> 
                        <a href="deletebarang/{{$row->id}}" class="btn btn-danger">DELETE</a> 
                        
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
          </div>
                  
          {{-- <div class="modal fade" id="editbarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Input Barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="/tambahbarang" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
          
                <div class="modal-body">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Nama</label>
                      <input type="text" name="nama" class="form-control" id="recipient-name">
                    </div>
                    <p> ID Jenis Barang </p>
                    <select name='jenisbarang' class="form-control">
                      @foreach ($jenis as $key => $value)
                      <option value="{{$value->id}}">{{$value->namajenis}}</option>
                    @endforeach
                                      
                    </select>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Deskripsi</label>
                      <textarea name="deskripsi" class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Stock</label>
                      <input type="number" name="stock" class="form-control" id="recipient-name">
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Harga</label>
                      <input type="number" name="harga" class="form-control" id="recipient-name">
                    </div>
                    <input type="file" name ='gambar' class="form-control" id="customFile">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
          
              </div>
            </div>
          </div> --}}

@endsection


@section('scripts')

<script>
$(document).ready( function () {
    $('#tableinput').DataTable({
      scrollX: true
    });

    $('#editbarang').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('barang') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})

} );

</script>

@endsection

