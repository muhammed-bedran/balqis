<div class="form-group">
   
    <x-form.input type="text"  name="name" placeholder="ادخل اسم الموظف" label="اسم الموظف" :value="$admin->name" />
</div>

<div class="form-group">

    <x-form.input type="email" name="email" placeholder="ادخل  البريد الإلكتروني" label=" البريد الإلكتروني"  :value="$admin->email" />
</div>

<div class="form-group">

    <x-form.input type="password" name="password" placeholder="*********" label="  كلمة المرور"
        :value="$admin->password" />
</div>
<div class="form-group">

    <x-form.input type="password" name="password_confirmation" placeholder="*********" label=" تاكيد كلمة المرور "
        :value="$admin->password_confirmation" />
</div>

<div class="for-group mb-3">

    <x-form.select label="حالة النشط" name="status" :options="[
        'active' => 'نشط',
        'inactive' => 'غير نشط'
    ]"
    :selected="$admin->status ?? 'active'" />

</div>
<div class="form-group">
    <label for="super_admin">الصلاحية العامة</label>
    {{-- <input type="hidden" name="super_admin" value="0" > --}}
    <input type="checkbox" name="super_admin" value="1" {{ old('super_admin',$admin->super_admin) ? 'checked' : '' }}>
</div>
<div class="form-group">
  
    @forelse ( $roles as $role )
        <input
        class="mr-2"
        type="checkbox"
        name="roles[]"
        value="{{ $role->id }}"
        @checked($admin->roles->contains('id', $role->id))
        
        
        
        >
        <label >{{ $role->name }}</label>
    @empty
        
    @endforelse
</div>



</div>