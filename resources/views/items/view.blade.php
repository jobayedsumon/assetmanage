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
        </div>
    </div>

@endsection



