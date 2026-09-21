<div class="card-body">
    <div class="form-group">
        <x-form.select label="الموظف" name="employee_id" :options="$employees" :selected="$bonus->employee_id" />

    </div>



    <div class="form-group">
        <x-form.input type="text" name="title" placeholder="ادخل عنوان المكافأة" label="عنوان المكافأة"
            :value="$bonus->title ?? ''" />
    </div>


    <div class="form-group">
        <x-form.select label="نوع المكافأة" name="type" :options="[
        'performance' => 'مكافأة أداء',
        'overtime' => 'مكافأة عمل إضافي',
        'holiday' => 'مكافأة عطلة',
        'commission' => 'مكافأة  عمولة',
    ]" :selected="$bonus->type ?? '' " />
    </div>
    <div class="form-group">
        <x-form.input type="number" name="amount" placeholder="ادخل مبلغ المكافأة" label="مبلغ المكافأة"
            :value="$bonus->amount ?? ''" />
    </div>

    <div class="form-group">
        <x-form.input type="date" name="date" placeholder="ادخل تاريخ المكافأة" label="تاريخ المكافأة"
            :value="$bonus->date ?? ''" />
    </div>

    <div class="form-group">
        <label for="note"> الملاحظات </label>
        <textarea class="form-control
        @error('reason')
            is-invalid
        @enderror
        " id="note" name="note" rows="3" placeholder="أدخل الملاحظات"> {{ $bonus->note ?? '' }} </textarea>
        @error('note')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>