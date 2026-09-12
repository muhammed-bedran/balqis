<div class="form-group">

    <x-form.input type="date" name="hire_date" placeholder="ادخل تاريخ التوظيف" label="تاريخ التوظيف"
        :value="$employee->hire_date" />
</div>

<div class="form-group">
   
    <x-form.input type="text"  name="name" placeholder="ادخل اسم الموظف" label="اسم الموظف" :value="$employee->name" />
</div>
<div class="form-group">

    <x-form.input type="text" name="email" placeholder="ادخل البريد الإلكتروني" label="البريد الإلكتروني" :value="$employee->email" />
</div>

<div class="form-group">

    <x-form.input type="text" name="phone" placeholder="ادخل رقم الهاتف" label="رقم الهاتف" :value="$employee->phone" />
</div>

<div class="form-group">

    <x-form.input type="text" name="job_title" placeholder="ادخل عنوان الوظيفة" label="عنوان الوظيفة" :value="$employee->job_title" />
</div>
<div class="for-group mb-3">

    <x-form.select label=" الأقسام" name="department_id" :options="$departments" :selected="$employee->department_id ?? ''" />

</div>

<div class="form-group">

    <x-form.input type="number" name="salary" placeholder="ادخل راتب الموظف" label="راتب الموظف" :value="$employee->salary" />
</div>


<div class="form-group">
    <label for="address">عنوان الموظف</label>
    <textarea class="form-control
    @error('address')
        is-invalid
    @enderror
    " id="address" name="address" rows="3"
        placeholder="أدخل عنوان الموظف"  > {{ $employee->address }} </textarea>
@error('address')
    <div class="text-danger">
        {{ $message }}
    </div>
@enderror
</div>
<div class="form-group">
    <label for="notes"> ملاحظات</label>
    <textarea class="form-control
    @error('notes')
        is-invalid
    @enderror
    " id="notes" name="notes" rows="3" placeholder="أدخل ملاحظات"> {{ $employee->notes }} </textarea>
    @error('notes')
        <div class="text-danger">
            {{ $message }}
        </div>
    @enderror
</div>
<div class="for-group mb-3">
 
    <x-form.select 
    label="حالة الموظف"
    name="status"
    :options="[
        'active' => 'نشط',
        'inactive' => 'غير نشط',
        'terminated' => 'تم إنهاء الخدمة',
        'on_leave' => 'في إجازة',
    ]"
    :selected="$employee->status ?? 'active'"
    />

</div>