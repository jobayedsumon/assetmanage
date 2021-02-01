@extends('layouts.app', ['activePage' => 'asset-assignment', 'titlePage' => __('Asset Assignment Details')])

@section('content')



    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Asset Assignment</h4>
                            <p class="card-category font-weight-bold"> {{ $assignment->item->name }} to {{ $assignment->employee->name }}</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">

                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ $assignment->id }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Name
                                        </th>
                                        <th>
                                            {{ $assignment->item->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Category
                                        </th>
                                        <th>
                                            {{ $assignment->item->category->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Item Image
                                        </th>
                                        <th>
                                            <img width="500px" class="img img-thumbnail" src="{{ route('item-image', $assignment->item->image) }}" alt="">
                                        </th>
                                    </tr>


                                    <tr>
                                        <th>
                                            Assigned To
                                        </th>
                                        <th>
                                            {{ $assignment->employee->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Assigned Department
                                        </th>
                                        <th>
                                            {{ $assignment->department->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                           Asset Condition
                                        </th>
                                        <th>
                                            {{ $assignment->condition }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Assigned Date
                                        </th>
                                        <th>
                                            {{ $assignment->assigned_date }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Asset Status
                                        </th>
                                        <th>
                                            {{ $assignment->status }}
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>
                                            Knox Status
                                        </th>
                                        <th>
                                            {{ $assignment->knox ? 'Enabled' : 'Disabled' }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Remarks
                                        </th>
                                        <th>
                                            {!! $assignment->remarks !!}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Record Created
                                        </th>
                                        <th>
                                            {{ $assignment->created_at }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Last Updated
                                        </th>
                                        <th>
                                            {{ $assignment->updated_at }}
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



