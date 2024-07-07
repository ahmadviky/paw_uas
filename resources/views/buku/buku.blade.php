<x-app-layout>
    <x-alert />
    <div class="card">
        <div class="card-body !tw-bg-teal-900">
            <div class="bg-gray-500 dark:bg-gray-700 w-full flex flex-col">
                <h2 class="text-white dark:text-gray-200 tw-text-center tw-text-[24px] tw-font-bold">Data Buku
                    Perpustakaan
                </h2>
                <div class="tw-flex tw-justify-between">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 tw-w-44 tw-visible  !tw-flex !tw-gap-1 " type="search"
                            name="search" value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                    <a href="/buku/create"
                        class="form-control me-2 tw-w-44 tw-visible  !tw-flex !tw-gap-1  tw-bg-blue-800 tw-hover:bg-blue-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded"
                        type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M4.5 8.552c0 1.995 1.505 3.5 3.5 3.5s3.5-1.505 3.5-3.5s-1.505-3.5-3.5-3.5s-3.5 1.505-3.5 3.5M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 19h10v-1c0-2.757-2.243-5-5-5H7c-2.757 0-5 2.243-5 5v1z" />
                        </svg>
                        Tambah
                    </a>

                </div>
                <div class="d-row me-2 g-4 tw-mt-2">
                    <a href="{{ route('buku.export', 'excel') }}" class="btn btn-success me-2">Export EXCEL</a>
                    <a href="{{ route('buku.export', 'pdf') }}" class="btn btn-danger">Export PDF</a>
                </div>
                <table class="table table-success table-striped tw-mt-5 tw-text-center">
                    <thead>
                        <tr>
                            <th scope="col">Action</th>
                            <th scope="col">ISBN</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Pengarang</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Code QR</th>
                            <th scope="col">Upload File</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukus as $buku)
                            <tr>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button data-bs-toggle="modal" data-bs-target="#hapus_buku_form"
                                            onclick="deleteBuku({{ $buku->id }})" type="button"
                                            class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="1.5em" height="1.5em" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M7 21q-.825 0-1.412-.587T5 19V6H4V4h5V3h6v1h5v2h-1v13q0 .825-.587 1.413T17 21zm2-4h2V8H9zm4 0h2V8h-2z" />
                                            </svg></button>
                                        <a href="/buku/{{ $buku->id }}/edit" class="btn btn-success">
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
                                <td>{{ $buku->isbn }}</td>
                                <td>{{ $buku->nama_buku }}</td>
                                <td>{{ $buku->pengarang }}</td>
                                <td>{{ $buku->penerbit }}</td>
                                <td>{{ $buku->tahun_terbit }}</td>
                                <td>{{ $buku->deskripsi }}</td>
                                <td>{{ $buku->status }}</td>
                                <td>
                                    @if ($buku->cover)
                                        <img class="dark:border-gray-700 h-52 w-full border-b border-gray-100 object-contain"
                                            src="{{ asset('storage/' . $buku->cover) }}" alt="Cover Buku">
                                    @else
                                        Tidak ada cover
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $dataQR =
                                            "ISBN : {$buku->isbn}\n" .
                                            "Nama Buku : {$buku->nama_buku}\n" .
                                            "Pengarang : {$buku->pengarang}\n" .
                                            "Penerbit : {$buku->penerbit}\n" .
                                            "Tahun terbit : {$buku->tahun_terbit}\n" .
                                            "Deskripsi : {$buku->deskripsi}\n" .
                                            "Status : {$buku->status}\n";
                                    @endphp
                                    <img class="mt-2 tw-mx-auto"
                                        src="https://api.qrserver.com/v1/create-qr-code/?data={!! urlencode($dataQR) !!}&amp;size=200x200"
                                        alt="" title="" />
                                </td>
                                <td>
                                    <div class="d-row g-4">
                                        <a href="{{ 'storage/' . $buku->file }}" download="{{ $buku->file }}"
                                            type="button" class="btn btn-danger">PDF</a>

                                        <a href="{{ 'storage/' . $buku->file }}" download="{{ $buku->file }}"
                                            type="button" class="btn btn-success mt-1">EXCEL</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <div class="tw-mt-4">
            {{ $bukus->links() }}
        </div>
    </div>
    <form id="hapus_buku_form" method="POST" class="modal" tabindex="-5">
        @csrf
        @method('delete')
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Yakin ingin menghapus data buku??</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Hapus</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function deleteBuku(id) {
            const form = document.querySelector('#hapus_buku_form')
            form.action = `/buku/${id}`
        }
    </script>
</x-app-layout>
