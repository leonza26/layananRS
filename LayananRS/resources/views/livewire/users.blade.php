<div>
    <h1 class="text-3xl font-semibold px-3">{{ $welcome }}</h1>
    <p class="px-3">Jumlah User yang ada : {{ count($countUser) }}</p>

    <div class="my-4 px-3">
        @foreach ($countUser as $user)
        <div class="border p-4 mb-2 mt-2">
            <h2 class="text-xl font-bold">{{ $user->name }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
        </div>

    @endforeach
    </div>

</div>
