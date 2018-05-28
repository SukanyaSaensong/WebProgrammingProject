@extends('manager.master')

@section('content')
<div class="container">
  <div class="row">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br>
     <ul>
      @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif
   @if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
	<img src="/images/{{ Session::get('path') }}" />
   @endif
    <form  action="{{$url}}" method="POST" enctype="multipart/form-data">
      {{method_field($method)}}

      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <div class="form-group">
           <table class="table">
            <tr>
             <td width="40%" align="right"><label>เลือกรูปภาพสำหรบอัพโหลด</label></td>
             <td width="30"><input type="file" name="image" value="{{$obj->image or ''}}"></td>
            </tr>
            <tr>
             <td width="40%" align="right"></td>
             <td width="30"><span class="text-muted">jpg, png, gif</span></td>
             <td width="30%" align="left"></td>
            </tr>
           </table>
          </div>



      <div class="form-group">
        <label for="topic">ชื่อ</label>
        <input type="text" class="form-control" name="topic"  placeholder="ผักปลอดสารพิษ" value="{{$obj->topic or ''}}">
      </div>
      <div class="form-group">
        <label for="price">ราคา</label>
        <input type="text" class="form-control" name="price"  placeholder="100 บาท" value="{{$obj->price or ''}}">
      </div>
      <div class="form-group">
        <label for="description">รายละเอียด</label>
        <textarea class="form-control" name="description" rows="8" cols="40">{{$obj->description or ''}}</textarea>
      </div>

        <button type="submit" class="btn btn-default">ยืนยัน</button>
    </form>
  </div>
@stop
