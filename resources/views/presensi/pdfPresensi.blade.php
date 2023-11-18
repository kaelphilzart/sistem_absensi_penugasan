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
        <h4 align="center">Data Presensi</h4>
        <table class="table1">
            <tr>
            <th style = "width: 7%">Id</th>
            <th style = "width: 12%">Nama</th>
            <th style = "width: 8%">Tahun</th>
            <th style = "width: 8%">Bulan</th>
            <th style = "width: 8%">Tanggal</th>
            <th style = "width: 12%">Status</th>
            <th style = "width: 10%">Bukti</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($dataPresensi as $data)
            <tr>
                <td> {{ $data->id }}</td>
                <td> {{ $data->nama }}</td>
                <td> {{ $data->tahun }}</td>
                <td> {{ $data->bulan }}</td>
                <td> {{ $data->tanggal }}</td>
                <td> {{ $data->status }}</td>
                <td> {{ $data->stand }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <script type="text/javascript">
            window.print();
        </script>
    </body>
</head>