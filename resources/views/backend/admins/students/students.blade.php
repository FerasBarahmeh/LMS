<tr>
    <td>{{ $instructor->id }}</td>
    <td>{{ $instructor->name }}</td>
    <td>{{ $instructor->username }}</td>
    <td>{{ $instructor->email }}</td>
    <td>{{ $instructor->privilege }}</td>
    <td class="text-center position-relative">
        <x-backend.status :status="$instructor->status" :style="'pulse'"/>
    </td>
    <td class="flex">
        @include('backend.layouts.users.table-options', ['id' => $instructor->id, 'status' => $instructor->status, 'upgrade' => true])
    </td>
</tr>
{{--<x-backend.users.confirm-toggle-status :id="$instructor->id" :status="$instructor->status"/>--}}
@include('backend.admins.users.confirm-toggle-status', ['id' => $instructor->id, 'status' => $instructor->sataus])
@include('backend.admins.instructors.widget-information', ['user' => $instructor])
@include('backend.admins.users.confirm-migrate-to-instructor', ['id' => $instructor->id, 'user' => $instructor])
@include('backend.admins.users.confirm-migrate-to-student', ['id' => $instructor->id, 'user' => $instructor])
