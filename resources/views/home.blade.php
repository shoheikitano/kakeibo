@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">
            まずは日付フォルダを作成しましょう
          </div>
          <div class="panel-body">
            <div class="text-center">
              <a href="{{ route('days.create') }}" class="btn btn-primary">
                フォルダ作成ページへ
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection