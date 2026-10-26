@extends('role-permession::layouts.ui')

@section('title', 'Assign users')

@section('content')
    @php $namePrefix = config('role-permession.ui.route_name_prefix', 'role-permession.'); @endphp

    <div class="rp-card">
        <div class="rp-card-head">
            <h1>Assign roles to users</h1>
            <form method="GET" action="{{ route($namePrefix.'users.index') }}" class="rp-search">
                <input type="search" name="q" value="{{ $q }}" placeholder="Search name or email">
                <button type="submit" class="rp-btn rp-btn-secondary">Search</button>
            </form>
        </div>

        @if ($users->isEmpty())
            <div class="rp-empty">No users found.</div>
        @else
            <table class="rp-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Roles</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <strong>{{ $user->name ?? ('#'.$user->getKey()) }}</strong>
                                @if (! empty($user->email))
                                    <div style="color:var(--rp-muted);font-size:0.85rem;">{{ $user->email }}</div>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route($namePrefix.'users.update', $user->getKey()) }}" id="user-roles-{{ $user->getKey() }}">
                                    @csrf
                                    @method('PUT')
                                    <div style="display:flex;flex-wrap:wrap;gap:8px;">
                                        @forelse ($roles as $role)
                                            <label class="rp-choice" style="padding:6px 10px;">
                                                <input
                                                    type="checkbox"
                                                    name="roles[]"
                                                    value="{{ $role->id }}"
                                                    @checked($user->roles->contains('id', $role->id))
                                                >
                                                {{ $role->name }}
                                            </label>
                                        @empty
                                            <span class="rp-chip">No roles yet</span>
                                        @endforelse
                                    </div>
                                </form>
                            </td>
                            <td>
                                @if ($roles->isNotEmpty())
                                    <button type="submit" form="user-roles-{{ $user->getKey() }}" class="rp-btn rp-btn-primary rp-btn-sm">
                                        Save
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="padding:14px 20px;border-top:1px solid var(--rp-line);">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection
