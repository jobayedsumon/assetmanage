@extends('layouts.app', ['activePage' => 'employee-management', 'titlePage' => __('Employee Management')])

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
                            <h4 class="card-title ">Employees</h4>
                            <p class="card-category"> Here you can manage employees</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('employee.create') }}" class="btn btn-sm btn-primary">Add employee</a>
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

                                    @forelse($employees as $employee)
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



