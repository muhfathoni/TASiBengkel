
@extends('layout.main')

@section('content')

<section style="background: url('img/background-mitra.jpg'); height: 300px;">
    <div class="text-center text-white" style="text-shadow: #0b0b0b 3px 3px"
    ">
    <h1 class="text-uppercase">
        <strong>join to be our partner</strong>
    </h1>
</div>

</section>

<center>
    <div class="container-mitra"> 
        <table>
            <form method="POST" class="register-form" id="login" action="mitra-process.php">
                <tr>
                    <td>
                        <input type="text" placeholder="   Nama bengkel" name="namaBengkel">
                    </td>
                    <td>
                        <input type="text" placeholder="   Email bengkel" name="emailPemilik">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="   Nama pemilik" name="namaPemilik">
                    </td>
                    <td>
                        <input type="text" placeholder="   No telp pemilik" name="telpPemilik">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="   Alamat bengkel" name="alamatBengkel">
                    </td>
                    <td>
                        <input type="text" placeholder="   Kecamatan" name="kecamatanBengkel">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" placeholder="   Kelurahan" name="kelurahanBengkel">
                    </td>
                    <td>
                        <input type="text" placeholder="   Provinsi" name="provinsiBengkel">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="logn" value="Submit" style="width: 25%">
                    </td>
                </tr>
            </form>
        </table>
    </center>
</div>

@endsection

@section ('css')
<link href="{{ asset ('css/creative.min.css') }}" rel="stylesheet">
@endsection