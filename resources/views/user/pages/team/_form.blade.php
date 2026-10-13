<div class="form-group">
   
    <x-form.input type="text"  name="name" placeholder="ادخل اسم العضو" label="اسم العضو" :value="$member->name" />
</div>

<div class="form-group">

    <x-form.input type="email" name="email" placeholder="ادخل البريد الإلكتروني" label="البريد الإلكتروني "  :value="$member->email" />
</div>


<div class="form-group">

    <x-form.input type="password" name="password" placeholder="*********" label="كلمة المرور" 
        :value="''" />
</div>

<div class="form-group">

    <x-form.input type="password" name="password_confirmation" placeholder="*********" label="كلمة المرور" 
        :value="''" />
</div>