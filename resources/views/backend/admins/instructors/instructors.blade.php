<tr>
    <td>{{ $instructor->id }}</td>
    <td>{{ $instructor->name }}</td>
    <td>{{ $instructor->username }}</td>
    <td>{{ $instructor->email }}</td>
    <td>{{ $instructor->privilege }}</td>
    <td class="text-center position-relative"><x-backend.status :status="$instructor->status" :style="'pulse'"/></td>
    <td class="flex">
        @include('backend.layouts.table-options', ['id' => $instructor->id, 'status' => $instructor->status])
    </td>
</tr>
<x-backend.users.confirm-toggle-status :id="$instructor->id" :status="$instructor->status"/>

@include('backend.admins.instructors.widget-information', ['user' => $instructor])
