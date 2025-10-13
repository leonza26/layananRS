<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mx-auto w-full max-w-sm lg:w-96">

        <div>
            <a href="/" class="text-3xl font-bold text-blue-600">Klinik Sehat</a>
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Selamat Datang Kembali</h2>
            <p class="mt-2 text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Daftar sekarang</a>
            </p>
        </div>

        <div class="mt-8">
            <div class="mt-6">

                {{-- form login --}}
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    {{-- alamat email  --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Alamat Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                autocomplete="email" required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('email') border-red-500 @enderror">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- password --}}
                    <div class="space-y-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm @error('password') border-red-500 @enderror">
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- remember me dan lupa password--}}
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember" name="remember" type="checkbox"
                                class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            <label for="remember" class="ml-2 block text-sm text-gray-900">Ingat saya</label>
                        </div>

                        {{-- lupa password--}}
                        <div class="text-sm">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="font-medium text-blue-600 hover:text-blue-500">Lupa password?</a>
                            @endif
                        </div>
                    </div>

                    {{-- tombol login--}}
                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Login
                        </button>
                    </div>
                </form>
                {{-- end form login --}}

            </div>
        </div>
    </div>

</x-guest-layout>
