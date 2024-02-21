<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->username }}</td>
    <td>{{ $user->email }}</td>
    <td>{{ $user->privilege }}</td>
    <td class="text-center position-relative">
        <x-backend.status :status="$user->status" :style="'pulse'"/>
    </td>
    <td class="flex">
        @include('backend.layouts.users.table-options', ['id' => $user->id, 'status' => $user->status])
    </td>
</tr>
<x-backend.users.confirm-toggle-status :id="$user->id" :status="$user->status"/>

@include('backend.admins.instructors.widget-information', ['user' => $user])
