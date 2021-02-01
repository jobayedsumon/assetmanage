@extends('layouts.app', ['activePage' => 'asset-assignment', 'titlePage' => __('Asset Assignment Management')])

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
                            <h4 class="card-title ">Asset Assignment</h4>
                            <p class="card-category"> Here you can manage previously assigned assets</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('asset-assignment.create') }}" class="btn btn-sm btn-primary">New Assignment</a>
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
                                            Item
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                        <th>
                                            Assigned To
                                        </th>
                                        <th>
                                            Assigned Dept.
                                        </th>
                                        <th>
                                            Condition
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Knox
                                        </th>

                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>

                                    @forelse($assignments as $assignment)
                                    <tr>
                                        <td>
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            {{ $assignment->item->name }}
                                        </td>
                                        <td>
                                            <img width="100px" src="{{ route('item-image', $assignment->item->image) }}" alt="">
                                        </td>

                                        <td>
                                            {{ $assignment->employee->name }}
                                        </td>
                                        <td>
                                            {{ $assignment->department->name }}
                                        </td>
                                        <td>
                                            {{ $assignment->condition }}
                                        </td>
                                        <td>
                                            {{ $assignment->status }}
                                        </td>
                                        <td>
                                            {{ $assignment->knox ? 'Enabled' : 'Disabled' }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <a class="btn btn-round btn-success p-2" href="{{ route('asset-assignment.show', $assignment->id) }}">View Details</a>
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('asset-assignment.edit', $assignment->id) }}" data-original-title="" title="">
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



