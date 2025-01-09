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

    <div class="card bg-base-200 w-full shrink-0 shadow-2xl">
        <form class="card-body" action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Username</span>
                </label>
                <input type="username" name="username" placeholder="username" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Password</span>
                </label>
                <input type="password" name="password" placeholder="password" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Confirm Password</span>
                </label>
                <input type="password" name="password_confirmation" placeholder="password" class="input input-bordered" required />
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Role</span>
                </label>
                <select name="role" class="select select-bordered w-full">
                    <option>Layanan</option>
                    <option>Eskalasi</option>
                    <option>Tiket</option>
                    <option>Supervisor</option>
                    <option>Admin</option>
                </select>
            </div>
            <div class="form-control mt-6 flex flex-row justify-end">
                <button class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</x-layout>