@extends('admin.layout.master_admin')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card">
    <div class="card-body">
        <div class="table table-hover">
            <div class="row justify-content-start">
                <div class="col-2">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createCategory">
                        Create New Post
                    </button>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th width="150px">No</th>
                        <th>Name</th>
                        <th width="250px">Action</th>
                    </tr>
                </thead>
                @php $no=1; @endphp
                @forelse ($data as $item)
                <tbody>
                    <tr class="text-center align-middle">
                        <td class="align-middle">{{ $no++ }}</td>
                        <td class="align-middle">{{ $item->name }}</td>
                        <td>
                            <a class="btn btn-link text-dark px-3 mb-0" data-toggle="modal" data-target="#editCategory{{ $item->id }}" href="#">
                                <i class="fas fa-pencil-alt"> Edit</i>
                            </a>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="{{ $item->id }}">
                                    <i class="far fa-trash-alt">Delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

@section('modal')

<!-- Modal Create Berita -->
@foreach ($data as $item)
<div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title ">Create Category</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name Category:</strong>
                                <input class="form-control" name="name" placeholder="Name Category" required></input>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
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
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('kategori.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name Category:</strong>
                                <input class="form-control" name="name" placeholder="Name Category" value="{{ $item->name }}" required>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach