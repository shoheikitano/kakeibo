@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading"><i class="fas fa-user">ステータス</i></div>
          <div class="panel-body">
            name:     {{ Auth::user()->name }}
          </div>
          <div class="list-group">
            <div class="list-group-item" >
              現在の状況:
              @if( $total > 0 )
              <i class="fas fa-plus text-success" >{{ $total }}</i>
              @elseif( $total < 0)
              <i class="fas fa-minus text-danger" >{{ $total * -1 }}</i>
              @else
              @endif
            </div>
          </div>
        </nav>
      </div>
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading"><i class="fas fa-calendar-day">日付</i></div>
          <div class="panel-body">
            <a href="{{ route('days.create') }}" class="btn btn-default btn-block">
              日付フォルダを追加する
            </a>
          </div>
          <div class="list-group">
            @foreach($days as $day)
              <a
                  href="{{ route('shushies.index', ['id' => $day->id]) }}"
                  class="list-group-item {{ $current_day_id === $day->id ? 'active' : '' }}"
              >
                {{ $day->formatted_due_date }}
              @if( $day->sum > 0 )
              <i class="fas fa-plus text-success" style="white-space:nowrap">{{ $day->sum }}</i>
              @elseif( $day->sum < 0)
              <i class="fas fa-minus text-danger" style="white-space:nowrap">{{ $day->sum * -1 }}</i>
              @else
              @endif
              </a>
            @endforeach
          </div>
        </nav>
      </div>
      <div class="column col-md-8">
        <div class="panel panel-default">
          <div class="panel-heading"><i class="fas fa-money-check-alt">収支</i></div>
          <div class="panel-body">
            <div class="text-right">
              <a href="{{ route('shushies.create', ['id' => $current_day_id]) }}" class="btn btn-default btn-block">
                収支を追加する
              </a>
            </div>
          </div>
          <table class="table">
            <thead>
            <tr>
              <th>タイトル</th>
              <th>収支</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($shushis as $shushi)
              <tr>
                <td>{{ $shushi->title }}</td>
                <td>{{ $shushi->money }}</td>
                <td><a href="{{ route('shushies.edit', ['id' => $shushi->day_id, 'shushi_id' => $shushi->id]) }}">編集</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
          <table class="table">
            <thead>
              <th></th>
            </thead>
          </table>
          <table class="table">
            <thead>
            <tr>
              <th width="84%">合計</th>
              <th>{{ $sum }}</th>
              @if( $sum > 0 )
              <th><i class="fas fa-plus text-success"></i></th>
              @elseif( $sum < 0)
              <th><i class="fas fa-minus text-danger"></i></th>
              @else
              <th></th>
              @endif
            </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
