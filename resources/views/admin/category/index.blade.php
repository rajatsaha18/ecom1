@extends('admin.master')

@section('title')
    Add Category Page
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Add Category Form</h4>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                <form action="{{route('category.new')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Description</label>
                        <div class="col-sm-9">
                            <textarea type="description" name="description" class="form-control" id="horizontal-email-input"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 ">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="" class="col-sm-3 ">Publication</label>
                        <div class="col-sm-9">
                            <label class="mr-3"><input type="radio" name="status" value="1" checked />published</label>
                            <label><input type="radio" name="status" value="0" />unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">


                            <div>
                                <button type="submit" class="btn btn-primary w-md">Create New Category</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
