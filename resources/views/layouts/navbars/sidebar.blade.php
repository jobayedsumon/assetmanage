<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/home" class="simple-text logo-normal">
      {{ __('MIS Department') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>

      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="true">
            <i class="material-icons">people</i>
          <p>{{ __('Users') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse" id="users">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"><i class="material-icons">people</i></span>
                <span class="sidebar-normal">{{ __('User profile') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('user.index') }}">
                <span class="sidebar-mini"><i class="material-icons">people</i></span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

        <li class="nav-item{{ $activePage == 'department' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('department.index') }}">
                <i class="material-icons">apartment</i>
                <p>{{ __('Department') }}</p>
            </a>
        </li>

        {{--        <li class="nav-item{{ $activePage == 'branch' ? ' active' : '' }}">--}}
        {{--            <a class="nav-link" href="{{ route('branch.index') }}">--}}
        {{--                <i class="material-icons">business_center</i>--}}
        {{--                <p>{{ __('Branch') }}</p>--}}
        {{--            </a>--}}
        {{--        </li>--}}

        <li class="nav-item{{ $activePage == 'category' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('category.index') }}">
                <i class="material-icons">category</i>
                <p>{{ __('Category') }}</p>
            </a>
        </li>

        <li class="nav-item {{ ($activePage == 'employee' || $activePage == 'employee-management') ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#employee" aria-expanded="true">
                <i class="material-icons">badge</i>
                <p>{{ __('Manage Employee') }}
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="employee">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'employee' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('employee.create') }}">
                            <span class="sidebar-mini"><i class="material-icons">person_add</i></span>
                            <span class="sidebar-normal">{{ __('Add Employee') }} </span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'employee-management' ? ' active' : '' }}">
                        <a class="nav-link" data-toggle="collapse" href="#employee-management" aria-expanded="true">
                            <i class="material-icons">apartment</i>
                            <p>{{ __('Employee Department') }}
                                <b class="caret"></b>
                            </p>
                        </a>

                        <div class="collapse" id="employee-management">
                            <ul class="nav">

                                @forelse($departments as $department)

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employee.department', $department->id) }}">
                                        <span class="sidebar-mini"><i class="material-icons">apartment</i></span>
                                        <span class="sidebar-normal">{{ $department->name }} </span>
                                    </a>
                                </li>

                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>




        <li class="nav-item {{ ($activePage == 'items' || $activePage == 'item-management') ? ' active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#items" aria-expanded="true">
                <i class="material-icons">print</i>
                <p>{{ __('Item Management') }}
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="items">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'items' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('items.create') }}">
                            <span class="sidebar-mini"><i class="material-icons">add_shopping_cart</i></span>
                            <span class="sidebar-normal">{{ __('Create Item') }} </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#item-management" aria-expanded="true">
                            <i class="material-icons">category</i>
                            <p>{{ __('Item Category') }}
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="item-management">
                            <ul class="nav">

                                @forelse($categories as $category)

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('items.category', $category->id) }}">
                                            <span class="sidebar-mini"><i class="material-icons">category</i></span>
                                            <span class="sidebar-normal">{{ $category->name }} </span>
                                        </a>
                                    </li>

                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item {{ ($activePage == 'asset-assignment' ? ' active' : '') }}">
            <a class="nav-link" data-toggle="collapse" href="#asset-assignment" aria-expanded="true">
                <i class="material-icons">assignment</i>
                <p>{{ __('Asset Management') }}
                    <b class="caret"></b>
                </p>
            </a>
            <div class="collapse" id="asset-assignment">
                <ul class="nav">
                    <li class="nav-item{{ $activePage == 'new-assignment' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('asset-assignment.create') }}">
                            <span class="sidebar-mini"><i class="material-icons">assignment_turned_in</i></span>
                            <span class="sidebar-normal">{{ __('New Assign') }} </span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'asset-assignment' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('asset-assignment.index') }}">
                            <span class="sidebar-mini"><i class="material-icons">assignment</i></span>
                            <span class="sidebar-normal">{{ __('Manage Assignment') }}</span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'asset-transfer' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('asset-transfer.index') }}">
                            <span class="sidebar-mini"><i class="material-icons">assignment_return</i></span>
                            <span class="sidebar-normal">{{ __('Transfer Asset') }}</span>
                        </a>
                    </li>
                    <li class="nav-item{{ $activePage == 'transfer-history' ? ' active' : '' }}">
                        <a class="nav-link" href="{{ route('asset-transfer.index') }}">
                            <span class="sidebar-mini"><i class="material-icons">history</i></span>
                            <span class="sidebar-normal">{{ __('Transfer History') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>



{{--      <li class="nav-item{{ $activePage == 'table' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('table') }}">--}}
{{--          <i class="material-icons">content_paste</i>--}}
{{--            <p>{{ __('Table List') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'typography' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('typography') }}">--}}
{{--          <i class="material-icons">library_books</i>--}}
{{--            <p>{{ __('Typography') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('icons') }}">--}}
{{--          <i class="material-icons">bubble_chart</i>--}}
{{--          <p>{{ __('Icons') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('map') }}">--}}
{{--          <i class="material-icons">location_ons</i>--}}
{{--            <p>{{ __('Maps') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}
{{--      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">--}}
{{--        <a class="nav-link" href="{{ route('notifications') }}">--}}
{{--          <i class="material-icons">notifications</i>--}}
{{--          <p>{{ __('Notifications') }}</p>--}}
{{--        </a>--}}
{{--      </li>--}}


    </ul>
  </div>
</div>
