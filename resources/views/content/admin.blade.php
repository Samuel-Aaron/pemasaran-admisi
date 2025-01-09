<x-layout>
    <x-slot:title>
    {{ ucfirst(auth()->user()->role) }}
    </x-slot:title>

    <x-slot:navTitle>
        Admin
    </x-slot:navTitle>

    <x-slot:navlinks>
        <x-navlinks.admin />
    </x-slot:navlinks>
    <!-- Content -->

    <x-partials.alert />
    <div class="flex flex-col gap-4">

        <div class="flex flex-row justify-between">
            <label class="input input-bordered flex items-center gap-2">
                <input type="text" class="grow" placeholder="Search" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="h-4 w-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
            <a href="{{ route('register') }}" class="btn btn-active btn-accent">Tambah Akun</a>
        </div>

        @php
            $users = json_decode($users);
        @endphp
        <div class="overflow-x-auto w-full">
            @if ($users != null)
                <table class="table">
                    <!-- head -->
                    <thead>
                        <tr>
                            @foreach ($users[0] as $key => $value)
                                <th>{{ strtoupper($key) }}</th>
                            @endforeach
                            <th>EDIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $value)
                            <tr>
                                @foreach ($value as $user)
                                    <th>{{ $user }}</th>
                                @endforeach
                                <th>
                                    <a href="{{ route('edit', $value->username) }}" class="btn btn-active btn-secondary">Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $value->username) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-active btn-warning">
                                            Hapus
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-red-500 block text-center m-4">Tidak ada data</p>
            @endif
        </div>
    </div>
</x-layout>