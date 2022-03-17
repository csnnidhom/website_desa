@extends('admin.layout.master_admin')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@error('name_category')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

@error('image')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

<div class="col-lg-12 margin-tb">
    <div class="pull-right mb-2">
        <div class="row justify-content-between">
            <div class="col-4">
                <a class="btn bg-gradient-success btn-block mb-3" href="#" data-bs-toggle="modal" data-bs-target="#createImage"> Create New Post</a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="table">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Title</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Category</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            @php $no=1; @endphp
            @foreach ($data as $item)
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
                            <span class="text-dark text-xs">{{ $item->title }}</span>
                        </span>
                    </td>
                    <td class="text-center"><img src="{{ Storage::url($item->image) }}" class="rounded" style="width: 150px"></td>
                    <td>
                        <span class="badge badge-dot me-4 ">
                            <i class="bg-info "></i>
                            <span class="text-dark text-xs">{{ $item->category['name']}}</span>
                        </span>
                    </td>
                    <td>
                        <a class="btn bg-gradient-info btn-block" data-bs-toggle="modal" data-bs-target="#editImage{{ $item->id }}" href="#">Edit</a>
                        <form action="{{ route('image.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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

<!-- Modal Create Image -->
@foreach ($data as $item)
<div class="modal fade" id="createImage" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header ">
                <h5 class="modal-title ">Create</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title :</strong>
                                <input class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Image :</strong>
                                <input type="file" name="image" class="form-control" required>

                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Category:</strong>
                                <select name="name_category" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach ($name_category as $item)
                                    <option value="{{ $item->id }}" {{ old('name_category') == $item->id ? 'selected' : null }}>{{ $item->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('name_category')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
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

<!-- Modal Edit Image-->
@foreach ($data as $item)
<div class="modal fade" id="editImage{{ $item->id }}" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('image.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tittle :</strong>
                                <input type="text" name="title" value="{{ $item->title }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <strong>Image :</strong>
                                <input class="form-control" type="file" name="image" value="{{ $item->image }}" required>
                            </div>
                            <div class="form-group">
                                <strong>Category:</strong>
                                <select name="name_category" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach ($name_category as $item)
                                    <option value="{{ $item->id }}" {{old ('name_category') == $item->id ? 'selected' : null}}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('name_category')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
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