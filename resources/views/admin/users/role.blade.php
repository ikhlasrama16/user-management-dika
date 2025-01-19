<x-admin-layout>
    <div class="py-12 flex w-full">
        <div class="w-full max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex">
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Users Index</a>
                </div>
                <div class="flex flex-col">
                    <div class="">Name: {{ $user->name }}</div>
                    <div class="">Email: {{ $user->email }}</div>
                </div>
                <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="mt-4 p-2">
                        @if($user->roles)
                            @foreach ($user->roles as $user_role)
                            <button type="button"
                                onclick="confirmDelete({{ $user->id }})"
                                class="ml-2 text-red-500 hover:text-red-600">
                                {{ $user_role->name }}
                            </button>
                            <form
                             id="delete-form-{{ $user->id }}"
                             action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                             method="POST"
                             style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('admin.users.roles', $user) }}">
                            @csrf
                          <div class="sm:col-span-6">
                            <div class="sm:col-span-6">
                                <label for="role" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="role" name="role" autocomplete="role-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 rounded-md">Assign</button>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold">Permissions</h2>
                    <div class="mt-4 p-2">
                        @if($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                            <button type="button"
                                onclick="confirmDelete({{ $user->id }})"
                                class="ml-2 text-red-500 hover:text-red-600">
                                {{ $user_permission->name }}
                            </button>
                            <form
                             id="delete-form-{{ $user->id }}"
                             action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                             method="POST"
                             style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl">
                        <form method="POST" action="{{ route('admin.users.permissions', $user) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission"
                                    class="block text-sm font-medium text-gray-700">Permission</label>
                                <select id="permission" name="permission" autocomplete="permission-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                          </div>
                          <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-600 rounded-md">Assign</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
