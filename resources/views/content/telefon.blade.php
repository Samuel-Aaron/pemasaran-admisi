<x-layout>
    <x-slot:title>
    {{ ucfirst(auth()->user()->role) }}
    </x-slot:title>
    <x-slot:navTitle>
        Telefon
    </x-slot:navTitle>
    <x-slot:navlinks>
        <x-navlinks.admin />
    </x-slot:navlinks>
    <x-partials.alert />
    <a href="/tambah-telefon">
        <button class="btn btn-active btn-primary">Tambah Telefon</button>
    </a>
    @php
        $telefons = json_decode($telefons);
    @endphp
    <div class="overflow-x-auto">
        @if ($telefons != null)
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>

                        </th>
                        @foreach ($telefons[0] as $key => $value)
                            <th>{{ strtoupper($key) }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($telefons as $key => $value)
                        <tr class="hover">
                            <th>
                                <a href="{{ route('telefon.edit', $value->id) }}" class="btn btn-active btn-secondary">Edit
                                </a>
                            </th>
                            @foreach ($value as $telefon)
                                <th>{{ $telefon}}</th>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-red-500 block text-center m-4">Tidak ada data</p>
        @endif
    </div>
</x-layout>