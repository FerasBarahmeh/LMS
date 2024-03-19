<tr>
    <td><a href="#">Preview</a></td>
{{--    @dd($attachment->media->first()->human_readable_size)--}}
    <td class="tx-right tx-medium tx-inverse">{{ AttachmentType::name($attachment->type_attachment) }}</td>
{{--    <td class="tx-right tx-medium tx-inverse">{{ $attachment->media->first()->human_readable_size }}</td>--}}
    <td class="tx-right tx-medium tx-inverse">{{ $attachment->media->first->size }}</td>
    <td class="tx-right tx-medium tx-inverse">{{ diffForHumans($attachment->created_at) }}</td>
    <td class="tx-right tx-medium tx-danger cursor-pointer"
        wire:click="rid('{{$attachment->id}}')"
        @click="openAttachedSection = true">
        Replace
    </td>
</tr>
