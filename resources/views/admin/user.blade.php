@extends('admin.layouts.master')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            @if($user->hasRole('Agent'))
                <div class="row">
                    <div class="col-6 col-xl-3">
                        <a class="block block-rounded block-link-shadow text-end" href="javascript:void(0)">
                            <div
                                class="block-content block-content-full d-sm-flex justify-content-between align-items-center">
                                <div class="d-none d-sm-block">
                                    <i class="fa fa-wallet fa-2x opacity-25"></i>
                                </div>
                                <div>
                                    <div
                                        class="fs-3 fw-semibold">{{ $float }}</div>
                                    <div class="fs-sm fw-semibold text-uppercase text-muted">Float</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Row #1 -->
                </div>
            @endif

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
