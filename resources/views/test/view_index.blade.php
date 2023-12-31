<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>A Fancy Table</h1>
@if (session('success'))
    <p style="color:#04AA6D">{{ session('success') }}</p>
@endif
@if (session('deleted'))
    <p style="color:red">{{ session('deleted') }}</p>
@endif
<table id="customers">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>
  </tr>
  @foreach ($view_datas as  $view)
     <tr>
        <td>{{ $view->id }}</td>
        <td>{{ $view->name }}</td>
        <td>
            <a href="{{ route('viewEdit',$view->id) }}">Edit</a>
            <a href="{{ route('viewDelete',$view->id) }}">Delete</a>
        </td>
    </tr>
  @endforeach

</table>

</body>
</html>


