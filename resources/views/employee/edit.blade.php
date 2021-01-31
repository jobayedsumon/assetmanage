@extends('layouts.app', ['activePage' => 'employee', 'titlePage' => __('Update Employee')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('employee.update', $employee->id) }}" autocomplete="on" class="form-horizontal">
                        @csrf
                        @method('PATCH')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Update Employee ('.$employee->name.')') }}</h4>
                                <p class="card-category">{{ __('Update employee information') }}</p>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Employee Department') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <select class="selectpicker" data-style="btn btn-primary btn-round" title="Select Department" data-live-search="true" name="department">
                                                @forelse($departments as $department)
                                                    <option {{ $department->id == $employee->department_id ? 'selected' : '' }} value="{{ $department->id }}">{{ $department->name }}</option>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Employee Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Employee full name') }}" value="{{ $employee->name }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" id="input-phone_number" type="text" placeholder="{{ __('Employee phone number') }}" value="{{ $employee->phone_number }}" required="true" aria-required="true"/>
                                            @if ($errors->has('phone_number'))
                                                <span id="phone_number-error" class="error text-danger" for="input-phone_number">{{ $errors->first('phone_number') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Employee Email') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="text" placeholder="{{ __('Employee email') }}" value="{{ $employee->email }}" required="true" aria-required="true"/>
                                            @if ($errors->has('email'))
                                                <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('NID Number') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('nid') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('nid') ? ' is-invalid' : '' }}" name="nid" id="input-nid" type="text" placeholder="{{ __('Employee NID number') }}" value="{{ $employee->nid }}" required="true" aria-required="true"/>
                                            @if ($errors->has('nid'))
                                                <span id="nid-error" class="error text-danger" for="input-nid">{{ $errors->first('nid') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Employee Address') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" id="input-address" type="text" placeholder="{{ __('Employee address') }}" value="{{ $employee->address }}" required="true" aria-required="true"/>
                                            @if ($errors->has('address'))
                                                <span id="address-error" class="error text-danger" for="input-address">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Joining Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('joining_date') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('joining_date') ? ' is-invalid' : '' }}" min="0"
                                                   name="joining_date" id="input-joining_date" type="date" placeholder="{{ __('Employee Joining Date') }}" value="{{ $employee->joining_date }}" required="true" aria-required="true"/>
                                            @if ($errors->has('joining_date'))
                                                <span id="joining_date-error" class="error text-danger" for="input-joining_date">{{ $errors->first('joining_date') }}</span>
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
