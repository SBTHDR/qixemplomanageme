@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('States List') }}
                    <a href="{{ route('states.create') }}" class="btn btn-primary">Create State</a>
                </div>

                <div class="card-body">

                    <form action="{{ route('states.index') }}" method="GET">
                        @csrf
                        <div class="form-row align-items-center">
                          <div class="col-auto">
                            <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search by name...">
                          </div>
                          
                          <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-2">Search</button>
                          </div>
                        </div>
                    </form>

                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">State name</th>
                            <th scope="col">Country Code</th>                      
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($states as $state)
                            <tr>
                                <th>{{ $state->id }}</th>
                                <td>{{ $state->name }}</td>
                                <td>{{ $state->country->country_code }}</td>
                                <td class="d-flex align-items-center">
                                    <div>
                                        <a href="{{ route('states.edit', $state->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                    <div class="ml-3">
                                        <form action="{{ route('states.destroy', $state->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
