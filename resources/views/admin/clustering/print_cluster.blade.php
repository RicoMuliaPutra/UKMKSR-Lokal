<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Clustering</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <h1>Hasil Clustering UKM KSR</h1>

    @foreach ($anggotas as $cluster => $anggotaGroup)
        <h2>Cluster {{ $cluster }}</h2>
        <table>
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Angkatan</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Nilai Kehadiran</th>
                    <th>Nilai Kontribusi</th>
                    <th>Nilai Kompetensi</th>
                    <th>Nilai Etika</th>
                    <th>Cluster</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotaGroup as $anggota)
                    <tr>
                        <td>{{ $anggota->anggota->nim }}</td>
                        <td>{{ $anggota->anggota->nama }}</td>
                        <td>{{ $anggota->anggota->angkatan }}</td>
                        <td>{{ $anggota->anggota->jenis_kelamin }}</td>
                        <td>{{ $anggota->anggota->prodi }}</td>
                        <td>{{ $anggota->nilai_kehadiran }}</td>
                        <td>{{ $anggota->nilai_kontribusi }}</td>
                        <td>{{ $anggota->nilai_kompetensi }}</td>
                        <td>{{ $anggota->nilai_etika }}</td>
                        <td>{{ $anggota->cluster }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach

</body>
</html>
