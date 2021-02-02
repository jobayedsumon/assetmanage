@extends('layouts.app', ['activePage' => 'asset-transfer.transfer_history', 'titlePage' => $assignment->item->name . __(' Transfer History')])

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
                            <h4 class="card-title ">{{ $assignment->item->name }} ({{ $assignment->item->identification_no }}) Transfer History</h4>
                            <p class="card-category">See how and when {{ $assignment->item->name }} has been transferred so far.</p>
                        </div>

                    </div>


                    <div class="card card-timeline card-plain mt-0">
                        <div class="card-body">
                            <ul class="timeline">

                                @forelse($assignment->item->transfers as $transfer)
                                    @if(!$transfer->from_employee)
                                        <li>
                                            <div class="timeline-badge success">
                                                <i class="">1</i>
                                            </div>
                                            <div class="timeline-panel">
                                                <div class="timeline-heading">
                                            <span class="badge badge-pill badge-success">
                                                Assigned to {{ $transfer->to_employee->name }}</span>
                                                    <span class="badge badge-pill badge-success">
                                                To {{ $transfer->to_employee->department->name }}</span>
                                                </div>

                                                <div class="timeline-body mt-2">
                                                    <p class="font-weight-bold">With Remarks: </p>
                                                    <div>
                                                        {!! $transfer->remarks !!}
                                                    </div>
                                                </div>

                                                <h6>
                                                    <i class="ti-time"></i> <span class="font-weight-bold">Assigned at </span>
                                                    {{ $transfer->transferred_date }}
                                                </h6>
                                            </div>
                                        </li>
                                    @else
                                <li class="{{ $loop->even ? 'timeline-inverted' : '' }}">
                                    <div class="timeline-badge {{ $loop->even ? 'info' : 'success' }}">
                                        <i class="">{{ $loop->index + 1 }}</i>
                                    </div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <span class="badge badge-pill badge-{{ $loop->even ? 'primary' : 'success' }}">
                                                Transferred from {{ $transfer->from_employee->name }} to {{ $transfer->to_employee->name }}</span>
                                            <span class="badge badge-pill badge-{{ $loop->even ? 'primary' : 'success' }}">
                                                From {{ $transfer->from_employee->department->name }} to {{ $transfer->to_employee->department->name }}</span>
                                        </div>
                                        <div class="timeline-body">
                                            <span class="font-weight-bold">With Remarks: </span>
                                            <div>
                                            {!! $transfer->remarks !!}
                                            </div>
                                        </div>
                                        <h6>
                                            <i class="ti-time"></i> <span class="font-weight-bold">Transferred at</span> {{ $transfer->transferred_date }}
                                        </h6>
                                    </div>
                                </li>
                                    @endif
                                @empty

                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection



