@php
    $namePrefix = config('role-permession.ui.route_name_prefix', 'role-permession.');
@endphp

<div class="rp-field">
    <label for="name">Role name</label>
    <input id="name" type="text" name="name" value="{{ old('name', $role->name ?? '') }}" required maxlength="255" placeholder="e.g. Editor">
</div>

<div class="rp-field">
    <label>Abilities</label>
    <p style="margin:0 0 12px;color:var(--rp-muted);font-size:0.92rem;">
        Choose <strong>Allow</strong>, <strong>Deny</strong>, or leave as <strong>Inherit</strong> (not stored).
    </p>

    @foreach ($grouped as $group => $abilities)
        <div class="rp-group">
            <div class="rp-group-title">{{ $group }}</div>
            @foreach ($abilities as $code => $label)
                @php
                    $current = old("abilities.$code", $selected[$code] ?? 'inherit');
                @endphp
                <div class="rp-ability">
                    <div>
                        <strong>{{ $label }}</strong>
                        <span class="rp-ability-code">{{ $code }}</span>
                    </div>
                    <label class="rp-choice">
                        <input type="radio" name="abilities[{{ $code }}]" value="allow" @checked($current === 'allow')>
                        Allow
                    </label>
                    <label class="rp-choice">
                        <input type="radio" name="abilities[{{ $code }}]" value="deny" @checked($current === 'deny')>
                        Deny
                    </label>
                    <label class="rp-choice">
                        <input type="radio" name="abilities[{{ $code }}]" value="inherit" @checked($current === 'inherit')>
                        Inherit
                    </label>
                </div>
            @endforeach
        </div>
    @endforeach

    @if (empty($grouped))
        <div class="rp-empty">
            No abilities in <code>config/role-permession.php</code>. Add your catalog there first.
        </div>
    @endif
</div>
