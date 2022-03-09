@extends('admin.layout.master_admin')

@section('tittle', 'Berita')

@section('content')
<div class="section-header ">
    <div class="col-md-12 bg-white p-4">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        @error('name_category')
        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror

        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#createBerita"> Create New Post</a>
                    </div>
                </div>
            </div>
        </div>


        <table class="table table-bordered" style="text-align: center;">
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Category</th>
                <th width=" 280px">Action</th>
            </tr>
            @php $no=1; @endphp
            @forelse ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td class="text-center"><img src="{{ Storage::url($item->image) }}" class="rounded" style="width: 150px"></td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td>
                <td>{{ $item->beritacategory['name']}}</td>
                <td>
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBerita{{ $item->id }}" href="#">Edit</a>
                    <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="{{ $item->id }}">Delete</button>
                    </form>

                </td>
            </tr>
            @empty
            <div class="alert alert-danger">
                Data Berita belum Tersedia.
            </div>
            @endforelse
        </table>
    </div>
</div>
@endsection

@section('modal')

<!-- Modal Create Berita -->
@foreach ($data as $item)
<div class="modal fade" id="createBerita" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header ">
                <h5 class="modal-title ">Create</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title :</strong>
                                <input class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Content :</strong>
                                <textarea class="form-control" style="height:150px" name="content" placeholder="Content" required>{{ old('content') }}</textarea>
                            </div>
                            <div class="form-group">
                                <strong>Image :</strong>
                                <input type="file" name="image" class="form-control" required>
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
                            </div><br>
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
<div class="modal fade" id="editBerita{{ $item->id }}" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content bg-light">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('berita.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Tittle :</strong>
                                <input type="text" name="title" value="{{ $item->title }}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <strong>Content :</strong>
                                <textarea class="form-control" style="height:150px" name="content" required>{{ $item->content }}</textarea>
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
                            </div><br>
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