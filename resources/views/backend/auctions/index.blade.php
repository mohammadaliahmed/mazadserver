@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Auction List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Auction list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="col-xs-12">
            <div class="box box-warning">
                <div class="box-header">

                    <div class="box-tools" style="margin: 20px auto;">
                    <a href="{{ route('auction.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Rooms</th>
                                <th>Washrooms</th>
                                <th>Car Parking</th>
                                <th>Bid Start</th>
                                <th>Bid End</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($auctions as $auction)

                            <tr>
                                <td>{{$auction->id}}</td>
                                <td>{{$auction->name}}</td>
                                <td>{{$auction->category}}</td>
                                <td>{{$auction->rooms}}</td>
                                <td>{{$auction->washrooms}}</td>
                                <td>{{$auction->car_parking}}</td>
                                <td>{{$auction->bidding_start_date}}</td>
                                <td>{{$auction->bidding_end_date}}</td>
                                <td>{{$auction->status}}</td>
                                <td>
                              
                                    
                                    <form action="{{ route('auction.destroy', $auction->id) }}" method="post" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="delete">
                                        <div class="btn-group">
                                           <a href="{{ route('auction.edit', $auction->id) }}" data-skin="skin-blue" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-times"></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>

</div>




@endsection