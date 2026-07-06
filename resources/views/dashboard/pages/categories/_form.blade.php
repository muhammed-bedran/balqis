<div class="form-group">
    <label for="name">اسم التصنيف</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="أدخل اسم التصنيف" value="{{ $category->name }}">
</div>
<div class="form-group">
    <label for="description">وصف التصنيف</label>
    <textarea class="form-control" id="description" name="description" rows="3"
        placeholder="أدخل وصف التصنيف"  > {{ $category->description }} </textarea>

</div>