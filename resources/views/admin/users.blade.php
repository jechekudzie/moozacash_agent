@extends('admin.layouts.master')

@section('content')

    <!-- Main Container -->
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">

            <h2 class="content-heading">User Management</h2>

            <!-- Dynamic Table Full -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        User Accounts
                    </h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell">ID Number</th>
                            <th class="d-none d-sm-table-cell">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Roles</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\App\Models\User::all() as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->national_id }}</td>
                                <td>{{ $user->number }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="d-none d-sm-table-cell">
                                    @foreach ($user->getRoleNames() as $role)
                                        {{ $role }},
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    @if($user->hasRole('Agent'))
                                        <a class="updateFloat"
                                           data-id="{{ $user->id }}"
                                           data-name="{{ $user->name }}"
                                           href="#">Float</a> |
                                    @endif
                                    <a href="{{ url('admin/user/'.$user->slug) }}">Roles</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->

        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->

    <!-- Normal Modal -->
    <div class="modal" id="modal-normal" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Update the Agent's Float</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <form method="post" action="{{ url('update-float') }}">
                        @csrf
                        <div class="m-3">
                            <label class="form-label" for="side-overlay-profile-name">Update Value</label>
                            <div class="input-group">
                                <input type="text" name="float" class="form-control"
                                       placeholder="Enter absolute amount here"/>
                            </div>
                        </div>
                        <div class="block-content block-content-full block-content-sm text-end border-top mt-5">
                            <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                                Cancel
                            </button>
                            <input type="hidden" name="order" id="inputNumber">
                            <button type="submit" class="btn btn-alt-primary" data-bs-dismiss="modal">
                                Confirm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END Normal Modal -->

@endsection

<!--javascript push here and stack on master page-->
@push('scripts')
    <script>

        //set up csrf for laravel ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $('#youSendCurrency').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
            console.log($(this).val());
        });

        //modal-normal

        //launch modal on confirm-link click
        $('.updateFloat').on('click', function (e) {
            e.preventDefault();
            $('#modal-normal').modal('show');
        });

    </script>
@endpush

