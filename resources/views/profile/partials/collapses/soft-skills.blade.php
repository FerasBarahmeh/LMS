<x-card-simple-collapse :id="'collapseSoftSkills'" :title="'Soft Skill'"
                        class="pt-10">
    <x-slot name="icon">
        <i class="fa fa-tty"></i>
    </x-slot>
    <livewire:add-skills-user :type="TypeSkills::Soft->value"/>
</x-card-simple-collapse>
