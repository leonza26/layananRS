<div>

    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Payments tool for software companies</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">From
                    checkout to global sales tax compliance, companies around the world use Flowbite to simplify their
                    payment stack.</p>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Speak to Sales
                </a>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/hero/phone-mockup.png" alt="mockup">
            </div>
        </div>
    </section>

    <div class="text-center mt-5">
        <h1 class="text-3xl font-semibold px-3">{{ $welcome }}</h1>
        <p class="px-3">Jumlah User yang ada : {{ count($countUser) }}</p>
    </div>


    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-2 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Create User</h2>
        </div>

        <div class="mt-2 sm:mx-auto sm:w-full sm:max-w-sm">


            @if (session('status'))
                <!-- Alert Style 2: Card Style with Close Button (Success) -->
                <div class="bg-white my-5 border border-green-200 shadow-md rounded-lg p-4 animate-slide-in"
                    style="animation-delay: 0.1s;">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <span
                                class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-green-100 text-green-500">
                                <i class="fas fa-check"></i>
                            </span>
                        </div>
                        <div class="ml-4 w-full">
                            <div class="flex justify-between items-center mb-1">
                                <h3 class="text-lg font-medium text-gray-900">{{ session('status') }}</h3>
                                <button class="text-gray-400 hover:text-gray-500">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            @endif



            <form wire:submit.prevent="createUser" action="#" method="POST" class="space-y-6">

                <div>
                    <label for="name" class="block mt-5 text-sm/6 font-medium text-gray-900">Name</label>
                    <div class="mt-2">
                        <input wire:model="name" id="name" type="text" name="name" autocomplete="name"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        <div>
                            @error('name')
                                <p class="mt-2.5 text-sm text-fg-danger-strong"><span
                                        class="font-medium">{{ $message }}</span></p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <label for="role" class="block text-sm/6 font-medium text-gray-900">Role</label>
                    <div class="mt-2">
                        <input wire:model="role" id="role" type="text" name="role" autocomplete="role"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        <div>
                            @error('role')
                                <p class="mt-2.5 text-sm text-fg-danger-strong"><span
                                        class="font-medium">{{ $message }}</span></p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                    <div class="mt-2">
                        <input wire:model="email" id="email" type="email" name="email" autocomplete="email"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        <div>
                            @error('email')
                                <p class="mt-2.5 text-sm text-fg-danger-strong"><span
                                        class="font-medium">{{ $message }}</span></p>
                            @enderror
                        </div>
                    </div>
                </div>


                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot
                                password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input wire:model="password" id="password" type="password" name="password"
                            autocomplete="current-password"
                            class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
                        <div>
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <button
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create</button>
                </div>
            </form>

            <p class="mt-10 text-center text-sm/6 text-gray-500">
                Not a member?
                <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Start a 14 day free
                    trial</a>
            </p>
        </div>
    </div>


    <!-- Tabel User/Dokter -->
    <section>
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <!-- Toolbar Tabel -->
            <div class="flex flex-col md:flex-row justify-between items-center p-5 border-b border-gray-200 bg-gray-50">
                <h3 class="font-bold text-gray-700 text-lg mb-4 md:mb-0">Daftar User/Dokter</h3>

                <div class="flex space-x-2 w-full md:w-auto">
                        <input wire:model.live.debounce.300ms="searchTerm" type="text" placeholder="Cari user/dokter..."
                            class="border border-gray-300 rounded-lg px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-emerald-400 w-full md:w-64">
                </div>

            </div>

            <!-- Tabel -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100 text-gray-500 uppercase text-xs font-semibold">
                        <tr>
                            <th class="px-6 py-4 tracking-wider">User/Dokter</th>
                            <th class="px-6 py-4 tracking-wider">Jabatan</th>
                            <th class="px-6 py-4 tracking-wider text-center">Status</th>
                            <th class="px-6 py-4 tracking-wider">Bergabung</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @forelse ($users as $user)
                            <!-- Baris 1 -->
                            <tr class="hover:bg-gray-50 transition duration-150">

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div
                                                class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-500 font-bold">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        @if ($user->role == 0)
                                            Admin
                                        @elseif ($user->role == 1)
                                            Dokter
                                        @else
                                            User
                                        @endif
                                    </div>
                                    <div class="text-xs text-gray-500">Status Keanggotaan</div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span
                                        class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $user->created_at }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                    Tidak ada user/dokter ditemukan.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            <!-- Pagination Footer -->
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex items-center justify-between">
                <span class="text-sm text-gray-600">Menampilkan <span class="font-bold">1-3</span> dari <span
                        class="font-bold">24</span> hasil</span>
                <div class="inline-flex mt-2 xs:mt-0">
                    <button
                        class="bg-white border border-gray-300 text-gray-600 hover:bg-gray-100 text-sm font-medium py-2 px-4 rounded-l">
                        Prev
                    </button>
                    <button
                        class="bg-white border-l-0 border border-gray-300 text-gray-600 hover:bg-gray-100 text-sm font-medium py-2 px-4 rounded-r">
                        Next
                    </button>
                </div>
            </div>
        </div>
    </section>



</div>
