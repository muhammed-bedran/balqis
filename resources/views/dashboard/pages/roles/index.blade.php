@extends('layouts.dashboard.index')

@section('title', 'Roles')

@section('content')
    @include('dashboard.pages.roles._styles')
    <div class="rp-card">
        <div class="rp-card-head">
            <h1>Roles</h1>
            <div style="display:flex;gap:8px;flex-wrap:wrap;">
                @canAbility('roles.update')
                    <a class="rp-btn rp-btn-secondary" href="{{ route(config('role-permession.ui.route_name_prefix', 'role-permession.') . 'users.index') }}">
                        Assign roles
                    </a>
                @endcanAbility
                @canAbility('roles.create')
                    <a class="rp-btn rp-btn-primary" href="{{ route(config('role-permession.ui.route_name_prefix', 'role-permession.') . 'roles.create') }}">
                        New role
                    </a>
                @endcanAbility
            </div>
        </div>

        @if ($roles->isEmpty())
            <div class="rp-empty">No roles yet. Create the first role to assign abilities.</div>
        @else
            <table class="rp-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Abilities</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td><strong>{{ $role->name }}</strong></td>
                            <td>{{ $role->abilities_count }} set</td>
                            <td>
                                <div class="rp-actions">
                                    @canAbility('roles.update')
                                        <a class="rp-btn rp-btn-secondary rp-btn-sm"
                                           href="{{ route(config('role-permession.ui.route_name_prefix', 'role-permession.') . 'roles.edit', $role) }}">
                                            Edit
                                        </a>
                                    @endcanAbility
                                    @canAbility('roles.delete')
                                        <form method="POST"
                                              action="{{ route(config('role-permession.ui.route_name_prefix', 'role-permession.') . 'roles.destroy', $role) }}"
                                              onsubmit="return confirm('Delete this role?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rp-btn rp-btn-danger rp-btn-sm">Delete</button>
                                        </form>
                                    @endcanAbility
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
