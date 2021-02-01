@extends('layouts.app', ['activePage' => 'item', 'titlePage' => __('Item Details')])

@section('content')



    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Item</h4>
                            <p class="card-category font-weight-bold"> {{ $item->name }}</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">

                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ $item->id }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Category
                                        </th>
                                        <th>
                                            {{ $item->category->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Name
                                        </th>
                                        <th>
                                            {{ $item->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Image
                                        </th>
                                        <th>
                                            <img width="500px" class="img img-thumbnail" src="{{ route('item-image', $item->image) }}" alt="">
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Description
                                        </th>
                                        <th>
                                            {!! $item->description !!}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Identification Number
                                        </th>
                                        <th>
                                            {{ $item->identification_no }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Cost
                                        </th>
                                        <th>
                                            BDT {{ $item->cost }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Purchase Date
                                        </th>
                                        <th>
                                            {{ $item->purchase_date }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Purchase Document
                                        </th>
                                        <th>
                                            <img width="500px" class="img img-thumbnail" src="{{ route('purchase-document', $item->document) }}" alt="">
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Created
                                        </th>
                                        <th>
                                            {{ $item->created_at }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Last Updated
                                        </th>
                                        <th>
                                            {{ $item->updated_at }}
                                        </th>
                                    </tr>


                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Asset Owner</h4>
                            <p class="card-category font-weight-bold"> {{ $item->name }} belongs to</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            S/L
                                        </th>

                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Department
                                        </th>
                                        <th>
                                            Phone Number
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            NID No
                                        </th>

                                        <th>
                                            Address
                                        </th>

                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>

                                    @forelse($item->employees as $employee)
                                        <tr>
                                            <td>
                                                {{ $loop->index + 1 }}
                                            </td>

                                            <td>
                                                {{ $employee->name }}
                                            </td>
                                            <td>
                                                {{ $employee->department->name }}
                                            </td>
                                            <td>
                                                {{ $employee->phone_number }}
                                            </td>
                                            <td>
                                                {{ $employee->email }}
                                            </td>
                                            <td>
                                                {{ $employee->nid }}
                                            </td>
                                            <td>
                                                {{ $employee->address }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <a class="btn btn-round btn-success p-2" href="{{ route('employee.show', $employee->id) }}">View Details</a>
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('employee.edit', $employee->id) }}" data-original-title="" title="">
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



