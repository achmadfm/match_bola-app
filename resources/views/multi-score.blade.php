@extends('layout')
@section('content')
    <h1>Multiple Score</h1>
    <div class="row">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Klub 1</th>
                        <th>vs</th>
                        <th>Klub 2</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data AS $match)
                        <tr>
                            <td>{{ $match->club1->name }} ({{ $match->score_club_1 }})</td>
                            <td>vs</td>
                            <td>{{ $match->club2->name }} ({{ $match->score_club_2 }})</td>
                        <tr>
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
                <div id="template">
                    <div class="row border">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="club1">Klub 1</label>
                                <select class="form-control" id="club1" name="id_club_1[]" required>
                                    @foreach ($clubs as $club)
                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="score_club_1">Score Klub 1</label>
                                <input type="number" value="0" class="form-control" id="score_club_1[]"
                                    name="score_club_1[]" placeholder="Score Klub 1" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="club2">Klub 2</label>
                                <select class="form-control" id="club1" name="id_club_2[]" required>
                                    @foreach ($clubs as $club)
                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="score_club_2">Score Klub 2</label>
                                <input type="number" value="0" class="form-control" id="score_club_2"
                                    name="score_club_2[]" placeholder="Score Klub 1" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="add-match">

                </div>
                <a id="add" class="btn btn-success">Add</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        console.log('Club page');
        $('#add').click(function() {
            $('#add-match').append($('#template').html());
        });
    </script>
@endpush
