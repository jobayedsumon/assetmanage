@extends('layouts.app', ['activePage' => 'asset-transfer', 'titlePage' => __('Transfer Asset')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('asset-transfer.store') }}" autocomplete="on" class="form-horizontal">
                        @csrf

                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Transfer Asset') }}</h4>
                                <p class="card-category font-weight-bold">Transfer {{ $assignment->item->name }} from {{ $assignment->employee->name }}</p>
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

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead class=" text-primary">
                                            <tr>

                                                <th>
                                                    Image
                                                </th>
                                                <th>
                                                    Name
                                                </th>
                                                <th>
                                                    Category
                                                </th>
                                                <th>
                                                    Assigned To
                                                </th>
                                                <th>
                                                    Assigned Dept.
                                                </th>
                                                <th>
                                                    Identification No
                                                </th>
                                                <th>
                                                    Cost
                                                </th>
                                                <th>
                                                    Purchase Date
                                                </th>


                                            </tr></thead>
                                            <tbody>


                                                <tr>

                                                    <td>
                                                        <img width="100px" src="{{ route('item-image', $assignment->item->image) }}" alt="">
                                                    </td>
                                                    <td>
                                                        {{ $assignment->item->name }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->item->category->name }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->employee->name }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->department->name }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->item->identification_no }}
                                                    </td>
                                                    <td>
                                                        BDT {{ $assignment->item->cost }}
                                                    </td>
                                                    <td>
                                                        {{ $assignment->item->purchase_date }}
                                                    </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Department') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                                            <select class="selectpicker" data-style="btn btn-primary btn-round"  id="input-department"
                                                    title="Select Department" data-live-search="true" name="department">
                                                <option disabled selected>Select Department</option>
                                                @forelse($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
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
                                                <option disabled selected>Select Employee</option>

                                            </select>
                                            @if ($errors->has('employee'))
                                                <span id="name-error" class="error text-danger" for="input-employee">{{ $errors->first('employee') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Transferred Date') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('transferred_date') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('transferred_date') ? ' is-invalid' : '' }}"
                                                   name="transferred_date" id="input-transferred_date" type="date" placeholder="{{ __('Transferred Date') }}" value="{{ old('transferred_date') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('transferred_date'))
                                                <span id="transferred_date-error" class="error text-danger" for="input-transferred_date">{{ $errors->first('transferred_date') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Remarks') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                            <textarea name="remarks" id="" cols="30" rows="15"></textarea>
                                            @if ($errors->has('remarks'))
                                                <span id="remarks-error" class="error text-danger" for="input-remarks">{{ $errors->first('remarks') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                    <input type="hidden" name="item" value="{{ $assignment->item->id }}">
                                    <input type="hidden" name="previous_employee" value="{{ $assignment->employee->id }}">

                            </div>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-7">
                                    <div class="card-footer ml-auto mr-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('Make Transfer') }}</button>
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
