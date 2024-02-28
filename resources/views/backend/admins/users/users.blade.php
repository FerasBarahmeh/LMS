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
        @include('backend.layouts.users.table-options', [
            'id' => $user->id,
            'status' =>$user->status,
            'upgrade' => $user->privilege == Privileges::Student->value,
            'downgrade' => $user->privilege == Privileges::Instructor->value
            ])
    </td>
</tr>

@include('backend.admins.users.confirm-toggle-status', ['id' => $user->id, 'status' => $user->status])
@include('backend.admins.instructors.widget-information', ['user' => $user])
@include('backend.admins.users.confirm-migrate-to-instructor', ['id' => $user->id, 'username' => $user->username])
@include('backend.admins.users.confirm-migrate-to-student', ['id' => $user->id, 'username' => $user->username])
