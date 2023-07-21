<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Provinsi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h5 class="text-center"><a href=" {{route('provinsi.index') }}">Manajemen Provinsi</a></h5>
                    <h5 class="text-center"><a href=" {{ route('kabupaten.index') }}">Manajemen Kabupaten</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="card-title">Filter Data Provinsi</h5>
                        <form class="form-inline">
                            <div class="form-group mr-3">
                                <input type="text" name="nama_provinsi" id="nama_provinsi" class="form-control"
                                    placeholder="Filter Provinsi Berdasarkan Nama">
                            </div>

                            <button class="btn btn-info mr-3" type="submit">Cari</button>

                            <a href="{{ route('provinsi.create') }}" class="btn btn-success">Tambah Provinsi</a>
                        </form>
                    </div>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h5 class="card-title"> Data Provinsi </h5>
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Provinsi</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($provinsi as $data)
                                <tr>
                                    <td>{{ $data->nama_provinsi }}</td>
                                    <td>{{ $data->created_at }}</td>
                                    <td>{{ $data->updated_at }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                            action="{{ route('provinsi.destroy', $data->id) }}" method="POST">
                                            <a href="{{ route('provinsi.edit', $data->id) }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Data Provinsi belum Tersedia.
                                </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $provinsi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if (session() -> has('success'))

            toastr.success('{{ session('success') }}', 'BERHASIL!');

        @elseif(session() -> has('error'))

        toastr.error('{{ session('error') }}', 'GAGAL!');

        @endif
    </script>

</body>

</html>