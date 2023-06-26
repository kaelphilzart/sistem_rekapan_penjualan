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
        <h4 align="center">Data Penjualan</h4>
        <table class="table1">
            <tr>
            <th style = "width: 5%">Id</th>
            <th style = "width: 10%">Stand</th>
            <th style = "width: 10%">Tanggal</th>
            <th style = "width: 10%">Kasir</th>
            <th style = "width: 10%">Menu</th>
            <th style = "width: 10%">Harga</th>
            <th style = "width: 10%">Jumlah</th>
            <th style = "width: 10%">Total</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dataPenjualan as $data)
            <tr>
                <td> {{ $data->id }}</td>
                <td> {{ $data->stand }}</td>
                <td> {{ $data->tanggal }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->menu }}</td>
                <td> {{ $data->harga }}</td>
                <td> {{ $data->jumlah }}</td>
                <td> {{ $data->total }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</head>