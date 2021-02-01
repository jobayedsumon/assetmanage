@extends('layouts.app', ['activePage' => 'update-assignment', 'titlePage' => __('Updated Assignment')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('asset-assignment.update', $assignment->id) }}" autocomplete="on" class="form-horizontal">
                        @csrf
                        @method('PATCH')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Update Assignment') }}</h4>
                                <p class="card-category">{{ __('Asset Assignment Information') }}</p>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                                            <select class="selectpicker" data-style="btn btn-primary btn-round"  id="input-department"
                                                    title="Select Department" data-live-search="true" name="department">
                                                <option disabled selected>Select Department</option>
                                                @forelse($departments as $department)
                                                    <option {{ $department->id == $assignment->department_id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            @if ($errors->has('department'))
                                                <span id="department-error" class="error text-danger" for="input-department">{{ $errors->first('department') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Employee') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('employee') ? ' has-danger' : '' }}">
                                            <select class="selectpicker" data-style="btn btn-primary btn-round" id="input-employee"
                                                    title="Select Employee" data-live-search="true" name="employee">
                                                <option selected value="{{ $assignment->employee_id }}">{{ $assignment->employee->name }}</option>

                                            </select>
                                            @if ($errors->has('employee'))
                                                <span id="name-error" class="error text-danger" for="input-employee">{{ $errors->first('employee') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Item Category') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                                <select class="selectpicker" data-style="btn btn-primary btn-round"  id="input-category"
                                                        title="Select Department" data-live-search="true" name="category">
                                                    <option disabled selected>Select Item Category</option>
                                                    @forelse($categories as $category)
                                                        <option {{ $category->id == $assignment->item->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                    <option selected value="{{ $assignment->item_id }}">{{ $assignment->item->name }}</option>

                                                </select>
                                                @if ($errors->has('item'))
                                                    <span id="name-error" class="error text-danger" for="input-item">{{ $errors->first('item') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


{{--                                <div class="row">--}}
{{--                                    <label class="col-sm-2 col-form-label">{{ __('Item Quantity') }}</label>--}}
{{--                                    <div class="col-sm-7">--}}
{{--                                        <div class="form-group{{ $errors->has('quantity') ? ' has-danger' : '' }}">--}}
{{--                                            <input class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" id="input-quantity" min="0" type="number" placeholder="{{ __('Item quantity') }}" value="{{ old('quantity') }}" required="true" aria-required="true"/>--}}
{{--                                            @if ($errors->has('quantity'))--}}
{{--                                                <span id="quantity-error" class="error text-danger" for="input-quantity">{{ $errors->first('quantity') }}</span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Item Condition') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('condition') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('condition') ? ' is-invalid' : '' }}" name="condition"
                                                   id="input-condition" type="text" placeholder="{{ __('Item Condition') }}"
                                                   value="{{ $assignment->condition }}" required="true" aria-required="true"/>
                                            @if ($errors->has('condition'))
                                                <span id="condition-error" class="error text-danger" for="input-condition">{{ $errors->first('condition') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Assigned Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('assigned_date') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('assigned_date') ? ' is-invalid' : '' }}"
                                                   name="assigned_date" id="input-assigned_date" type="date" placeholder="{{ __('Assigned Date') }}" value="{{ $assignment->assigned_date }}" required="true" aria-required="true"/>
                                            @if ($errors->has('assigned_date'))
                                                <span id="assigned_date-error" class="error text-danger" for="input-assigned_date">{{ $errors->first('assigned_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Item Status') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('status') ? ' is-invalid' : '' }}" name="status" id="input-status"
                                                       type="text" placeholder="{{ __('Item Status') }}" value="{{ $assignment->status }}" required="true" aria-required="true"/>
                                                @if ($errors->has('status'))
                                                    <span id="status-error" class="error text-danger" for="input-status">{{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Knox') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('knox_status') ? ' has-danger' : '' }}">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="knox" value="true" {{ $assignment->knox ? 'checked' : '' }}>
                                                        Knox
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                                @if ($errors->has('knox_status'))
                                                    <span id="knox_status-error" class="error text-danger" for="input-knox_status">{{ $errors->first('knox_status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">{{ __('Remarks') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                                <textarea name="remarks" id="" cols="30" rows="15">{!! $assignment->remarks !!}</textarea>
                                                @if ($errors->has('remarks'))
                                                    <span id="remarks-error" class="error text-danger" for="input-remarks">{{ $errors->first('remarks') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-7">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Update Assignment') }}</button>
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

            $('#input-department').on('change',function(e) {
                var department = e.target.value;
                $.ajax({
                    url:"/get-department-employee",
                    type:"POST",
                    data: {
                        department: department
                    },
                    success:function (data) {

                        var html = '<option disabled selected>Select Employee</option>';
                        $('#input-employee').empty();
                        $.each(data,function(index){
                            html += '<option value="'+data[index].id+'">'+data[index].name+'</option>';
                        });

                        $('#input-employee').html(html);
                        $('#input-employee').selectpicker('refresh');
                    }
                });

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
