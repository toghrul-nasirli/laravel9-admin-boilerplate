<div>
    <div class="row mb-3">
        <div class="col-md-3">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="@lang('admin.search')">
        </div>
        <div class="col-md-2 offset-md-4 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="id">ID</option>
                <option value="username">@lang('admin.username')</option>
                <option value="email">@lang('admin.email')</option>
            </select>
        </div>
        <div class="col-md-2 mt-2 mt-md-0">
            <select wire:model="orderDirection" class="form-control">
                <option value="asc">@lang('admin.ascending')</option>
                <option value="desc">@lang('admin.descending')</option>
            </select>
        </div>
        <div class="col-md-1 mt-2 mt-md-0">
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>25</option>
                <option>50</option>
                <option>100</option>
            </select>
        </div>
        <a href="{{ route('users.create') }}" class="btn icon btn-primary plus-btn">
            <i class="bi bi-plus-lg"></i>
        </a>
    </div>
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('admin.username')</th>
                <th>@lang('admin.email')</th>
                <th><i class="fa-solid fa-screwdriver-wrench"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user) }}" class="px-1"><i class="fa-solid fa-edit"></i></a>
                        <a wire:click="deleteConfirm({{ $user->id }})" href="javascript:void(0)" class="px-1"><i class="fa-solid fa-trash-alt"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $users->links() !!}
    </div>
</div>

@section('scripts')
    @include('partials._swal')
@endsection
