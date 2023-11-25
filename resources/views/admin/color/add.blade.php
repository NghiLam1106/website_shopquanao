@extends('Admin.main')

@section('content')
    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary mb-0">

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màu</label>
                            <input type="text" class="form-control" name="namecolor" id="exampleInputEmail1">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
