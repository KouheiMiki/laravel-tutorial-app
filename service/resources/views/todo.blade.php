<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('/css/todo.css')}}">
</head>
<body>
  <ul class="ul">
    <li>これからやること</li>
    @if (isset($runningItems))
    @foreach ($runningItems as $runningItem)
      <li class="todo">{{htmlspecialchars($runningItem->title) . "  " . htmlspecialchars($runningItem->content)}}</li>
      <li>
        <form action="/todo/update" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$runningItem->id}}">
          <input type="hidden" name="flg" value="{{$runningItem->flg}}">
          <input type="submit" value="終了" class="todo_button">
        </form>
      </li>
      @endforeach
      @endif
  </ul>

  <ul class="ul">
    <li>もうやったこと</li>
    @if(isset($doneItems))
    @foreach ($doneItems as $doneItem)
      <li class="todo">{{htmlspecialchars($doneItem->title) . "  " . htmlspecialchars($doneItem->content)}}</li>
      <li>
        <form action="/todo/delete" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="id" value="{{$doneItem->id}}">
          <input type="hidden" name="flg" value="{{$doneItem->flg}}">
          <input type="submit" value="削除" class="todo_button">
        </form>
      </li>
      @endforeach
      @endif
  </ul>

  <form action="./todo/create" method="post" class="from">
    {{csrf_field()}}
    <input type="text" name="title" class="title" placeholder="タイトルを入力">
    <textarea name="content" cols="30" rows="10" class="content" placeholder="内容を入力"></textarea>
    <input type="submit" class="todo_button" value="追加">
  </form>
</body>
</html>