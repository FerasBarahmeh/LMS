<tr>
    <td>{{ $instructor->id }}</td>
    <td>{{ $instructor->name }}</td>
    <td>{{ $instructor->username }}</td>
    <td>{{ $instructor->email }}</td>
    <td>{{ $instructor->privilege }}</td>
    <td><x-backend.status :status="$instructor->status"/></td>
    <td class="flex">
        @include('backend.layouts.table-options', ['id' => $instructor->id, 'status' => $instructor->status])
    </td>
</tr>
<x-backend.confirm-toggle-status :id="$instructor->id" :status="$instructor->status"/>
