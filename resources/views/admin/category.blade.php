@extends('admin.layout.master_admin')

@section('tittle', 'Category')

@section('content')
<div class="section-header ">
    <div class="col-md-12 bg-white p-4">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif


        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <div class="row justify-content-between">
                    <div class="col-4">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#createCategory"> Create New Category</a>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered " style="text-align: center;">
            <tr>
                <th width=" 100px">No</th>
                <th>Name</th>
                <th width=" 280px">Action</th>
            </tr>
            @php $no=1; @endphp
            @forelse ($data as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editCategory{{ $item->id }}" href="#">Edit</a>
                    <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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