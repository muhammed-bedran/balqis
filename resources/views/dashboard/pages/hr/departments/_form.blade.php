<div class="form-group">
   
    <x-form.input type="text"  name="name" placeholder="ادخل اسم المتجر" label="اسم المتجر" :value="$store->name" />
</div>
<div class="form-group">
    <label for="description">وصف المتجر</label>
    <textarea class="form-control
    @error('description')
        is-invalid
    @enderror
    " id="description" name="description" rows="3"
        placeholder="أدخل وصف المتجر"  > {{ $store->description }} </textarea>
@error('description')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
</div>
<div class="for-group mb-3">
 
    <x-form.select 
    label="حالة المتجر"
    name="status"
    :options="[
        'active'=>'نشط',
        'inactive'=>'غير نشط'
    ]"
    :selected="$store->status??'active'"
    />

</div>