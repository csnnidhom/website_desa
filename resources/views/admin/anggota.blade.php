@extends('admin.layout.master_admin')

@section('content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card shadow">
    <div class="card-header">
        <form method="GET">
            <div class="row pt-3">
                <div class="col">
                    <button type="button" class="btn btn-primary mb-3 team-item" data-toggle="modal" data-target="#createAnggota">
                        Create New Post
                    </button>
                </div>
                <div class="col-2">
                    <select name="category" class="form-control team-item" onchange="this.form.submit();">
                        <option value="" selected>All</option>
                        @foreach ($name_category as $item)
                        <option value="{{ $item->name }}" {{ request('category') === $item->name ? 'selected' : null }}>
                            {{ $item->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-3">
                    <div class="input-group team-item">
                        <input class="form-control border-end-0 border" type="search" name="keyword" value="{{ request('keyword') }}" placeholder="Search Name">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary bg-white border" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($data as $item)
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-left-primary team-item h-100 py-1">
                    <div class="card-header">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="font-weight-bold text-primary text-uppercase mb-1">
                                    {{$item->name}}
                                </div>
                                <div class="h6 text-gray-800">
                                    <figcaption style="font-size: small;font-style: italic;">{{$item->jabatan}}</figcaption>
                                </div>
                            </div>
                            <div class="col-auto">
                                <img class="img-fluid rounded" src="{{ Storage::url($item->image) }}" style="width: 60px; height: 60px;">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                {{Str::limit($item->bio,60)}}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <div class="card team-item" style="width: 3rem;">
                                    <button class="btn btn-link text-primary " data-toggle="modal" data-target="#editAnggota{{$item->id}}" href="#">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <div class="col">
                                    <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                        @method('DELETE')
                                        @csrf
                                        <div class="card team-item" style="width: 3rem;">
                                            <button class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="{{ $item->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="100%" class="text-center">
                    Data not found
                </td>
            </tr>
            @endforelse
        </div>

        <!-- Pagination -->
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

@endsection

@section('modal')

<!-- Modal Create Anggota -->
@foreach ($data as $item)
<div class="modal fade" id="createAnggota" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama :</strong>
                                <input class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Jabatan :</strong>
                                <input class="form-control" name="jabatan" value="{{ old('jabatan') }}" placeholder="Masukkan Jabatan" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Bio :</strong>
                                <textarea class="form-control" style="height:100px" name="bio" placeholder="Masukkan Bio" required>{{ old('caption') }}</textarea>
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
                                <strong>Categori:</strong>
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

<!-- Modal Edit Anggota -->
@foreach ($data as $item)
<div class="modal fade" id="editAnggota{{$item->id}}" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('anggota.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nama :</strong>
                                <input class="form-control" name="name" value="{{ $item->name }}" placeholder="Masukkan Nama" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Jabatan :</strong>
                                <input class="form-control" name="jabatan" value="{{ $item->jabatan }}" placeholder="Masukkan Jabatan" required></input>
                            </div>
                            <div class="form-group">
                                <strong>Bio :</strong>
                                <textarea class="form-control" style="height:100px" name="bio" placeholder="Masukkan Bio" required>{{ $item->bio }}</textarea>
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
                                <strong>Categori:</strong>
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