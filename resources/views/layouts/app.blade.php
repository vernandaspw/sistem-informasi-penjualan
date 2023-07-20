<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <title>Indosteel Sumber Buku</title>
    <link rel="shortcut icon" href="{{ asset('indosteel.png') }}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <style>
        body {
            font-family: 'Nunito', sans-serif;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }
    </style>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            /* font-feature-settings: "cv03", "cv04", "cv11"; */
            font-family: 'roboto', sans-serif;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }
    </style>


    @livewireStyles
</head>

<body class="antialiased">

    {{-- <div class="d-flex justify-content-center">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-10 col-12">

        </div>
    </div> --}}
    <div class="page">
        {{ $slot }}
    </div>

    @livewireScripts

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>   

    <script src="{{ asset('vendor/sweatalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        Livewire.on('success', data => {
            console.log(data.pesan);
            Swal.fire({
                position: 'center',
                title: 'success!',
                text: data.pesan,
                icon: 'success',
                confirmButtonText: 'oke'
                // showConfirmButton: false
                // , timer: 1500
            })
        })
        Livewire.on('error', data => {
            console.log(data.pesan);
            Swal.fire({
                position: 'center',
                title: 'error!',
                text: data.pesan,
                icon: 'error',
                confirmButtonText: 'oke'
                // showConfirmButton: false
                // , timer: 1500
            })
        })
    </script>
    <script type="text/javascript">
        window.onload = function(ev) {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight && window.innerHeight + window
                .pageYOffset >= document.body.offsetHeight) {
                Livewire.emit('nextData');
            }
        }

        window.onscroll = function(ev) {
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight && window.innerHeight + window
                .pageYOffset >= document.body.offsetHeight) {
                Livewire.emit('nextData');
            }
        }
    </script>

</body>

</html>
