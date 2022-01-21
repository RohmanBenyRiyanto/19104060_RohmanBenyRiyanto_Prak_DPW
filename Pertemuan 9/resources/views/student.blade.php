<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class = "container">

    @if(session('pesan'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

        <table class="table">
            <tr>
                <td>
                    #
                </td>
                <td>
                    NIM
                </td>
                <td>
                    Nama
                </td>
                <td>
                    Gender
                </td>
                <td>
                    Jurusan
                </td>
                <td>
                    Alamat
                </td>
                <td>
                    Aksi
                </td>
            </tr>

            @php 
                $no = 1
            @endphp

            @foreach($students as $s)
                <tr>
                    <td>
                        {{$no++}}
                    </td>
                    <td>
                        {{$s->nim}}
                    </td>
                    <td>
                        {{$s->name}}
                    </td>
                    <td>
                        {{$s->gender}}
                    </td>
                    <td>
                        {{$s->departement}}
                    </td>
                    <td>
                        {{$s->address}}
                    </td>
                    <td>
                        <a href="{{ url('/mahasiswa/'.$s->id.'/edit') }}" class="btn btn-warning">Edit</a>
                        <form action="{{ url('/mahasiswa/hapus/'.$s->id) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

    </div>
</body>
</html>