<!DOCTYPE html>
<html language="ja">
<head>
<meta charset="UTF-8">
<title>csv出力</title>
<link rel="stylesheet" href="{{ asset('css/default.css') }}">
<link rel="stylesheet" href="{{ asset('css/export.css') }}">
</head>
<body>

<div class="export-wrap">
<form action="get" method="POST">
  {{ csrf_field() }}
  <input class="export-btn" type="submit" value="一覧取得" formaction = "/export/get" name="export_get">
</from>

@isset($list)
<table class="export_table" width="100%">
  <tr>
    <td>商品ID</td>
    <td>商品名</td>
    <td>単価</td>
    <td>前回更新日時</td>
  </tr>
  @foreach($list as $lists)
  <tr>
    <td>{{ $lists->Product_ID }}</td>
    <td>{{ $lists->Product_Name }}</td>
    <td>{{ $lists->Product_Val }}</td>
    <td>{{ $lists->insert_date }}</td>
  </tr>
  @endforeach
</table>

<div class="export-content">
  <!-- インポート -->
  <form method="post" action="import" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="file" name="csvfile">
    <input type="submit" formaction="/export/input" value="インポート">
  </form>

  <!-- エクスポート -->
  <form action="import" method="POST">
    {{ csrf_field() }}
    <input class="export-btn" type="submit" value="csv出力" formaction = "/export/output">
  </form>

  <!-- 戻る -->
  <form action="back" method="POST">
    {{ csrf_field() }}
    <input class="export-btn" type="submit" value="戻る" name="back-btn" formaction = "/back">
  </form>
</div>
<div id="result"></div>
@endisset
</div>

</body>
</html>
