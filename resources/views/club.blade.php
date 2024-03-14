@extends('layout')
@section('content')
    <h1>Club</h1>
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Klub</th>
                        <th>Kota</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data AS $club)
                        <tr>
                            <td>{{ $club->name }}</td>
                            <td>{{ $club->city }}</td>
                            <td>
                                <a row-id="{{ $club->id }}" class="btn btn-delete">Delete</a>
                                <form action="{{ url('club', ['id' => $club->id]) }}" id="form-delete-{{ $club->id }}"
                                    method="post">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $club->id }}">
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>
                    @endforelse
            </table>
        </div>
        <div class="col-md-12">
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Klub</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Klub">
                </div>
                <div class="form-group">
                    <label for="city">Kota</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Kota">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        console.log('Club page');
        $('.btn-delete').click(function() {
            var id = $(this).attr('row-id');
            if (confirm("hapus data?")) {
                $('#form-delete-' + id).submit();
            }
        })
    </script>
@endpush
