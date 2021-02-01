<div class="wrapper ">
  @include('layouts.navbars.sidebar', [
    'departments' => \App\Models\Department::all(),
    'categories' => \App\Models\Category::all()
])
  <div class="main-panel">
    @include('layouts.navbars.navs.auth')
    @yield('content')
    @include('layouts.footers.auth')
  </div>
</div>
