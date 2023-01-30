<label for="{ $field }}"
 class="form-label">{{ $label }}</label>
<textarea type="address"
 class="form-control"
  id="{{ $field }}"
   name="{{ $field }}"
    cols="20"
     rows="5"
     placeholder="{{ $placeholder }}">
     {{old("$field","$value") }}
    </textarea>
@error('$field')
<span class="text-danger">{{ $message }}</span>
@enderror