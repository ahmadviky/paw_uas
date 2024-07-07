<x-auth-layout>
    <div style="background-image: url('/storage/be.jpg');backgroud-size:cover"
        class="tw-flex tw-items-center tw-justify-center tw-h-full tw-w-full tw-absolute">
        <form method="POST" action="/register" class=" tw-bg-black tw-bg-opacity-90 tw-p-10 tw-w-72 tw-rounded-lg">
            <h1 class="tw-text-white tw-text-center tw-text-4xl tw-mb-4">
                Register</h1>

            @csrf
            <x-alert />

            <div class="tw-flex tw-items-admin tw-border-b-2 tw-border-white tw-py-2">
                <i class="fas fa-envelope-open-text tw-text-white tw-text-lg"></i>
                <input type="text" name="username" autofocus autocomplete="username" required
                    value="{{ old('username', '') }}"
                    class="tw-ml-2 tw-bg-transparent tw-text-white tw-w-full tw-outline-none">
            </div>
            <div class="tw-flex tw-items-center tw-border-b-2 tw-border-white tw-py-2">
                <i class="fas fa-envelope-open-text tw-text-white tw-text-lg"></i>
                <input type="text" name="name" autofocus autocomplete="name" required
                    value="{{ old('username', '') }}"
                    class="tw-ml-2 tw-bg-transparent tw-text-white tw-w-full tw-outline-none">
            </div>
            <div class="tw-flex items-center tw-border-b-2 tw-border-white py-2">
                <i class="fas fa-lock tw-text-white tw-text-lg"></i>
                <input type="password" name="password" autofocus required
                    class="tw-ml-2 tw-bg-transparent tw-text-white tw-w-full tw-outline-none">
            </div>
            <div class="tw-flex items-center tw-border-b-2 tw-border-white py-2">
                <i class="fas fa-lock tw-text-white tw-text-lg"></i>
                <input type="password" name="confirm_password" autofocus required
                    class="tw-ml-2 tw-bg-transparent tw-text-white tw-w-full tw-outline-none">
            </div>
            <button type="submit" name="register"
                class="tw-container tw-bg-blue-500 tw-hover:bg-blue-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-mt-4">Register</button>
            <p class="tw-text-white tw-text-sm"> Sudah punya akun...! <a href="/login"
                    class="tw-center tw-text-blue-500">Login</a></p>
        </form>
    </div>
</x-auth-layout>
