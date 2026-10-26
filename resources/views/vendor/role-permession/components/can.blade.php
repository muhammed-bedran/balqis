@props([
    'ability' => null,
    'any' => null,
    'all' => null,
])

@php
    $manager = app(\Melbedran\RolePermession\Support\AbilityManager::class);
    $user = auth()->user();
    $allowed = true;

    if ($ability) {
        $allowed = $manager->userAllows($user, $ability);
    } elseif ($any) {
        $allowed = collect(\Illuminate\Support\Arr::wrap($any))
            ->contains(fn ($code) => $manager->userAllows($user, $code));
    } elseif ($all) {
        $allowed = collect(\Illuminate\Support\Arr::wrap($all))
            ->every(fn ($code) => $manager->userAllows($user, $code));
    }
@endphp

@if ($allowed)
    {{ $slot }}
@endif
