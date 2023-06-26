<title>Cetak Pdf</title>
<head>
    <body>
        <style type="text/css">
            .table1{
                font-family: sans-serif;
                color: #232323;
                border-collpapse: collapse;
            }

            .table1, th, td{
                border: 3px solid #999;
                padding: 8px 20px;
            }
        </style>
        <h4 align="center">Data Petugas (PDF)</h4>
        <table class="table1">
            <tr>
            <th style = "width:5%">No.</th>
            <th style = "width:5%">Id</th>
            <th style = "width:14%">Nama</th>
            <th style = "width:14%">Alamat</th>
            <th style = "width:14%">Telepon</th>
            <th style = "width:14%">Kewarganegaraan</th>
            <th style = "width:14%">Pendidikan</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dataPegawai as $data)
            <tr>
            <td>{{ $loop->iteration }}</td>
            <td> {{ $data->id }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->alamat }}</td>
                <td> {{ $data->telepon }}</td>
                <td> {{ $data->kewarganegaraan }}</td>
                <td> {{ $data->pendidikan }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</head>