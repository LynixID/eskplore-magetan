<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="css/feedback.css">
</head>

<body>
    <header>
        <img src="/asset/img.beranda/Logo.png" alt="" width="120px">
        <nav>
            <a href="{{ url('/') }}" class="beranda">Beranda</a>
        </nav>
    </header>

    <main>
        <h2 class="Tfeedback ">Feedback</h2>
        {{-- <div class="keterangan-feedback">
            <p>Total Keseluruhan Feedback</p>
            <p>Feedback yang di pin</p>
            <p>Feedback yang di hapus</p>
        </div>
        <div class="info-feedback">
            <p>1,260</p>
            <p>770</p>
            <p>10</p>
        </div> --}}
        <div class="feedback">
            <table>
                <thead>
                    <tr class="text-head">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gmail</th>
                        <th>Pesan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($feedback as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->pesan }}</td>
                        <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('hapus.feedback', $data->id) }}" method="POST">
                                    
                                    {{-- <span class="pin">PIN</span> --}}
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" style="color: #ffff">HAPUS</button>
                                </form>
                        
                                {{-- <span class="delete" onclick="return confirm('Yakin ingin menghapus feedback ini?')">DELETE</span> --}}
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                
                    </tbody>
            </table>
        </div>
    </main>

</body>

</html>
