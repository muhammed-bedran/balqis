<div class="form-group">
    {{-- <label for="name">اسم التصنيف</label>
    <input type="text" class="form-control
    @error('name')
        is-invalid
    @enderror
    " id="name" name="name" placeholder="أدخل اسم التصنيف" value="{{ $category->name }}">
    @error('name')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror --}}
    <x-form.input type="text"  name="name" placeholder="ادخل اسم التصنيف" label="اسم التصنيف" :value="$category->name" />
</div>
<div class="form-group">
    <label for="description">وصف التصنيف</label>
    <textarea class="form-control
    @error('description')
        is-invalid
    @enderror
    " id="description" name="description" rows="3"
        placeholder="أدخل وصف التصنيف"  > {{ $category->description }} </textarea>
@error('description')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
</div>
<div class="for-group mb-3">
    {{-- <label for="status">حالة التصنيف</label>
    <select name="status" id="status" class="form-control
    @error('description')
       
           is-invalid
    @enderror
    ">
        <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>نشط</option>
        <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }} >غير نشط</option>
    </select>
    @error('status')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror --}}

    <x-form.select 
    label="حالة التصنيف"
    name="status"
    :options="[
        'active'=>'نشط',
        'inactive'=>'غير نشط'
    ]"
    :selected="$category->status??'active'"
    />

</div>