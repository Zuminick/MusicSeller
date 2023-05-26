@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Admin pannel</h2>
          </div>
        </div>
      </div>
      <div class="btn-group" role="group">
        <a class="nav-link" href="{{ url('admin/posts') }}">
          <i class="mdi mdi-file-document-box-outline menu-icon"></i>
          <span class="menu-title">Posts</span>
      </a>
        <a class="nav-link" href="{{ url('admin/users') }}">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">Users</span>
        </a>
        <a class="nav-link" href="{{ url('admin/genres') }}">
          <i class="mdi mdi-view-headline menu-icon"></i>
          <span class="menu-title">Genres</span>
        </a>
        <a class="nav-link" href="{{ url('admin/types') }}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">Types</span>
        </a>
        <a class="nav-link" href="{{ url('admin/forms') }}">
          <i class="mdi mdi-file-document-box-outline"></i>
          <span class="menu">Forms</span>
        </a>
      </div>
      </div>
    </div>
  </div>
@endsection