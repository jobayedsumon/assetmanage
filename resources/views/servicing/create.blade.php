@extends('layouts.app', ['activePage' => 'servicing', 'titlePage' => __('Send For Servicing')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('servicing.store') }}" autocomplete="on" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Item Servicing') }}</h4>
                                <p class="card-category">{{ __('Servicing information') }}</p>
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
                                            <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                                <select class="selectpicker" data-style="btn btn-primary btn-round"  id="input-category"
                                                        title="Select Department" data-live-search="true" name="category">
                                                    <option disabled selected>Select Item Category</option>
                                                    @forelse($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('category'))
                                                    <span id="category-error" class="error text-danger" for="input-category">{{ $errors->first('category') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Item') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('item') ? ' has-danger' : '' }}">
                                                <select class="selectpicker" data-style="btn btn-primary btn-round" id="input-item"
                                                        title="Select Item" data-live-search="true" name="item">
                                                    <option disabled selected>Select Item</option>

                                                </select>
                                                @if ($errors->has('item'))
                                                    <span id="name-error" class="error text-danger" for="input-item">{{ $errors->first('item') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Describe Item Problems') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('problem') ? ' has-danger' : '' }}">
                                                <textarea name="problem" id="" cols="30" rows="15"></textarea>
                                                @if ($errors->has('problem'))
                                                    <span id="problem-error" class="error text-danger" for="input-problem">{{ $errors->first('problem') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Given Date') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('given_date') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('given_date') ? ' is-invalid' : '' }}" min="0"
                                                       name="given_date" id="input-given_date" type="date" placeholder="{{ __('Given Date') }}" value="{{ old('given_date') }}" required="true" aria-required="true"/>
                                                @if ($errors->has('given_date'))
                                                    <span id="given_date-error" class="error text-danger" for="input-given_date">{{ $errors->first('given_date') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="input-phone_number" type="text" placeholder="{{ __('Center Phone Number') }}" value="{{ old('phone_number') }}" required="true" aria-required="true"/>
                                                @if ($errors->has('phone_number'))
                                                    <span id="phone_number-error" class="error text-danger" for="input-phone_number">{{ $errors->first('phone_number') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Service Center Location') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                                <textarea name="location" id="" cols="30" rows="15"></textarea>
                                                @if ($errors->has('location'))
                                                    <span id="location-error" class="error text-danger" for="input-location">{{ $errors->first('location') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>




{{--                                    <div class="row">--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="row">--}}
{{--                                                <label class="col-sm-2 col-form-label">{{ __('Item Image') }}</label>--}}
{{--                                                <div class="col-sm-7">--}}
{{--                                                    <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">--}}


{{--                                                        <div class="fileupload fileupload-new" data-provides="fileupload">--}}
{{--                                                            <div class="fileupload-preview thumbnail card" style="width: 200px; height: 150px;"></div>--}}
{{--                                                            <div>--}}
{{--                                                                <span class="btn btn-default btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image"/></span>--}}
{{--                                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        @if ($errors->has('image'))--}}
{{--                                                            <span id="image-error" class="error text-danger" for="input-image">{{ $errors->first('image') }}</span>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}

{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="row">--}}
{{--                                                <label class="col-sm-2 col-form-label">{{ __('Purchase Document') }}</label>--}}
{{--                                                <div class="col-sm-7">--}}
{{--                                                    <div class="form-group{{ $errors->has('document') ? ' has-danger' : '' }}">--}}


{{--                                                        <div class="fileupload fileupload-new" data-provides="fileupload">--}}
{{--                                                            <div class="fileupload-preview thumbnail card" style="width: 200px; height: 150px;"></div>--}}
{{--                                                            <div>--}}
{{--                                                                <span class="btn btn-default btn-file"><span class="fileupload-new">Select Image</span><span class="fileupload-exists">Change</span><input type="file" name="document"/></span>--}}
{{--                                                                <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

{{--                                                        @if ($errors->has('document'))--}}
{{--                                                            <span id="document-error" class="error text-danger" for="input-document">{{ $errors->first('document') }}</span>--}}
{{--                                                        @endif--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    </div>--}}








{{--                                    <div class="row">--}}
{{--                                        <label class="col-sm-2 col-form-label">{{ __('Item Cost') }}</label>--}}
{{--                                        <div class="col-sm-7">--}}
{{--                                            <div class="form-group{{ $errors->has('cost') ? ' has-danger' : '' }}">--}}
{{--                                                <input class="form-control{{ $errors->has('cost') ? ' is-invalid' : '' }}" min="0"--}}
{{--                                                       name="cost" id="input-cost" type="number" placeholder="{{ __('Item cost') }}" value="{{ old('cost') }}" required="true" aria-required="true"/>--}}
{{--                                                @if ($errors->has('cost'))--}}
{{--                                                    <span id="cost-error" class="error text-danger" for="input-cost">{{ $errors->first('cost') }}</span>--}}
{{--                                                @endif--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}








                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-7">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Send Item') }}</button>
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

    <script>

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#input-category').on('change',function(e) {
                var category = e.target.value;
                $.ajax({
                    url:"/get-category-item",
                    type:"POST",
                    data: {
                        category: category
                    },
                    success:function (data) {

                        var html = '<option disabled selected>Select Item</option>';
                        $('#input-item').empty();
                        $.each(data,function(index){
                            html += '<option value="'+data[index].id+'">'+data[index].name+'</option>';
                        });

                        $('#input-item').html(html);
                        $('#input-item').selectpicker('refresh');
                    }
                });

            });

        });
    </script>

@endpush
