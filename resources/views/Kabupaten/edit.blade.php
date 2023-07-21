<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Kaupaten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Kabupaten</h5>
                        <form action="{{ route('kabupaten.update', $kabupaten->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Provinsi</label>
                                <select name="nama_provinsi" id="nama_provinsi"
                                    class="form-control @error('nama_provinsi') is-invalid @enderror">
                                    @foreach($provinsis as $provinsi)
                                    <option value="{{ $provinsi->id }}" {{ old('nama_provinsi', $kabupaten->id_provinsi)
                                        == $provinsi->id ? 'selected' : ''
                                        }}>
                                        {{ $provinsi->nama_provinsi }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('nama_provinsi')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama kabupaten</label>
                                <input type="text" class="form-control @error('nama_kabupaten') is-invalid @enderror"
                                    name="nama_kabupaten"
                                    value="{{ old('nama_kabupaten', $kabupaten->nama_kabupaten) }}"
                                    placeholder="Masukkan Nama kabupaten">

                                <!-- error message untuk nama_kabupaten -->
                                @error('nama_kabupaten')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <div class="form-group">

                                <label class="font-weight-bold">Jumlah Penduduk</label>
                                <input type="text" class="form-control @error('jumlah_penduduk') is-invalid @enderror"
                                    name="jumlah_penduduk"
                                    value="{{ old('jumlah_penduduk', $kabupaten->jumlah_penduduk) }}"
                                    placeholder="Masukkan Nama kabupaten">

                                <!-- error message untuk jumlah_penduduk -->
                                @error('jumlah_penduduk')
                                <small class="form-text text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

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