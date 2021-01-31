@extends('layouts.app', ['activePage' => 'items', 'titlePage' => __('Item Management')])

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
                            <h4 class="card-title ">Items</h4>
                            <p class="card-category"> Here you can manage items</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('items.create') }}" class="btn btn-sm btn-primary">Add item</a>
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
                                            Cost
                                        </th>
                                        <th>
                                            Purchase Date
                                        </th>

                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>

                                    @forelse($items as $item)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            <img width="100px" src="{{ route('item-image', $item->image) }}" alt="">
                                        </td>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->category->name }}
                                        </td>
                                        <td>
                                            {{ $item->identification_no }}
                                        </td>
                                        <td>
                                            BDT {{ $item->cost }}
                                        </td>
                                        <td>
                                            {{ $item->purchase_date }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <a class="btn btn-round btn-success p-2" href="{{ route('items.show', $item->id) }}">View Details</a>
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('items.edit', $item->id) }}" data-original-title="" title="">
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



