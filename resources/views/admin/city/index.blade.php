@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cities</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Cities</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Cities</h3>

                            <div class="card-tools">
                                <form action="/city" method="get">
                                    <div class="input-group input-group-sm" style="width: 400px;">

                                        <select class="form-control float-right" name="state_name">
                                            <option value="">Select State Name</option>
                                            @foreach ($statesCountries['state_names'] as $state)
                                                <option>{{ $state }}</option>
                                            @endforeach
                                        </select>
                                        <select class="form-control float-right" name="county_name">
                                            <option value="">Select County Name</option>
                                            @foreach ($statesCountries['county_name'] as $country)
                                                <option>{{ $country }}</option>
                                            @endforeach
                                        </select>

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>

                                            <a href="{{ route('city_list') }}">
                                              <button type="button" class="btn btn-default">
                                                  <i class="fas fa-redo fa-fw"></i>
                                              </button>
                                            </a>
                                           
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>City Name</th>
                                        <th>State Name</th>
                                        <th>Country Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($getAllCites as $key => $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->city }}</td>
                                            <td>{{ $item->state_name }}</td>
                                            <td>{{ $item->county_name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-block btn-outline-primary"
                                                    data-toggle="modal" data-target="#modal-lg-{{ $key }}">
                                                    <i class="fa fa-solid fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal-lg-{{ $key }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">ID: {{ $item->id }}</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <dl class="row">
                                                                        <dt class="col-sm-4">City:</dt>
                                                                        <dd class="col-sm-8">{{ $item->city }}</dd>
                                                                        <dt class="col-sm-4">City Ascii:</dt>
                                                                        <dd class="col-sm-8">{{ $item->city_ascii }}</dd>
                                                                        <dt class="col-sm-4">State ID:</dt>
                                                                        <dd class="col-sm-8">{{ $item->state_id }}</dd>
                                                                        <dt class="col-sm-4"> State Name:</dt>
                                                                        <dd class="col-sm-8">{{ $item->state_name }}</dd>
                                                                        <dt class="col-sm-4">County Fips:</dt>
                                                                        <dd class="col-sm-8">{{ $item->county_fips }}</dd>
                                                                        <dt class="col-sm-4">County Name:</dt>
                                                                        <dd class="col-sm-8">{{ $item->county_name }}</dd>
                                                                        <dt class="col-sm-4">Latitude:</dt>
                                                                        <dd class="col-sm-8">{{ $item->lat }}</dd>
                                                                        <dt class="col-sm-4">Longitude:</dt>
                                                                        <dd class="col-sm-8">{{ $item->lng }}</dd>


                                                                    </dl>

                                                                </div>
                                                                <div class="col-md-6">

                                                                    <dl class="row">

                                                                        <dt class="col-sm-4">Population:</dt>
                                                                        <dd class="col-sm-8">{{ $item->population }}</dd>
                                                                        <dt class="col-sm-4">Density:</dt>
                                                                        <dd class="col-sm-8">{{ $item->density }}</dd>
                                                                        <dt class="col-sm-4">Source:</dt>
                                                                        <dd class="col-sm-8">{{ $item->source }}</dd>
                                                                        <dt class="col-sm-4">City:</dt>
                                                                        <dd class="col-sm-8">{{ $item->city }}</dd>
                                                                        <dt class="col-sm-4">Military:</dt>
                                                                        <dd class="col-sm-8">
                                                                            {{ $item->military == 1 ? 'TRUE' : 'FALSE' }}
                                                                        </dd>
                                                                        <dt class="col-sm-4">Incorporated:</dt>
                                                                        <dd class="col-sm-8">
                                                                            {{ $item->incorporated == 1 ? 'TRUE' : 'FALSE' }}
                                                                        </dd>
                                                                        <dt class="col-sm-4">Timezone:</dt>
                                                                        <dd class="col-sm-8">{{ $item->timezone }}</dd>
                                                                        <dt class="col-sm-4">Ranking:</dt>
                                                                        <dd class="col-sm-8">{{ $item->ranking }}</dd>
                                                                        <dt class="col-sm-4">Zips:</dt>
                                                                        <dd class="col-sm-8">{{ $item->zips }}</dd>



                                                                    </dl>


                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>

                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.modal -->
                                    @endforeach




                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

        })
    </script>
@endsection
