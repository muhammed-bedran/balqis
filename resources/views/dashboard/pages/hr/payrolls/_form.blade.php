<div class="card-body">
    <div class="form-group">
        <x-form.select label="الموظف" name="employee_id" :options="$employees" :selected="$payroll->employee_id" />

    </div>



    <div class="form-group">
        <x-form.input
         type="month" 
         name="period"
        placeholder="ادخل عنوان المكافأة" 
        label="شهر"
         :value="old('period', $payroll->exists ? $payroll->period() : now()->format('Y-m'))" />
    </div>


    <div class="form-group">
        <label for="note"> الملاحظات </label>
        <textarea class="form-control
            @error('reason')
                is-invalid
            @enderror
            " id="note" name="note" rows="3" placeholder="أدخل الملاحظات"> {{ $payroll->note ?? '' }} </textarea>
        @error('note')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

   
</div>