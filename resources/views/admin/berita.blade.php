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

<div class="card shadow ">
    <div class="card-header">
        <form method="GET">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col ">
                        <button type="button" class="btn btn-primary team-item" href="#" data-toggle="modal" data-target="#createBerita">
                            + Tambah Berita
                        </button>
                    </div>
                    <div class="col-3">
                        <select name="category" class="form-control team-item" onchange="this.form.submit();">
                            <option value="" selected>All</option>
                            @foreach ($name_category as $item)
                            <option value="{{ $item->name }}" {{ request('category') === $item->name ? 'selected' : null }}>
                                {{ $item->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- <div class="col-md-5">
                    <div class="input-group">
                        <input class="form-control border-end-0 border" type="search" name="keyword" value="{{ request('keyword') }}" placeholder="Search Name">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary bg-white border" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div> -->
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive ">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th class="align-middle">No</th>
                        <th class="align-middle">Ubah Status</th>
                        <th class="align-middle">Image</th>
                        <th class="align-middle">Caption</th>
                        <th class="align-middle">Title</th>
                        <th class="align-middle">Content</th>
                        <th class="align-middle">Category</th>
                        <th class="align-middle">Status</th>
                        <th class="align-middle">Action</th>
                    </tr>
                </thead>
                @php $no=1; @endphp
                @forelse ($data as $item)
                <tbody class="text-center team-item">
                    <tr>
                        <td class="align-middle">{{ $no++ }}</td>
                        <td class="align-middle">
                            @if ($item->status == 1)
                            <a href="{{ url('/admin/berita/status/'.$item->id) }}" class="btn badge btn-danger team-item">Non-Aktifkan</a>
                            @else
                            <a href="{{ url('/admin/berita/status/'.$item->id) }}" class="btn badge btn-success team-item">Aktifkan</a>
                            @endif
                        </td>
                        <td class="align-middle"><img src="{{ Storage::url($item->image) }}" class="rounded" style="width: 50px"></td>
                        <td class="align-middle">{{Str::limit($item->caption,20)}}</td>
                        <td class="align-middle"> {{ Str::limit($item->title,20) }}</td>
                        <td class="align-middle">{!! Str::limit($item->content,20) !!}</td>
                        <td class="align-middle">{{ $item->category['name']}}</td>
                        <td class="align-middle">

                            <span class="badge {{ ($item->status == 1 ? 'btn-success' : 'btn-danger') }}">
                                {{ ($item->status == 1 ) ? 'Aktif' : 'Tidak Aktif'}}

                        </td>
                        <td class="align-middle">
                            <div class="row">
                                <div class="d-flex flex-row">
                                    <div class="col">
                                        <div class="card team-item" style="width: 3rem;">
                                            <button class="btn btn-link text-primary " data-toggle="modal" data-target="#editBerita{{ $item->id }}" href="#">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('berita.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                            @method('DELETE')
                                            @csrf
                                            <div class="card team-item" style="width: 3rem;">
                                                <button class="btn btn-link text-danger " data-bs-toggle="modal" data-bs-target="{{ $item->id }}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
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

            <!-- pagination -->
            <div class="mt-4">
                @if ($data->hasPages())
                <ul class="pagination" role="navigation">
                    {{-- Previous Page Link --}}
                    @if ($data->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                    @endif

                    <?php
                    $start = $data->currentPage() - 2; // show 3 pagination links before current
                    $end = $data->currentPage() + 2; // show 3 pagination links after current
                    if ($start < 1) {
                        $start = 1; // reset start to 1
                        $end += 1;
                    }
                    if ($end >= $data->lastPage()) $end = $data->lastPage(); // reset end to last page
                    ?>

                    @if($start > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $data->url(1) }}">{{1}}</a>
                    </li>
                    @if($data->currentPage() != 4)
                    {{-- "Three Dots" Separator --}}
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                    @endif
                    @for ($i = $start; $i <= $end; $i++) <li class="page-item {{ ($data->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $data->url($i) }}">{{$i}}</a>
                        </li>
                        @endfor
                        @if($end < $data->lastPage())
                            @if($data->currentPage() + 3 != $data->lastPage())
                            {{-- "Three Dots" Separator --}}
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                            @endif
                            <li class="page-item">
                                <a class="page-link" href="{{ $data->url($data->lastPage()) }}">{{$data->lastPage()}}</a>
                            </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($data->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $data->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                            </li>
                            @else
                            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                <span class="page-link" aria-hidden="true">&rsaquo;</span>
                            </li>
                            @endif
                </ul>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')

<!-- Modal Create Berita -->
@foreach ($data as $item)
<div class="modal fade" id="createBerita" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title :</strong>
                                <input class="form-control" name="title" value="{{ old('title') }}" placeholder="Title" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Content :</strong>
                                <textarea class="my-editor form-control" style="height:150px" name="content" placeholder="Content" required>{{ old('content') }}</textarea>
                            </div>
                            <div>
                                <strong>Image :</strong>
                                <input type="file" id="image-create" name="image" class="form-control" onchange="previewImageCreate()" required>
                                <img class="img-preview-create img-fluid mb-3 mt-3 col-sm-3">
                                @error('image')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <strong>Caption :</strong>
                                <textarea class="form-control" style="height:100px" name="caption" placeholder="Caption" required>{{ old('caption') }}</textarea>
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

<!-- Modal Edit Berita-->
@foreach ($data as $item)
<div class="modal fade" id="editBerita{{ $item->id }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
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
                                <textarea class="my-editor form-control" style="height:150px" name="content" required>{{ $item->content }}</textarea>
                            </div>
                            <div>
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
                                <strong>Caption :</strong>
                                <textarea class="form-control" style="height:100px" name="caption" placeholder="Caption" required>{{ $item->caption }}</textarea>
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


@endsection