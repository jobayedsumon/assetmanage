@extends('layouts.app', ['activePage' => 'items', 'titlePage' => __('Edit Item')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('items.update', $item->id) }}" autocomplete="on" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Edit Item ('.$item->name .')') }}</h4>
                                <p class="card-category">{{ __('Item information') }}</p>
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
                                        <label class="col-sm-2 col-form-label">{{ __('Item Category') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Select Category" data-live-search="true" name="category">
                                                    @forelse($categories as $category)
                                                        <option {{ $item->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('name'))
                                                    <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Item Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Item name with model') }}" value="{{ $item->name }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Item Image') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">


                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-preview thumbnail card" style="width: 200px; height: 150px;">
                                                                <img src="{{ route('item-image', $item->image) }}" alt="">
                                                            </div>
                                                            <div>
                                                                <span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image"/></span>
                                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
                                                            </div>
                                                        </div>

                                                        @if ($errors->has('image'))
                                                            <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <label class="col-sm-2 col-form-label">{{ __('Purchase Document') }}</label>
                                                <div class="col-sm-7">
                                                    <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }}">


                                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                            <div class="fileupload-preview thumbnail card" style="width: 200px; height: 150px;">
                                                                <img src="{{ route('purchase-document', $item->document) }}" alt="">
                                                            </div>
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
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Item Description') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                <textarea name="description" id="" cols="30" rows="15">{!! $item->description !!}</textarea>
                                                 @if ($errors->has('description'))
                                                    <span id="description-error" class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Identification No') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('identification_no') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('identification_no') ? ' is-invalid' : '' }}" name="identification_no" id="input-identification_no" type="text" placeholder="{{ __('Item identification number') }}"
                                                       value="{{ $item->identification_no }}" required="true" aria-required="true"/>
                                                @if ($errors->has('identification_no'))
                                                    <span id="identification_no-error" class="error text-danger" for="input-identification_no">{{ $errors->first('identification_no') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Item Cost') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('cost') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" min="0"
                                                       name="cost" id="input-cost" type="number" placeholder="{{ __('Item cost') }}" value="{{ $item->cost }}" required="true" aria-required="true"/>
                                                @if ($errors->has('cost'))
                                                    <span id="cost-error" class="error text-danger" for="input-cost">{{ $errors->first('cost') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Purchase Date') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('purchase_date') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('purchase_date') ? ' is-invalid' : '' }}" min="0"
                                                       name="purchase_date" id="input-purchase_date" type="date" placeholder="{{ __('Purchase Date') }}" value="{{ $item->purchase_date }}" required="true" aria-required="true"/>
                                                @if ($errors->has('purchase_date'))
                                                    <span id="purchase_date-error" class="error text-danger" for="input-purchase_date">{{ $errors->first('purchase_date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>





                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-7">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
