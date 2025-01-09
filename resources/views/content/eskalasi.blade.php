<x-layout>
    <x-slot:title>
    {{ ucfirst(auth()->user()->role) }}
    </x-slot:title>
    <x-slot:navTitle>
        Eskalasi
    </x-slot:navTitle>
    <x-slot:navlinks>
        <x-navlinks.admin />
    </x-slot:navlinks>
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
                        @foreach ($telefons as $value)
                            @foreach ($value as $key => $telefon)
                                <th>{{ strtoupper($key) }}</th>
                            @endforeach
                            @break
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