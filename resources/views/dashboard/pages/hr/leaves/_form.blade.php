<div class="card-body">
    <div class="form-group">
        <x-form.select label="الموظف" name="employee_id" :options="$employees" :selected="$leave->employee_id" />

    </div>

    <div class="form-group">
        <x-form.select label="نوع الإجازة" name="type" :options="[
        'annual' => 'إجازة سنوية',
        'sick' => 'إجازة مرضية',
        'emergency' => 'إجازة طارئة',
        'unpaid' => 'إجازة بدون أجر',
    ]" :selected="$leave->type ?? '' " />
    </div>
    <div class="form-group">
        <x-form.input type="date" id="start_date" name="start_date" placeholder="ادخل تاريخ بداية الإجازة" label="تاريخ بداية الإجازة"
            :value="$leave->start_date ?? ''" />
    </div>
    <div class="form-group">
        <x-form.input type="date" id="end_date" name="end_date" placeholder="ادخل تاريخ نهاية الإجازة" label="تاريخ نهاية الإجازة"
            :value="$leave->end_date ?? ''" />
    </div>
    <div class="form-group">
        <label for="reason"> السبب</label>
        <textarea class="form-control
        @error('reason')
            is-invalid
        @enderror
        " id="reason" name="reason" rows="3" placeholder="أدخل سبب الإجازة"> {{ $leave->reason ?? '' }} </textarea>
        @error('reason')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
@push('scripts')
    <script>
        (function () {
            const startDate = document.getElementById('start_date');
            const endDate = document.getElementById('end_date');
            if (!startDate || !endDate) {
                return;
            }
            function syncEndDateMin() {
                if (!startDate.value) {
                    endDate.removeAttribute('min');
                    return;
                }
                endDate.min = startDate.value;
                if(endDate.value && endDate.value <startDate.value)
                {
                    endDate.value = '';
                }
            }
            startDate.addEventListener('change', syncEndDateMin);
            syncEndDateMin();
        })();
    </script>
@endpush