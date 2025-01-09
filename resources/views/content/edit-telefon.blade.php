<x-layout>
    <x-slot:title>
    {{ ucfirst(auth()->user()->role) }}
    </x-slot:title>

    <x-slot:navTitle>
        ID : {{ $telefon->id }}
    </x-slot:navTitle>

    <x-slot:navlinks>
        <x-navlinks.admin />
    </x-slot:navlinks>
    <!-- Content -->
    <div class="card bg-base-200 w-full shrink-0 shadow-2xl">
        <form class="card-body" action="{{ route('telefon.update', $telefon->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama</span>
                </label>
                <input type="text" name="nama" placeholder="{{ $telefon->nama }}" class="input input-bordered" required />
            </div>
            @error('nama')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Status</span>
                </label>
                <select name="status_kendala" class="select select-bordered w-full">
                    <option>selesai</option>
                    <option>eskalasi</option>
                    <option>expired</option>
                </select>
            </div>
            @error('status_kendala')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <div class="form-control mt-6 flex flex-row justify-end">
                <button class="btn btn-primary">Update Telefon</button>
            </div>
        </form>
    </div>
</x-layout>