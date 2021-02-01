@extends('layouts.app', ['activePage' => 'category', 'titlePage' => __('Category')])

@section('content')
<div class="content">
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-7">
              <form method="post" action="{{ route('category.store') }}" autocomplete="on" class="form-horizontal">
                  @csrf

                  <div class="card ">
                      <div class="card-header card-header-primary">
                          <h4 class="card-title">{{ __('Create Category') }}</h4>
                          <p class="card-category">{{ __('Create new category') }}</p>
                      </div>
                      <div class="card-body ">

                          <div class="row">
                              <label class="col-sm-2 col-form-label">{{ __('Category Name') }}</label>
                              <div class="col-sm-7">
                                  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Category Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                                      @if ($errors->has('name'))
                                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                      @endif
                                  </div>
                              </div>
                          </div>

                      </div>
                      <div class="card-footer ml-auto mr-auto">
                          <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                      </div>
                  </div>
              </form>
          </div>
          <div class="col-md-5">
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
          </div>
      </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Category List</h4>
            <p class="card-category"> All the available categories</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    S/L
                  </th>
                  <th>
                    Category Name
                  </th>
                  <th>
                    Total Items
                  </th>

                  <th>
                    Total Value
                  </th>
                  <th>
                      Actions
                  </th>
                </thead>
                <tbody>
                @forelse($categories as $category)
                  <tr>
                    <td>
                      {{ $loop->index + 1 }}
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->items->count() }}
                    </td>

                    <td class="text-primary">
                      BDT {{ $category->items()->sum('cost') }}
                    </td>
                      <td>
                          <button class="btn btn-round btn-success" data-toggle="modal" data-target="#editModal"
                                  data-id="{{ $category->id }}" data-name="{{ $category->name }}">
                              <i class="material-icons">edit</i>
                          </button>
                          <button class="btn btn-round btn-danger" href=""><i class="material-icons">delete</i></button>
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


<div class="modal fade" id="editModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">

                <div class="modal-body">
                    <form method="post" id="editForm" action="" autocomplete="on" class="form-horizontal">
                        @csrf
                        @method('PATCH')

                        <div class="card ">
                            <div class="card-header card-header-primary flex justify-between mx-3">
                                <h4 class="card-title">{{ __('Edit Category') }}</h4>

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    <i class="material-icons">clear</i>
                                </button>
                            </div>
                            <div class="card-body ">

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Category Name') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="modal-name" type="text" placeholder="{{ __('Category Name') }}" value="{{ old('name') }}" required="true" aria-required="true"/>
                                            @if ($errors->has('name'))
                                                <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                    <input type="hidden" id="modal-id">

                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
    <script>
        $('#editModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            var name = button.data('name') // Extract info from data-* attributes
            var modal = $(this)
            modal.find('#modal-name').val(name)
            modal.find('#editForm').attr('action', '/category/'+id)
        })
    </script>
@endpush
