<x-app-layout>
    <div class="card tw-max-w-2xl tw-mx-auto">
        <div class="card-body  tw-bg-sky-950">
            <div class="bg-gray-200 dark:bg-gray-500 w-full flex flex-col">
                <h2 class="text-white dark:text-gray-200 tw-text-center tw-text-[24px] tw-font-bold">From
                    {{ isset($buku) ? 'Edit' : 'Tambah' }}
                    Buku
                </h2>
                @isset($buku)
                    <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
                        @endisset
                        @csrf
                        <div class="row g-5 tw-mt-2">

                            <div class="col-md">
                                <label for="kode" class="form-label !tw-text-white !tw-bg-bold">Kode</label>
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('kode') is-invalid
                                @enderror"
                                        id="kode" name="kode" required
                                        value="{{ old('kode', $buku->kode ?? '') }}">
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="isbn" class="form-label !tw-text-white !tw-bg-bold">ISBN</label>
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('isbn') is-invalid
                                @enderror"
                                        id="isbn" name="isbn" required
                                        value="{{ old('isbn', $buku->isbn ?? '') }}">
                                    @error('isbn')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="nama_buku" class="form-label !tw-text-white !tw-flex-1">Nama Buku</label>
                                <div class="form-floating">
                                    <input type="text" class="form-control @error('nama_buku') is-invalid @enderror"
                                        id="nama_buku" name="nama_buku" required
                                        value="{{ old('nama_buku', $buku->nama_buku ?? '') }}">
                                    @error('nama_buku')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 tw-mt-2">
                            <div class="col-md">
                                <label for="pengarang" class="form-label !tw-text-white !tw-bg-bold">Pengarang</label>
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('pengarang') is-invalid
                                @enderror"
                                        id="pengarang" name="pengarang" required
                                        value="{{ old('pengarang', $buku->pengarang ?? '') }}">
                                    @error('pengarang')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="penerbit" class="form-label  !tw-text-white !tw-bg-bold">Penerbit</label>
                                <input type="text" class="form-control @error('penerbit') is-invalid @enderror"
                                    id="penerbit" name="penerbit" required
                                    value="{{ old('penerbit', $buku->penerbit ?? '') }}">
                                @error('penerbit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row g-5 ">
                            <div class="col-md ">
                                <label for="tahun_terbit" class="form-label  !tw-text-white ">Tahun Terbitr</label>
                                <div class="form-floating">
                                    <input type="year"
                                        class="form-control @error('tahun_terbit') is-invalid @enderror"
                                        id="tahun_terbit" name="tahun_terbit" required
                                        value="{{ old('tahun_terbit', $buku->tahun_terbit ?? '') }}">
                                    @error('tahun_terbit')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="status"
                                    class="form-label !tw-text-white tw-mt-1 !tw-flex-1">Status</label>
                                <div class="form-floating">
                                    <select class ="form-select"
                                        class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status" required value="{{ old('status', $buku->status ?? '') }}">
                                        <option disabled selected>--- Status ---</option>
                                        <option value="ada"
                                            {{ old('status', $buku->status ?? '') == 'ada' ? 'selected' : '' }}>Ada
                                        </option>
                                        <option value="tidak_ada"
                                            {{ old('status', $buku->status ?? '') == 'tidak_ada' ? 'selected' : '' }}>
                                            Tidak
                                            Ada</option>
                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="tw-mt-3">
                            <label for="deskripsi"
                                class="form-label !tw-text-white tw-mt-1 !tw-flex-1">Deskripsi</label>
                            <input type ="text" class="form-control @error('deskripsi') is-invalid @enderror"
                                id="deskripsi" name="deskripsi" required
                                value="{{ old('deskripsi', $buku->deskripsi ?? '') }}">
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="tw-mt-3 !tw-text-white">
                            <label class="from label !tw-text-white " for="cover">Upload
                                Cover</label>
                            <input name="cover"
                                class=" !tw-text-white tw-mt-1 from-laber dark:bg-green-700 dark:border-green-600 dark:placeholder-green-400 block w-full cursor-pointer rounded-lg border border-green-300 bg-green-50 text-sm text-green-900 focus:outline-none !tw-flex-1"
                                id="cover" type="file" onchange="previewPhoto">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="tw-mt-3">
                            <label for="file" class="form-label !tw-text-white tw-mt-1 !tw-flex-1">File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                id="file" name="file">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input
                            class="btn btn-primary tw-container tw-w-44 tw-bg-blue-500 tw-hover:bg-blue-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-mt-4"
                            type="submit" value="Submit">
                        <input
                            class="btn btn-primary tw-container tw-w-44 tw-bg-red-500 tw-hover:bg-blue-700 tw-text-red tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-mt-4"
                            type="reset" value="Reset">
                    </form>
                    < </div>
            </div>
        </div>
</x-app-layout>
