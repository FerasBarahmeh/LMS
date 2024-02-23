<x-card-simple-collapse :id="'collapseTechnicalSkills'" :title="'Technical Skill'"
                        class="pt-10">
    <x-slot name="icon">
        <i class="fa fa-microchip"></i>
    </x-slot>
    <livewire:add-skills-user :type="TypeSkills::Technical->value"/>
</x-card-simple-collapse>
