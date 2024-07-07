<x-app-layout>
    <div class="card tw-max-w-2xl tw-mx-auto">
        <div class="card-body tw-bg-sky-950">
            <div class="bg-gray-200 dark:bg-gray-500 w-full flex flex-col ">
                <h2 class="text-white dark:text-gray-200 tw-text-center tw-text-[24px] tw-font-bold">
                    From {{ isset($anggota) ? 'Edit' : 'Tambah' }} Anggota
                </h2>
                @isset($anggota)
                    <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                        @endisset
                        @csrf
                        <div class="row g-5 tw-mt-2">
                            <div class="col-md">
                                <label for="nama" class="form-label !tw-text-white !tw-bg-bold">Nama</label>
                                <div class="form-floating">
                                    <input type="text"
                                        class="form-control @error('nama') is-invalid
                                @enderror"
                                        id="nama" name="nama" required
                                        value="{{ old('nama', $anggota->nama ?? '') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <label for="tanggal_lahir"
                                    class="form-label !tw-text-white !tw-flex-1">Tgl.Lahir</label>
                                <div class="form-floating">
                                    <input type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" name="tanggal_lahir" required
                                        value="{{ old('tanggal_lahir', $anggota->tanggal_lahir ?? '') }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
            </div>
            <div class="row g-5 ">
                <div class="col-md ">
                    <label for="tempat_lahir" class="form-label  !tw-text-white ">Tempat.Lahir</label>
                    <div class="form-floating">
                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                            id="tempat_lahir" name="tempat_lahir" required
                            value="{{ old('tempat_lahir', $anggota->tempat_lahir ?? '') }}">
                        @error('tempat_lahir')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md">
                    <label for="jenis_kelamin"
                        class="form-label !tw-text-white tw-mt-1 !tw-flex-1">Jenis.Kelamin</label>
                    <div class="form-floating">
                        <select class ="form-select" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            id="jenis_kelamin" name="jenis_kelamin" required
                            value="{{ old('jenis_kelamin', $anggota->jenis_kelamin ?? '') }}">
                            <option selected>--- Pilih Jenis Kelamin ---</option>
                            <option value="L"
                                {{ old('jenis_kelamin', $anggota->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                                Laki-Laki</option>
                            <option value="P"
                                {{ old('jenis_kelamin', $anggota->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </select>
                    </div>
                </div>
            </div>
            <div class="tw-mt-3 !tw-text-white">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class ="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required>{{ old('alamat', $anggota->alamat ?? '') }}</textarea>
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="tw-mt-3 !tw-text-white">
                <div class="tw-mt-3 !tw-text-white">
                    <label for="no_telp" class="form-label">No.Telpon / WA</label>
                    <input type="text" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp"
                        name="no_telp" required value="{{ old('no_telp', $anggota->no_telp ?? '') }}">
                    @error('no_telp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="tw-mt-3 !tw-text-white">
                    <label class="tw-mt-3 !tw-text-white" for="foto">Upload
                        Foto</label>
                    <input name="foto"
                        class=" !tw-text-white tw-mt-3 !tw-flex-1 from-laber dark:bg-green-700 dark:border-green-600 dark:placeholder-green-400 block w-full cursor-pointer rounded-lg border border-green-300 bg-green-50 text-sm text-green-900 focus:outline-none"
                        id="foto" type="file" onchange="previewPhoto">
                    @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-span-3 !tw-text-white">
                    <img src="#" alt="Preview Uploaded Image" id="file-preview" class="hidden max-w-md">
                </div>
                <input
                    class="btn btn-primary tw-bg-blue-500 tw-hover:bg-blue-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-mt-4"
                    type="submit" value="Submit">
                <input
                    class="btn btn-primary  tw-bg-red-500 tw-hover:bg-red-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-mt-4 "
                    type="reset" value="Reset">
                </form>


            </div>
        </div>
    </div>
</x-app-layout>
