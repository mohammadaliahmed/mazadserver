@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Auctions List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Auctions list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-xs-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Create New Auction Listing</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form role="form" action="{{ route('auction.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf    
                            <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" required name="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Auction Category </label>
                                            <select class="form-control" name="category" required>
                                                <option value="" disabled selected>Select Category</option>
                                                <option value="House">House</option>
                                                <option value="Villa">Villa</option>
                                                <option value="Shop">Shop</option>
                                                <option value="restaurant">Restaurant</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" name="description" required rows="3" placeholder="Enter ..."></textarea>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Number of Rooms</label>
                                            <input type="number" class="form-control" required name="rooms" placeholder="Type Here">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Number of Washroom</label>
                                            <input type="number" class="form-control" required name="washrooms" placeholder="Type Here">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Number of car parking</label>
                                            <input type="number" class="form-control" required name="car_parking" placeholder="Type Here">
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Video URL</label>
                                            <input type="text" class="form-control" required name="video_url" placeholder="Type Here">
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Bidding Start Date</label>
                                            <input type="date" class="form-control" required name="bidding_start_date" placeholder="Type Here">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Bidding End Date</label>
                                            <input type="date" class="form-control" required name="bidding_end_date" placeholder="Type Here">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="status" required>
                                                <option value="" disabled selected>Select Status</option>
                                                <option value="active">active</option>
                                                <option value="inactive">inactive</option>
                                                <option value="ended">ended</option>
                                                <option value="deleted">deleted</option>
                                            </select>
                                        </div>
                                    </div>
                               
                                </div>
                                
                                <div class="row">
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control" name="country_id" id="country_id" required>
                                                <option value="" disabled selected>Select Country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>State</label>
                                            <select class="form-control" name="state_id" id="state_id" required>
                                                <option value="" disabled selected>Select State</option>
                                                <option value="2" d>Select State</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>City</label>
                                            <select class="form-control" name="city_id" id="city_id" required>
                                                <option value="3" >Select City</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Pictures</label>
                                            <input type="file" multiple name="images[]" class="form-control">
                                        </div>
                                    </div>
                               
                                </div>

                                <div class="text-center">
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- /.card-body -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</div>




@endsection

@section('js')
<script>
    $('#country_id').change(function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('getStates') }}",
            type: "POST",
            data: {
                "country_id" : $(this).val(),
                '_token' : "{{ csrf_token() }}"
            },
            success: function(data){
                $('#state_id').html(data.html);
            }
        });
    });

    $(document).on('change', '#state_id', function(e){
        e.preventDefault();
        $.ajax({
            url: "{{ route('getCities') }}",
            type: "POST",
            data: {
                "state_id" : $(this).val(),
                '_token' : "{{ csrf_token() }}"
            },
            success: function(data){
                $('#city_id').html(data.html);
            }
        });
    });
</script>
@endsection