<x-admin-layout>
    <div class="py-12 flex w-full">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider flex justify-end">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $user->name }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    {{ $user->email }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap  text-sm font-medium">
                                <div class="flex justify-end">
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.users.show', $user->id) }}"
                                        class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a>

                                    <!-- Tombol Delete -->
                                    <button type="button"
                                        onclick="confirmDelete({{ $user->id }}, {{ $user->hasRole('admin') ? 'true' : 'false' }})"
                                        class="ml-2 bg-red-500 hover:bg-red-600 px-4 py-2 text-white rounded-md">
                                        Delete
                                    </button>
                                    <form
                                     id="delete-form-{{ $user->id }}"
                                     action="{{ route('admin.users.destroy', $user->id) }}"
                                     method="POST"
                                     style="display: none;">
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
