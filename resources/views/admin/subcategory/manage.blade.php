@extends('admin.master')

@section('title')
    Manage Sub Category Page
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Sub-Category Info</h4>
                    <p class="card-title-desc">DataTables has most features enabled by
                        default, so all you need to do to use it with your own tables is to call
                        the construction function: <code>$().DataTable();</code>.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Category_id</th>
                            <th>SubCategory Name</th>
                            <th>Category Description</th>
                            <th>Category Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($subCategories as $subcategory)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$subcategory->category->name}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td>{{$subcategory->description}}</td>
                            <td><img src="{{asset($subcategory->image)}}" alt="" height="60" width="90"></td>
                            <td>{{$subcategory->status == 1 ? 'published' : 'unpublished'}}</td>
                            <td>
                                <a href="{{route('subcategory.edit', ['id' => $subcategory->id])}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('subcategory.delete', ['id' => $subcategory->id])}}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection
