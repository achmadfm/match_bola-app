@extends('layout')
@section('content')
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Club</th>
                    <th>Ma</th>
                    <th>Me</th>
                    <th>S</th>
                    <th>K</th>
                    <th>GM</th>
                    <th>GK</th>
                    <th>Point</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($data AS $club)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$club->club->name}}</td>
                        <td>{{$club->m}}</td>
                        <td>{{$club->w}}</td>
                        <td>{{$club->d}}</td>
                        <td>{{$club->l}}</td>
                        <td>{{$club->win_goal}}</td>
                        <td>{{$club->lose_goal}}</td>
                        <td>{{$club->point}}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Tidak ada data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
    </script>
@endpush
