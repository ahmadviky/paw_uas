@props(['title'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}">
    <title>{{ $title ?? 'Document' }}</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div style="background-image: url('/storage/bc.jpg');backgroud-size:cover">
        <nav class="navbar !tw-bg-sky-700 tw-ticky-top tw-text-white tw-shadow-md tw-shadow-lime-900 !tw-h-18 ">
            <div class="tw-flex tw-justify-between tw-w-full tw-mr-8">
                <div class="container-fluid">
                    <div class="navbar-brand text-white tw-text-bold !tw-gap-x-4 tw-bg-green ">
                        <button class="btn btn-light tw-border tw-border-sky-500" type="button"
                            data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M3 6h18v2H3zm0 5h18v2H3zm0 5h18v2H3z" />
                            </svg>
                        </button>
                        <i class="fas fa-book-open"></i>
                        Perpustakaan
                    </div>
                </div>
                <x-toggle-theme />
            </div>
        </nav>

        <div class="offcanvas offcanvas-start !tw-top-16 !tw-w-64 tw-bg-sky-900 " data-bs-scroll="true"
            data-bs-backdrop="false" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
            <ul class="tw-h-full">
                <div class="offcanvas-body">
                    <div class="offcanvas-body">
                        <div class="tw-flex tw-justify-center tw-mb-4">
                            <img src="untag.png" alt="Logo" class="tw-rounded-full tw-w-16 tw-h-16">
                        </div>
                        <a href="/anggota"
                            class="tw-flex !tw-text-white tw-items-center tw-h-14 tw-rounded-md hover:tw-bg-cyan-600 tw-p-4 tw-gap-x-4 tw-mt-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.4 3.4 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.4 3.4 0 0 0 15 11a3.5 3.5 0 0 0 0-7" />
                            </svg>
                            Anggota
                        </a>
                        <a href="/buku"
                            class="tw-flex !tw-text-white tw-items-center tw-h-14 tw-rounded-md hover:tw-bg-cyan-600 tw-p-4 tw-gap-x-4 tw-mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M20.75 16.714a1 1 0 0 1-.014.143a.75.75 0 0 1-.736.893H6a1.25 1.25 0 1 0 0 2.5h14a.75.75 0 0 1 0 1.5H6A2.75 2.75 0 0 1 3.25 19V5A2.75 2.75 0 0 1 6 2.25h13.4c.746 0 1.35.604 1.35 1.35zM9 6.25a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 0-1.5z"
                                    clip-rule="evenodd" />
                            </svg>
                            Buku
                        </a>
                        <a href="laporan"
                            class="tw-flex !tw-text-white tw-items-center tw-h-14 tw-rounded-md hover:tw-bg-cyan-600 tw-p-4 tw-gap-x-4 tw-mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.4em" height="1.4em" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2">
                                    <path
                                        d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h5.697M18 14v4h4m-4-7V7a2 2 0 0 0-2-2h-2" />
                                    <path
                                        d="M8 5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2h-2a2 2 0 0 1-2-2m6 13a4 4 0 1 0 8 0a4 4 0 1 0-8 0m-6-7h4m-4 4h3" />
                                </g>
                            </svg>
                            Laporan
                        </a>
                        <button form="form-delete"
                            class="tw-flex !tw-text-red-500 tw-w-full tw-items-center tw-h-15 tw-rounded-md hover:tw-bg-cyan-500 tw-p-4 tw-gap-x-4 tw-mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2a9.985 9.985 0 0 1 8 4h-2.71a8 8 0 1 0 .001 12h2.71A9.985 9.985 0 0 1 12 22m7-6v-3h-8v-2h8V8l5 4z" />
                            </svg>
                            LogOut
                        </button>
            </ul>
        </div>
    </div>

    <form id="form-delete" action="{{ route('logout') }}" method="POST">
        @csrf
        @method('delete')
    </form>
    <main class="tw-p-4">
        {{ $slot }}
    </main>
    </div>
</body>

</html>
