<x-admin-layout>
    <div class="py-12 flex w-full">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-end">
                    <a href="{{ route('admin.permissions.create') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Create</a>
                </div>
                <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider flex justify-end">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($permissions as $permission)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $permission->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                <div class="flex justify-end">
                                    <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <!-- Tombol Delete -->
                                    <button type="button"
                                        onclick="confirmDelete({{ $permission->id }})"
                                        class="ml-2 text-red-500 hover:text-red-600">
                                        Delete
                                    </button>
                                    <form id="delete-form-{{ $permission->id }}" action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
