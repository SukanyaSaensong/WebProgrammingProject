@extends('manager.master')

@section('content')
<div class="container">
  <div class="row">
    <!-- <a class="btn btn-primary" href="{{url('manager/post/create')}}">Create</a> -->
    <table class="table table-striped">
        <tr>
          <th>
            ID
          </th>
          <th>
            ชื่อ
          </th>
          <th>
          ราคา(บาท)
          </th>
          <th>
            รายละเอียด
          </th>
          <th>
          รูปภาพ
          </th>
          <th>
            Action
          </th>
        </tr>
      @foreach($objs as $row)
      <tr>
        <td>
              {{$row->id}}
        </td>
        <td>
              {{$row->topic}}
        </td>
        <td>
              {{$row->price}}
        </td>

        <td>
            {{$row->description}}
        </td>
        <td>

              <img  src="{{asset('/images/'.$row->image)}}" style="width: 50%"/>

        </td>

      <td>
        <a class="fl btn btn-success" id ="edit" href="{{url('manager/post/'.$row->id.'/edit')}}">EDIT</a>

        <form class="fl" action="{{url('manager/post/'.$row->id)}}" method="post" onsubmit="return(confirm('ต้องการลบรายการนี้ หรือไม่'))">
          {{method_field('DELETE')}}
          {{csrf_field() }}
            <button type="submit" class="btn btn-danger">DELETE</button>
        </form>

      </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@stop
