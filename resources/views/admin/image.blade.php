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

<div class="card">
    <div class="card-body">
        <div class="">
            <form class="row" method="GET">
                <div class="col-md-5">
                    <button type="button" class="btn btn-primary mb-3" href="#" data-toggle="modal" data-target="#createImage">
                        Create New Post
                    </button>
                </div>
                <div class="col-md-2">
                    <select name="category" class="form-control">
                        <option value="" selected>All</option>
                        @foreach ($name_category as $item)
                        <option value="{{ $item->name }}" {{ request('category') === $item->name ? 'selected' : null }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <div class="input-group">
                        <input class="form-control border-end-0 border" type="search" name="keyword" value="{{ request('keyword') }}" placeholder="Search Name">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary bg-white border" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </form>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php $no=1; @endphp
                @forelse ($data as $item)
                <tbody>
                    <tr class="text-center">
                        <td class="align-middle">{{ $no++ }}</td>
                        <td class="align-middle">{{ $item->title }}</td>
                        <td class="text-center"><img src="{{ Storage::url($item->image) }}" class="rounded" style="width: 150px"></td>
                        <td class="align-middle">{{ $item->category['name']}} </td>
                        <td class="align-middle">
                            <a class="btn btn-link text-dark px-3 mb-0" data-toggle="modal" data-target="#editImage{{ $item->id }}" href="#">
                                <i class="fas fa-pencil-alt"> Edit</i>
                            </a>
                            <form action="{{ route('image.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link text-danger text-gradient px-3 mb-0" data-bs-toggle="modal" data-bs-target="{{ $item->id }}">
                                    <i class="far fa-trash-alt">Delete</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                @empty
                <tr>
                    <td colspan="100%" class="text-center">
                        Data not found
                    </td>
                </tr>
                @endforelse
            </table>

            @if ($data->hasPages())
            <div class="row">
                <div class="col mt-4">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('modal')

<!-- Modal Create Image -->
@foreach ($data as $item)
<div class="modal fade" id="createImage" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title ">Create Image</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title :</strong>
                                <input class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Image :</strong>
                                <input type="file" id="image-create" name="image" class="form-control" onchange="previewImageCreate()" required>
                                <img class="img-preview-create img-fluid mb-3 mt-3 col-sm-3">

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

<!-- Modal Edit Image-->
@foreach ($data as $item)
<div class="modal fade" id="editImage{{ $item->id }}" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('image.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tittle :</strong>
                                <input type="text" name="title" value="{{ $item->title }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <strong>Image :</strong>
                                <input type="file" id="image-update" name="image" class="form-control" onchange="previewImageUpdate()" required>
                                @if($item->image)
                                <img src="{{Storage::disk('local')->url($item->image)}}" class="img-preview-update img-fluid mb-3 mt-3 col-sm-3 d-block">
                                @else
                                <img class="img-preview-update img-fluid mb-3 mt-3 col-sm-3">
                                @endif
                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Category:</strong>
                                <select name="name_category" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach ($name_category as $item_edit)
                                    <option value="{{ $item_edit->id }}" {{$item_edit->id == $item->category['id']? 'selected' : null}}>{{ $item_edit->name}}</option>
                                    @endforeach
                                </select>
                                @error('name_category')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
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