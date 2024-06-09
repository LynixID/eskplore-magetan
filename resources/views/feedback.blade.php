<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="css/feedback.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->pesan }}</td>
                        <td>
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('hapus.feedback', $data->id) }}" method="POST">
                                    
                                    
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete" style="color: #ffff">HAPUS</button>
                                </form>
                                
                                {{-- <a href="#" class="btn btn-outline-light btn-sm hapus-btn custom-link"
                                            data-id="{{ $data->id }}" data-nama="{{ $data->nama }}"
                                            data-bs-toggle="modal" data-bs-target="#modalHapus-{{ $data->id }}">
                                            <i class='bx bxs-trash' style="font-size: 2.2ch"></i><br>
                                        </a>
                         --}}
                                {{-- <span class="delete" onclick="return confirm('Yakin ingin menghapus feedback ini?')">DELETE</span> --}}
                        </td>
                    </tr>
                    @empty
                        
                    @endforelse
                
                    </tbody>
            </table>
        </div>
    </main>

    @foreach ($feedback->reverse() as $data)
                    <!-- Awal Modal Hapus -->
                    <div class="modal fade" id="modalHapus-{{ $data->id }}" tabindex="{{ $data->id }}"
                        aria-labelledby="modalHapusLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <i class='bx bxs-trash' style="font-size: 2rem"></i><br>
                                    <span>Hapus Data</span>
                                    <p>Apakah anda yakin ingin menghapus data ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-light batal-btn"
                                        data-bs-dismiss="modal">Batal</button>
                                    <!-- Formulir DELETE untuk menghapus data -->
                                    <form id="formHapus" action="{{ route('hapus.feedback', $data->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-light hapus-btn">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Hapus -->
                @endforeach

</body>

</html>
