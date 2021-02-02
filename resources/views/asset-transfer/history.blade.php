@extends('layouts.app', ['activePage' => 'asset-transfer.history', 'titlePage' => __('Asset Transfer History')])

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
                            <h4 class="card-title ">Asset Transfer History</h4>
                            <p class="card-category">See how and when the assets have been transferred so far.</p>
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
                                            Item
                                        </th>
                                        <th>
                                            Image
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
                                        <th>
                                            Total Transfers
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
                                            {{ $assignment->condition }}
                                        </td>
                                        <td>
                                            {{ $assignment->status }}
                                        </td>
                                        <td>
                                            {{ $assignment->knox ? 'Enabled' : 'Disabled' }}
                                        </td>
                                        <td>
                                            {{ $assignment->item->transfers->count() }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <a class="btn btn-round btn-success p-2" href="{{ route('asset-transfer.transfer-history', $assignment->id) }}">See History

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



