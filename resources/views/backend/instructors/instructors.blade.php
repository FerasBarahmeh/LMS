<tr>
    <td>{{ $instructor->id }}</td>
    <td>{{ $instructor->name }}</td>
    <td>{{ $instructor->username }}</td>
    <td>{{ $instructor->email }}</td>
    <td>{{ $instructor->privilege }}</td>
    <td><x-backend.status :status="$instructor->status"/></td>
    <td class="flex ">
        <div class="options flex gap-5">
            <button class="btn p-0 option pointer ml-2 mr-2">
                <i class="fa fa-trash text-danger"></i>
            </button>
            <button class="btn p-0 option pointer ml-2 mr-2" data-placement="top" data-toggle="tooltip-primary" title="Tooltip on top">
                <i class="fa fa-edit text-success"></i>
            </button>
            <button class="btn p-0 option pointer ml-2 mr-2">
                <i class="fa fa-toggle-on text-warning"></i>
            </button>
        </div>
    </td>
</tr>
