
<form action="" method="post" id="authlistform" onsubmit="return false" class="form-inline">
<input type="hidden" name="active_id" value="{{ $rid }}"/>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@foreach($authlist as $vo)
    <div class="checkbox" style="width:140px;height:35px;">
        <label>
        <input type="checkbox" name="aids[]" value="{{ $vo->id }}" {{ in_array($vo->id,$aids)?"checked":"" }}> {{ $vo->title }}
        </label>
    </div>
@endforeach
</form>