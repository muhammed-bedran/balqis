<?php

namespace App\Http\Controllers\RolePermession;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Melbedran\RolePermession\Models\Role;
use Melbedran\RolePermession\Support\AbilityManager;

class RoleController extends Controller
{
    public function index(AbilityManager $abilities): View
    {
        Gate::authorize('roles.view');

        $roles = Role::query()
            ->withCount('abilities')
            ->orderBy('name')
            ->get();

        return view('dashboard.pages.roles.index', [
            'roles' => $roles,
            'catalog' => $abilities->catalog(),
        ]);
    }

    public function create(AbilityManager $abilities): View
    {
        Gate::authorize('roles.create');

        return view('dashboard.pages.roles.create', [
            'catalog' => $abilities->catalog(),
            'grouped' => $this->groupAbilities($abilities->catalog()),
            'selected' => [],
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('roles.create');

        $data = $this->validated($request);

        Role::createWithAbilities($data);

        return redirect()
            ->route(config('role-permession.ui.route_name_prefix', 'role-permession.').'roles.index')
            ->with('role_permession_success', 'Role created successfully.');
    }

    public function edit(Role $role, AbilityManager $abilities): View
    {
        Gate::authorize('roles.update');

        $role->load('abilities');

        $selected = $role->abilities
            ->pluck('type', 'ability')
            ->all();

        return view('dashboard.pages.roles.edit', [
            'role' => $role,
            'catalog' => $abilities->catalog(),
            'grouped' => $this->groupAbilities($abilities->catalog()),
            'selected' => $selected,
        ]);
    }

    public function update(Request $request, Role $role): RedirectResponse
    {
        Gate::authorize('roles.update');

        $data = $this->validated($request);

        $role->updateWithAbilities($data);

        return redirect()
            ->route(config('role-permession.ui.route_name_prefix', 'role-permession.').'roles.index')
            ->with('role_permession_success', 'Role updated successfully.');
    }

    public function destroy(Role $role): RedirectResponse
    {
        Gate::authorize('roles.delete');

        $role->abilities()->delete();
        $role->delete();

        return redirect()
            ->route(config('role-permession.ui.route_name_prefix', 'role-permession.').'roles.index')
            ->with('role_permession_success', 'Role deleted successfully.');
    }

    /**
     * @return array{name: string, abilities: array<string, string>}
     */
    protected function validated(Request $request): array
    {
        $catalog = array_keys(config('role-permession.abilities', []));

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'abilities' => ['nullable', 'array'],
            'abilities.*' => ['in:allow,deny,inherit'],
        ]);

        $abilities = [];
        foreach ($catalog as $code) {
            $abilities[$code] = $data['abilities'][$code] ?? 'inherit';
        }

        return [
            'name' => $data['name'],
            'abilities' => $abilities,
        ];
    }

    /**
     * @param  array<string, string>  $catalog
     * @return array<string, array<string, string>>
     */
    protected function groupAbilities(array $catalog): array
    {
        $grouped = [];

        foreach ($catalog as $code => $label) {
            $group = str_contains($code, '.')
                ? str($code)->before('.')->headline()->toString()
                : 'General';

            $grouped[$group][$code] = $label;
        }

        return $grouped;
    }
}
