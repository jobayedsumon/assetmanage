@extends('layouts.app', ['activePage' => 'servicing', 'titlePage' => __('Servicing History')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            @if (session('status'))
                <div class="row">
                    <div class="col-sm-6">
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>{{ session('status') }}</span>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Servicing Items</h4>
                            <p class="card-category"> Here you can manage items servicing</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('servicing.create') }}" class="btn btn-sm btn-primary">Send to Service</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            S/L
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Category
                                        </th>
                                        <th>
                                            Identification No
                                        </th>
                                        <th>
                                            Given Date
                                        </th>
                                        <th>
                                            Received Date
                                        </th>
                                        <th>
                                            Phone Number
                                        </th>
                                        <th>
                                            Cost
                                        </th>

                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>

                                    @forelse($servicings as $servicing)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            <img width="100px" src="{{ route('item-image', $servicing->item->image) }}" alt="">
                                        </td>
                                        <td>
                                            {{ $servicing->item->name }}
                                        </td>
                                        <td>
                                            {{ $servicing->item->category->name }}
                                        </td>
                                        <td>
                                            {{ $servicing->item->identification_no }}
                                        </td>
                                        <td>
                                            {{ $servicing->given_date }}
                                        </td>
                                        <td>
                                            {{ $servicing->received_date }}
                                        </td>
                                        <td>
                                            {{ $servicing->phone_number }}
                                        </td>
                                        <td>
                                            BDT {{ $servicing->cost }}
                                        </td>

                                        <td class="td-actions text-right">

                                                <a class="btn btn-round btn-success p-2" href="{{ route('servicing.show', $servicing->id) }}">View Details</a>
                                                <a class="btn btn-round btn-primary p-2" href="{{ route('servicing.receive', $servicing->id) }}">Receive Item</a>


                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('servicing.edit', $servicing->id) }}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection



