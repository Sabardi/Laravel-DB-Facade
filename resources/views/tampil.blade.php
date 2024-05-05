<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <table>
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>IPK</th>
        </tr>
        @foreach($mahasiswas as $mahasiswa)
        <tr>
            <td>{{$mahasiswa->id}}</td>
            <td>{{$mahasiswa->nim}}</td>
            <td>{{$mahasiswa->nama}}</td>
            <td>{{$mahasiswa->tanggal_lahir}}</td>
            <td>{{$mahasiswa->ipk}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
