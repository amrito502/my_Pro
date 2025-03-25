<x-app-layout>
    <x-slot name="header">
        <div class="justify-between d-flex" style="display: flex">
            <h2 class="mt-2 text-xl font-semibold leading-tight text-gray-800">
                Edit Role
            </h2>
            <a class="px-5 py-3 text-sm text-white rounded-md bg-slate-700" href="{{ route('roles.index') }}">Roles</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input type="text" value="{{ old('name', $role->name) }}" name="name"
                                    placeholder="Enter Name" class="w-1/2 border-gray-300 rounded-lg shadow-sm">
                                @error('name')
                                    <p class="font-medium text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="grid grid-cols-4 mb-5">
                                @php
                                    $groupedPermissions = $permissions->groupBy(function ($permission) {
                                        return explode(' ', $permission->name)[1] ?? $permission->name;
                                    });
                                @endphp
                                @if ($groupedPermissions->isNotEmpty())
                                    @foreach ($groupedPermissions as $category => $perms)
                                        <div class="mt-4">
                                            <h3 class="text-lg font-semibold">{{ ucfirst($category) }}</h3>
                                            <div class="grid grid-cols-2 gap-2 md:grid-cols-4">
                                                @foreach ($perms as $permission)
                                                    <div class="mt-2">
                                                        <input
                                                            {{ $hasPermissions->contains($permission->name) ? 'checked' : '' }}
                                                            type="checkbox" id="permission-{{ $permission->name }}"
                                                            name="permission[]" value="{{ $permission->name }}"
                                                            class="rounded">
                                                        <label for="permission-{{ $permission->name }}">
                                                            {{ ucfirst(explode(' ', $permission->name)[0]) }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button class="px-5 py-3 text-sm text-white rounded-md bg-slate-700">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
