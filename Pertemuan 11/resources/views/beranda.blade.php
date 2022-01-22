<?php
    $array = [1,2,3,4,5];

    $nama = "Beny";
    $nilai = 70;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        Rohman Beny Riyanto 19104060
    </h1>
    <h1>Ini Halaman Beranda</h1>

    <?php echo "Halo dunia" ?>

    <p>
        {{ "Halo Dunia" }}
    </p>

    <?php if(1+1 == 3) { ?>
        <p>
            {{ "Halo Dunia" }}
        </p>
    <?php } ?>

    @if (1+1 == 2)
        <p>
            {{ 'Halo Dunia' }}
        </p>
    @endif

    <hr>

    <h1>Perulangan</h1>

    <?php for($i = 0; $i < count($array); $i++) { ?>
        <p>
            {{ $array[$i] }}
        </p>
    <?php } ?>

    @for($i = 0; $i < count($array); $i++)
        <p>
            {{ $array[$i] }}
        </p>
    @endfor

    <hr>

    <h1>Percabangan</h1>

    @if (1+1 == 3)
        <p>
            {{ 'Jawabannya benar' }}
        </p>
    @else
        {{ "Jawabanya salah" }}
    @endif

    @if ($nama == "Rohman")
        <p>
            {{ "Nama saya Rohman" }}
        </p>
    @elseif($nama == "Beny")
        <p>
            {{ "Nama saya Beny" }}
        </p>
    @else
        <p>
            {{ "Nama saya tidak diketahui" }}
        </p>
    @endif

    <hr>

    <h1>Percabangan Switch</h1>

    @switch($nilai)
        @case(90)
            {{ "Nilai Anda A" }}
            @break

        @case(80)
            {{ "Nilai Anda B" }}
            @break

        @case(70)
            {{ "Nilai Anda C" }}
            @break

        @default
            {{ "Nilai Anda D" }}

    @endswitch

</body>
</html>
