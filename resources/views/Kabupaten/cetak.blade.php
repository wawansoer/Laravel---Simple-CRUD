<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Data Kabupaten</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Nama Provinsi</th>
                <th scope="col">Nama Kabupaten</th>
                <th scope="col">Jumlah Penduduk</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($kabupaten as $data)
            <tr>
                <td>{{ $data->nama_provinsi }}</td>
                <td>{{ $data->nama_kabupaten }}</td>


                <td>{{ $data->jumlah_penduduk }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data kabupaten belum Tersedia.
            </div>
            @endforelse
        </tbody>
    </table>

</body>

</html>