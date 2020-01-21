@extends('package::layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Package List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('package.create') }}"> Create New Package</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Description</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($packages as $package)
    <tr>
        <td>{{ $package->name }}</td>
        <td>{{ $package->description }}</td>
        <td>
            <form action="{{ route('package.destroy',$package->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('package.show',$package->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('package.edit',$package->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $packages->links() !!}

@endsection