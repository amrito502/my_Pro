<x-app-layout>
    <x-slot name="header">
        <div class="justify-between d-flex" style="display: flex">
            <h2 class="mt-2 text-xl font-semibold leading-tight text-gray-800">
                Permissions List
            </h2>
            <a class="px-5 py-3 text-sm text-white rounded-md bg-slate-700"
                href="{{ route('permissions.create') }}">Create Permission</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full pb-3 mb-5">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">#</th>
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Created At</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if ($permissions->isNotEmpty())
                        @foreach ($permissions as $key => $permission)
                            <tr class="border-b">
                                <td class="px-6 py-3 text-left">{{ $key + 1 }}</td>
                                <td class="px-6 py-3 text-left">{{ $permission->name }}</td>
                                <td class="px-6 py-3 text-left">{{ \Carbon\Carbon::parse($permission->created_at)->format('d M, Y') }}</td>
                                <td class="px-6 py-3 text-center">
                                    <a class="px-5 py-3 text-sm text-white bg-blue-700 rounded-md"
                                        href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                                    <a class="px-5 py-3 text-sm text-white bg-red-700 rounded-md"
                                        href="javascript:void(0)" onclick="deletePermission({{ $permission->id }})">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
           <div class="px-3 py-1 my-3 text-white bg-white">
            {{ $permissions->links() }}
           </div>
        </div>
    </div>
    <x-slot name="script">
        <script type="text/javascript">
            function deletePermission(id){
                if(confirm("are you sure to delete!")){
                    $.ajax({
                        url : '{{ route("permissions.destroy") }}',
                        type : 'delete',
                        data : {id: id},
                        dataType : 'json',
                        headers : {
                            'x-csrf-token' : '{{ csrf_token() }}'
                        },
                        success : function(response){
                            window.location.href = '{{ route('permissions.index') }}'
                        }
                    })
                }
            }
        </script>
    </x-slot>
</x-app-layout>
