@extends('Layout/app')
@section('content')
<div class="panel-body">
  @if (session('mesage'))
  <div class="alert alert-info alert-dismissible text-white" role="alert">
    <span class="text-sm"> <a href="javascript:;" class="alert-link text-white">Excelente</a>. {{ session('mesage')
      }}.</span>
    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">{{$article->title}}</h6>
              <div class="float-end">
                {{-- Button del article add --}}
                <a type="button" href="article/add" class="btn btn-primary">
                  <i class="fas fa-plus-circle"></i>
                </a>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <div class="container">
                <div class="row">
                  <div class="col">
                    <p>{{$article->subtitle}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection