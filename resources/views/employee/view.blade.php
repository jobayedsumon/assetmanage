@extends('layouts.app', ['activePage' => 'employee', 'titlePage' => __('Employee Details')])

@section('content')



    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Employee</h4>
                            <p class="card-category font-weight-bold"> {{ $employee->name }}</p>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table">

                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            {{ $employee->id }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Employee Name
                                        </th>
                                        <th>
                                            {{ $employee->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Employee Department
                                        </th>
                                        <th>
                                            {{ $employee->department->name }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Phone Number
                                        </th>
                                        <th>
                                            {!! $employee->phone_number !!}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Employee Email
                                        </th>
                                        <th>
                                            {{ $employee->email }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            NID Number
                                        </th>
                                        <th>
                                            {{ $employee->nid }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Employee Address
                                        </th>
                                        <th>
                                            {{ $employee->address }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Joining Date
                                        </th>
                                        <th>
                                            {{ $employee->joining_date }}
                                        </th>
                                    </tr>


                                    <tr>
                                        <th>
                                            Record Created
                                        </th>
                                        <th>
                                            {{ $employee->created_at }}
                                        </th>
                                    </tr>

                                    <tr>
                                        <th>
                                            Last Updated
                                        </th>
                                        <th>
                                            {{ $employee->updated_at }}
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



