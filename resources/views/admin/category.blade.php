@extends('admin.layout.master_admin')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <div class="row justify-content-between">
            <div class="col-4">
                <a class="btn bg-gradient-success btn-block mb-3" href="#" data-bs-toggle="modal" data-bs-target="#createCategory"> Create New Post</a>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="table">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 ">Action</th>
                    <th></th>
                </tr>
            </thead>
            @php $no=1; @endphp
            @forelse ($data as $item)
            <tbody>
                <tr class="text-center align-middle">
                    <td>
                        <span class="badge badge-dot me-4 ">
                            <i class="bg-info "></i>
                            <span class="text-dark text-xs">{{ $no++ }}</span>
                        </span>
                    </td>
                    <td>
                        <span class="badge badge-dot me-4 ">
                            <i class="bg-info "></i>
                            <span class="text-dark text-xs">{{ $item->name }}</span>
                        </span>
                    </td>
                    <td>
                        <a class="btn bg-gradient-info btn-block" data-bs-toggle="modal" data-bs-target="#editCategory{{ $item->id }}" href="#">Edit</a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ $item->id }}">Delete</button>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('modal')

<!-- Modal Create Berita -->
@foreach ($data as $item)
<div class="modal fade" id="createCategory" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header ">
                <h5 class="modal-title ">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name Category:</strong>
                                <input class="form-control" name="name" placeholder="Name Category" required></input>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

<!-- Modal Edit Home-->
@foreach ($data as $item)
<div class="modal fade" id="editCategory{{ $item->id }}" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('kategori.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name Category:</strong>
                                <input class="form-control" name="name" placeholder="Name Category" value="{{ $item->name }}" required>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endforeach