<x-app-layout>
    <x-slot name="header">
        <div class="justify-between d-flex" style="display: flex">
            <h2 class="mt-2 text-xl font-semibold leading-tight text-gray-800">
                Edit User
            </h2>
            <a class="px-5 py-3 text-sm text-white rounded-md bg-slate-700" href="{{ route('users.index') }}">Users</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update',$user->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input type="text" value="{{ old('name',$user->name) }}" name="name" placeholder="Enter Name" class="w-1/2 border-gray-300 rounded-lg shadow-sm">
                                @error('name')
                                    <p class="font-medium text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <label for="" class="text-lg font-medium">Email</label>
                            <div class="my-3">
                                <input type="text" value="{{ old('email',$user->email) }}" name="email" placeholder="Enter email" class="w-1/2 border-gray-300 rounded-lg shadow-sm">
                                @error('email')
                                    <p class="font-medium text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            @if ($roles-> isNotEmpty())
                                    @foreach ($roles as $key=>$role)
                                        <div class="my-3" style="cursor: pointer;">
                                            <input {{ ($hasRoles->contains($role->id)) ? 'checked' : '' }} style="cursor: pointer;" type="checkbox" id="role-{{ $role->name }}" name="role[]" value="{{ $role->name }}" class="rounded">
                                            <label style="cursor: pointer;" for="role-{{ $role->name }}">{{ $role->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            <button class="px-5 py-3 text-sm text-white rounded-md bg-slate-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
