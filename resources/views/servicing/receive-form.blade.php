@extends('layouts.app', ['activePage' => 'servicing', 'titlePage' => __('Serviced Item Receive')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('servicing.receive', $servicing->id) }}" autocomplete="on" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Serviced Item Receive') }}</h4>
                                <p class="card-category">{{ __('Receive item  '.$servicing->item->name . ' after servicing') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                    <div class="row">
                                        <div class="col-sm-12">
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
                                        <label class="col-sm-2 col-form-label">{{ __('Servicing Cost') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('cost') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" min="0"
                                                       name="cost" id="input-cost" type="number" placeholder="{{ __('Servicing cost') }}" value="{{ old('cost') }}" required="true" aria-required="true"/>
                                                @if ($errors->has('cost'))
                                                    <span id="cost-error" class="error text-danger" for="input-cost">{{ $errors->first('cost') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Received Date') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('received_date') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('received_date') ? ' is-invalid' : '' }}" min="0"
                                                       name="received_date" id="input-received_date" type="date" placeholder="{{ __('Given Date') }}" value="" required="true" aria-required="true"/>
                                                @if ($errors->has('received_date'))
                                                    <span id="received_date-error" class="error text-danger" for="input-received_date">{{ $errors->first('received_date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Solutions Provided By Servicing Center') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('sloution') ? ' has-danger' : '' }}">
                                            <textarea name="sloution" id="" cols="30" rows="15"></textarea>
                                            @if ($errors->has('sloution'))
                                                <span id="sloution-error" class="error text-danger" for="input-sloution">{{ $errors->first('sloution') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>




                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Servicing Center Document') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }}">


                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-preview thumbnail card" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-default btn-file"><span class="fileupload-new">Select Image</span><span class="fileupload-exists">Change</span><input type="file" name="document"/></span>
                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                            </div>
                                        </div>

                                        @if ($errors->has('document'))
                                            <span id="document-error" class="error text-danger" for="input-document">{{ $errors->first('document') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-7">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Receive Item') }}</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@push('js')



@endpush
