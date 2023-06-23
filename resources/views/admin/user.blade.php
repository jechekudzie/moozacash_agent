@extends('admin.layouts.master')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <form method="POST" action="{{ url('/admin/users/roles-permissions/update') }}">
                @csrf
                <h1>Manage Roles and Permissions</h1>

                <h2>User: {{ $user->name }}</h2>

                <h3>Roles</h3>
                @foreach ($roles as $role)
                    <div>
                        <input type="checkbox" name="roles[]" class="form-check-input" id="{{ $role->id }}"
                               value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                        <label for="{{ $role->id }}">{{ $role->name }}</label>
                    </div>
                @endforeach
                <input type="hidden" value="{{ $user->slug }}" name="user">
                <button type="submit" class="btn btn-alt-primary mt-3">Save</button>
            </form>

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

@endsection
