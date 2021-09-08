@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card shadow-sm mb-4">
            <div class="card-header d-flex py-3">
                <h4 class="m-0 font-weight-bold text-success">Links</h4>
            </div>
            <div class="table-responsive">
                <table class="table table-content table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>As</th>
                            <th>To</th>
                            <th>Icon</th>
                            <th>Permission Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($links as $link)
                            <tr>
                                <td><a href="{{ route('admin.contacts.show', $link->id) }}">{{ $link->title }}</a></td>
                                <td>{{ $link->as }}</td>
                                <td>{{ $link->to }}</td>
                                <td>
                                    <i class="{{ $link->icon }}"></i><br>
                                    <small>{{ $link->icon }}</small>
                                </td>
                                <td>{{ $link->permission_title }}</td>
                                <td>{{ $link->status }}</td>
                                <td>
                                    <div class="btn-group btn-group-toggle">
                                        <a href="javascript:void(0);" onclick="if (confirm('Are You sure want to Delete?'))
                                            { document.getElementById('link-delete-{{ $link->id }}').submit(); } else { return false; }"
                                           title="Delete" class="btn-danger btn btn-sm"><i class="fa fa-trash"></i>
                                        </a>
                                        <form action="{{ route('admin.links.destroy', $link->id) }}" method="post" id="link-delete-{{ $link->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No links found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="5">
                            <div class="float-right">
                            {!!$links->appends(request()->all())->links() !!}
                            </div>
                        </th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
