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

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right mb-2">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#createBerita"> Create New
                            Post</a>
                    </div>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th width=" 280px">Action</th>
                </tr>
                @php $no=1; @endphp
                @forelse ($data as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td class="text-center"><img src="{{ Storage::url('public/berita/') . $item->image }}"
                                class="rounded" style="width: 150px"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->content }}</td>
                        <td>
                            <a class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editBerita{{ $item->id }}" href="#">Edit</a>
                            <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin Hapus Data?')">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="{{ $item->id }}">Delete</button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <div class="alert alert-danger">
                        Data Berita belum Tersedia.
                    </div>
                @endforelse
            </table>
            {{ $data->links() }}
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
                                        <textarea class="form-control" style="height:150px" name="title"
                                            placeholder="Subheading" required></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Content :</strong>
                                        <textarea class="form-control" style="height:150px" name="content"
                                            placeholder="Subheading" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image :</strong>
                                    <input type="file" name="image" class="form-control" placeholder="Heading" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
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
    <div class="modal fade" id="editBerita{{ $item->id }}" role="dialog" tabindex="-1" aria-hidden="true"
        data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content bg-light">
                <div class="modal-header">
                    <h5 class="modal-title">Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('berita.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Tittle :</strong>
                                    <input type="text" name="title" value="{{ $item->title }}" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Content :</strong>
                                    <textarea class="form-control" style="height:150px" name="content"
                                        required>{{ $item->content }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image :</strong>
                                    <input class="form-control" type="file" name="image" value="{{ $item->image }}"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach
