<div class="form-group">
   
    <x-form.input type="text"  name="name" placeholder="ادخل اسم المنتج" label="اسم المنتج" :value="$product->name" />
</div>
<div class="form-group">
    <label for="description">وصف المنتج</label>
    <textarea class="form-control
    @error('description')
        is-invalid
    @enderror
    " id="description" name="description" rows="3"
        placeholder="أدخل وصف المنتج"  > {{ $product->description }} </textarea>
@error('description')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
</div>
<div class="for-group mb-3">
 
    <x-form.select 
    label="حالة المنتج"
    name="status"
    :options="[
        'active' => 'نشط',
        'inactive' => 'غير نشط'
    ]"
    :selected="$product->status ?? 'active'"
    />

</div>

<div class="for-group mb-3">

    <x-form.select label=" الفئات" name="category_id" :options="$categories"
    :selected="$product->category_id ?? ''" />

</div>

<div class="for-group mb-3">

    <x-form.select label=" المتاجر" name="store_id" :options="$stores" :selected="$product->store_id ?? ''" />

</div>

<div class="form-group">

    <x-form.input type="number" name="price" min="0" placeholder="ادخل اسم المنتج" label=" السعر" :value="$product->price" />
</div>