<input class="form-check-input"
 type="checkbox"
  id="{{ $field }}"
  name="{{ $field }}" 
  value="1"
  {{ $checked ? "checked":"" }}>
<label class="form-checzk-label" for="{{ $field }}">
            {{ $label }}
        </label>