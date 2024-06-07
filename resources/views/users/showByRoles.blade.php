@section('title', __('template.Roles'))

<x-app-layout>
    <x-group-cards title="{{ __('User Roles') }}"
                    routeCreate="{{ route('register') }}"
                    routeTitle="{{ __('template.User') }} {{ __('template.Register') }}"
                    >
        @foreach($roles as $role)
            <x-group-card :route="route('users.showByRole', ['role' => $role['name']])"
                          :title="$role['name']"
                          :subtitle="__('Users: ') . $role['user_count']"
                          :icon="asset('assets/icons/user/' . strtolower($role['name']) . '.svg')"
            />
        @endforeach
    </x-group-cards>
</x-app-layout>
