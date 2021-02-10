@extends('layouts.app', ['activePage' => 'servicing', 'titlePage' => __('Item Servicing Details')])

@section('content')



    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Servicing Item</h4>
                            <p class="card-category font-weight-bold">Servicing Details of {{ $servicing->item->name }}</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">

                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ $servicing->id }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Name
                                        </th>
                                        <th>
                                            {{ $servicing->item->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Category
                                        </th>
                                        <th>
                                            {{ $servicing->item->category->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Image
                                        </th>
                                        <th>
                                            <img width="500px" class="img img-thumbnail" src="{{ route('item-image', $servicing->item->image) }}" alt="">
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Identification Number
                                        </th>
                                        <th>
                                            {{ $servicing->item->identification_no }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Problems
                                        </th>
                                        <th>
                                            {!! $servicing->problem !!}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Given Date to Servicing Center
                                        </th>
                                        <th>
                                            {{ $servicing->given_date }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Servicing Center Phone Number
                                        </th>
                                        <th>
                                            {{ $servicing->phone_number }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Servicing Center Location
                                        </th>
                                        <th>
                                            {!! $servicing->location !!}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Received Date from Servicing Center
                                        </th>
                                        <th>
                                            {{ $servicing->received_date }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Servicing Cost
                                        </th>
                                        <th>
                                            BDT {{ $servicing->cost }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Solutions Provided By The Servicing Center
                                        </th>
                                        <th>
                                            {!! $servicing->solution !!}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Servicing Document
                                        </th>
                                        <th>
                                            <img width="500px" class="img img-thumbnail" src="{{ route('servicing-document', $servicing->document) }}" alt="">
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



