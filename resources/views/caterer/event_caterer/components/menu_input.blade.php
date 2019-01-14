<div class="form-group {{ $errors->has($field) ? 'has-danger' : '' }}">
    <label class="col-md-12">{{$text}}</label>
    <div class="col-md-12">
        <input type="text" name="{{$field}}" value="{{ $model->$field }}" class="form-control form-control-line">

        @if ($errors->has($field))
		    <div class="form-control-feedback">{{ $errors->first($field) }}</div>
		@endif
    </div>
</div>