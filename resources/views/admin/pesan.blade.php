@extends('admin/layout/master_admin')

@section('content')
<div class="card">
    <div class="card-body shadow">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Perihal</th>
                        <th>Pesan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @php $no=1; @endphp
                    @foreach($data_pesan as $item)
                    <tr class="team-item">
                        <th class="align-middle">{{$no++}}</th>
                        <td class="align-middle">{{Str::limit($item->name,10)}}</td>
                        <td class="align-middle">{{Str::limit($item->email,5)}}</td>
                        <td class="align-middle">{{Str::limit($item->perihal,10)}}</td>
                        <td class="align-middle">{{Str::limit($item->pesan,80)}}</td>
                        <td class="align-middle">
                            <div class="row">
                                <div class="d-flex flex-row">
                                    <div class="col">
                                        <div class="card team-item" style="width: 3rem;">
                                            <button class="btn btn-link text-primary " data-toggle="modal" data-target="#lihatPesan{{ $item->id }}" href="#">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <form action="{{ route('pesan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
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
                    @endforeach
                </tbody>
            </table>

            <!-- pagination -->
            <div class="mt-4">
                @if ($data_pesan->hasPages())
                <ul class="pagination" role="navigation">
                    {{-- Previous Page Link --}}
                    @if ($data_pesan->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $data_pesan->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                    </li>
                    @endif

                    <?php
                    $start = $data_pesan->currentPage() - 2; // show 3 pagination links before current
                    $end = $data_pesan->currentPage() + 2; // show 3 pagination links after current
                    if ($start < 1) {
                        $start = 1; // reset start to 1
                        $end += 1;
                    }
                    if ($end >= $data_pesan->lastPage()) $end = $data_pesan->lastPage(); // reset end to last page
                    ?>

                    @if($start > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $data_pesan->url(1) }}">{{1}}</a>
                    </li>
                    @if($data_pesan->currentPage() != 4)
                    {{-- "Three Dots" Separator --}}
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                    @endif
                    @endif
                    @for ($i = $start; $i <= $end; $i++) <li class="page-item {{ ($data_pesan->currentPage() == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{ $data_pesan->url($i) }}">{{$i}}</a>
                        </li>
                        @endfor
                        @if($end < $data_pesan->lastPage())
                            @if($data_pesan->currentPage() + 3 != $data_pesan->lastPage())
                            {{-- "Three Dots" Separator --}}
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                            @endif
                            <li class="page-item">
                                <a class="page-link" href="{{ $data_pesan->url($data_pesan->lastPage()) }}">{{$data_pesan->lastPage()}}</a>
                            </li>
                            @endif

                            {{-- Next Page Link --}}
                            @if ($data_pesan->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $data_pesan->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
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
<!-- Modal Lihat Pesan -->
@foreach ($data_pesan as $item)
<div class="modal fade" id="lihatPesan{{ $item->id }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <h8 class="modal-title">Pesan</h8>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama : </strong><br>
                            <h8>{{ $item->name }}</h8>
                        </div>
                        <div class="form-group">
                            <strong>Email : </strong><br>
                            <h8>{{ $item->email }}</h8>
                        </div>
                        <div class="form-group">
                            <strong>Perihal : </strong><br>
                            <h8>{{ $item->perihal }}</h8>
                        </div>
                        <div class="form-group">
                            <strong>Isi Pesan : </strong><br>
                            <h8>{{ $item->pesan }}</h8>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection