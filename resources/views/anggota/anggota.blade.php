<x-app-layout>
    <x-alert />
    <div class="card">
        <div class="card-body !tw-bg-teal-900">
            <div class="bg-gray-500 dark:bg-gray-700 w-full flex flex-col">
                <h2 class="text-white dark:text-gray-200 tw-text-center tw-text-[24px] tw-font-bold">Data Anggota
                    Perpustakaan
                </h2>
                <div class="tw-flex tw-justify-between">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 tw-w-44 tw-visible  !tw-flex !tw-gap-1 " type="search"
                            name="search" value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>

                    </form>
                    <a href="/anggota/create"
                        class="form-control me-2 tw-w-44 tw-visible tw-mt-3 !tw-flex !tw-gap-1  tw-bg-blue-800 tw-hover:bg-blue-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1z" />
                        </svg>
                        Tambah
                    </a>
                </div>
                <div class="d-row me-2 g-4 tw-mt-2">
                    <a href="{{ route('anggota.export', 'excel') }}" class="btn btn-success">Export
                        EXCEL</a>
                    <a href="{{ route('anggota.export', 'pdf') }}" class="btn btn-danger">Export PDF</a>
                </div>
                <table class="table table-success table-striped  tw-mt-4 tw-text-center">
                    <thead>
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat. Lahir</th>
                            <th scope="col">Tgl. Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No. Telp</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Code QR</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anggotas as $anggota)
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button data-bs-toggle="modal" data-bs-target="#hapus_anggota_form"
                                            onclick="deleteAnggota({{ $anggota->id }})" type="button"
                                            class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                            </svg></button>
                                        <a href="/anggota/{{ $anggota->id }}/edit" class="btn btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m18.988 2.012l3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287l-3-3L8 13z" />
                                                <path fill="currentColor"
                                                    d="M19 19H8.158c-.026 0-.053.01-.079.01c-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $anggota->nama }}</td>
                                <td>{{ $anggota->tempat_lahir }}</td>
                                <td>{{ $anggota->tanggal_lahir }}</td>
                                <td>{{ $anggota->alamat }}</td>
                                <td>{{ $anggota->jenis_kelamin }}</td>
                                <td>{{ $anggota->no_telp }}</td>
                                <td>
                                    @if ($anggota->foto)
                                        <img class="dark:border-gray-700 h-52 w-full border-b border-gray-100 object-contain"
                                            src="{{ asset('storage/' . $anggota->foto) }}" alt="Image Anggota">
                                    @else
                                        Tidak ada foto
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $dataQR =
                                            "Nama : {$anggota->nama}\n" .
                                            "Tempat Lahir : {$anggota->tempat_lahir}\n" .
                                            "Tanggal Lahir : {$anggota->tanggal_lahir}\n" .
                                            "Alamat : {$anggota->alamat}\n" .
                                            "Jenis Kelamin : {$anggota->jenis_kelamin}\n" .
                                            "NO Telp : {$anggota->no_telp}\n";
                                    @endphp
                                    <img class="mt-2 tw-mx-auto"
                                        src="https://api.qrserver.com/v1/create-qr-code/?data={!! urlencode($dataQR) !!}&amp;size=200x200"
                                        alt="" title="" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tw-mt-4">
                {{ $anggotas->links() }}
            </div>
        </div>
    </div>
    <form id="hapus_anggota_form" method="POST" class="modal" tabindex="-5">
        @csrf
        @method('delete')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Yakin ingin menghapus data anggota??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function deleteAnggota(id) {
            const form = document.querySelector('#hapus_anggota_form')
            form.action = `anggota/${id}`
        }
    </script>

</x-app-layout>
