@extends('layouts.admin')

@section('content')
@if(session('message'))
<div class="alert alert-danger">
    {{session('message')}}
</div>
@endif
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-white">
            <h4>Edit Brand</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{url('admin/brands/'. $brand->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>

                        <input type="text" name="name" value="{{$brand->name}}" class="form-control">
                        @error('name') <small>
                            <div class="text-danger">{{$message}}</div>
                        </small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jml Bagasi</label>
                        <input type="text" name="luggage" value="{{$brand->luggage}}" class="form-control">
                        @error('luggage') <small>
                            <div class="text-danger">{{$message}}</div>
                        </small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jml Penumpang</label>
                        <input type="text" name="passenger" value="{{$brand->passenger}}" class="form-control">
                        @error('passenger') <small>
                            <div class="text-danger">{{$message}}</div>
                        </small> @enderror
                    </div>

                    <div class="mb-3">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <label class="form-check-label">Status</label>
                                <input class="form-check-input" type="checkbox" name="status" {{$brand->status == '1'
                                ? 'checked':''}}>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection