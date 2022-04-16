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

@error('video')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

<div class="card">
    <div class="card-body">
        <div class="table table-responsive table-hover">
            <div class="row justify-content-start">
                <div class="col-2">
                    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#createVideo">
                        Create New Post
                    </button>
                </div>
            </div>
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Video</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @php $no=1; @endphp
                @foreach ($data as $item)
                <tbody>
                    <tr class="text-center">
                        <td class="align-middle">{{ $no++ }}</td>
                        <td class="align-middle">{{ $item->title }}</td>
                        <td class="text-center"><video src="{{ Storage::url($item->video) }}" class="rounded" style="width: 150px"></td>
                        <td class="align-middle">{{ $item->category['name']}} </td>
                        <td class="align-middle">
                            <a class="btn btn-link text-dark px-3 mb-0" data-toggle="modal" data-target="#editVideo{{ $item->id }}" href="#">
                                <i class="fas fa-pencil-alt"> Edit</i>
                            </a>
                            <form action="{{ route('video.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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

<!-- Modal Create Video -->
@foreach ($data as $item)
<div class="modal fade" id="createVideo" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title ">Create</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title :</strong>
                                <input class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Video :</strong>
                                <input type="file" name="video" class="form-control" required>

                                @error('video')
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
<div class="modal fade" id="editVideo{{ $item->id }}" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('video.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tittle :</strong>
                                <input type="text" name="title" value="{{ $item->title }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <strong>Video :</strong>
                                <input class="form-control" type="file" name="video" value="{{ $item->video }}" required>
                                @error('video')
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