<div>
    <div class="row mb-3">
        <div class="col-md-5">
            <input wire:model.debounce.300ms="search" type="text" class="form-control" placeholder="@lang('admin.search')">
        </div>
        <div class="col-md-2 offset-md-2 mt-2 mt-md-0">
            <select wire:model="orderBy" class="form-control">
                <option value="id">ID</option>
                <option value="key">@lang('admin.key')</option>
                <option value="text">@lang('admin.text')</option>
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
    </div>
    <table class="table table-bordered table-hover table-responsive text-center">
        <thead>
            <tr>
                <th>@lang('admin.key')</th>
                <th>@lang('admin.text')</th>
                <th><i class="fa-solid fa-screwdriver-wrench"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($translations as $translation)
                <tr>
                    <td>{{ $translation->key }}</td>
                    <td>@lang($translation->group . '.' . $translation->key)</td>
                    <td>
                        <a href="{{ route('translations.edit', ['lang' => _lang(), 'translation' => $translation]) }}" class="px-1"><i class="fa-solid fa-edit"></i></a>
                        @can('superable')
                            <a wire:click="deleteConfirm({{ $translation->id }})" href="javascript:void(0)" class="px-1"><i class="fa-solid fa-trash-alt"></i></a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $translations->links() !!}
    </div>
</div>
