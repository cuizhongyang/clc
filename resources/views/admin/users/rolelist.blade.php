
<form action="" method="post" id="rolelistform" onsubmit="return false" class="form-inline">
<input type="hidden" name="uid" value="{{ $uid }}"/>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
@foreach($rolelist as $vo)
    <div class="checkbox" style="width:140px;height:35px;">
        <label>
        <input type="checkbox" name="rids[]" value="{{ $vo->id }}" {{ in_array($vo->id,$rids)?"checked":"" }}> {{ $vo->name }}
        </label>
    </div>
@endforeach
</form>