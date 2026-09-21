<div class="card-body">
    <div class="form-group">
        <x-form.select label="الموظف" name="employee_id" :options="$employees" :selected="$deduction->employee_id" />

    </div>



    <div class="form-group">
        <x-form.input type="text" name="title" placeholder="ادخل عنوان الخصم" label="عنوان الخصم"
            :value="$deduction->title ?? ''" />
    </div>


    <div class="form-group">
        <x-form.select label="نوع الخصم" name="type" :options="[
        'late' => '  تأخير',
        'absence' => 'غياب',
        'loan' => 'قرض',
        'penalty' => 'عقوبة',
        'other' => 'أخرى',
        'tax' => 'مكافأة  ضريبة',
    ]" :selected="$deduction->type ?? '' " />
    </div>
    <div class="form-group">
        <x-form.input type="number" name="amount" placeholder="ادخل مبلغ الخصم" label="مبلغ الخصم"
            :value="$deduction->amount ?? ''" />
    </div>

    <div class="form-group">
        <x-form.input type="date" name="date" placeholder="ادخل تاريخ الخصم" label="تاريخ الخصم"
            :value="$deduction->date ?? ''" />
    </div>

    <div class="form-group">
        <label for="note"> الملاحظات </label>
        <textarea class="form-control
        @error('reason')
            is-invalid
        @enderror
        " id="note" name="note" rows="3" placeholder="أدخل الملاحظات"> {{ $deduction->note ?? '' }} </textarea>
        @error('note')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>