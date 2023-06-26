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
        <h4 align="center">Data Riwayat</h4>
        <table class="table1">
            <tr>
            <th style = "width: 12%">Id</th>
            <th style = "width: 12%">Tanggal</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 12%">Kegiatan</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dataRiwayat as $data)
            <tr>
                <td> {{ $data->id }}</td>
                <td> {{ $data->tanggal }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->kegiatan }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</head>