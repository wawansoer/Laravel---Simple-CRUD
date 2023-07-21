<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Provinsi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Data Provinsi</h5>
                        <form action="{{ route('provinsi.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Provinsi</label>
                                <input type="text" class="form-control @error('nama_provinsi') is-invalid @enderror" name="nama_provinsi" id="nama_provinsi" value="{{ old('nama_provinsi') }}" placeholder="Masukkan Nama Provinsi">
                            
                                <!-- error message untuk nama_provinsi -->
                                @error('nama_provinsi')
                                    <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-success">Simpan</button>
                            <button type="reset" class="btn btn-md btn-primary">Reset</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>