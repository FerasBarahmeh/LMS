<?php

namespace App\Livewire;

use App\Enums\TypeSkills;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AddSkillsUser extends Component
{
    /**
     * @var array<'key','value'>
     */
    public array $tags = [];

    public int $count = 0;

    public string $tag = '';

    public bool $saved = false;

    public string $type;

    public string $message;

    public function mount(): void
    {
        $this->tags =
            $this->type == TypeSkills::Technical->value
                ? user()->technicalSkills->pluck('name')->toArray()
                : user()->softSkills->pluck('name')->toArray();

        $this->count = count($this->tags);
    }

    public function add(): void
    {
        $this->tag = !in_array($this->tag, $this->tags) ? $this->tag : '';

        if ($this->tag != null) {
            $this->tags[$this->count] = $this->tag;
            $this->count++;
            $this->tag = '';
        }

    }

    public function remove($key): void
    {
        unset($this->tags[$key]);
    }

    public function save(): void
    {
        $skills = array_map(function ($tag) {
            return [
                'user_id' => user()->id,
                'type' => $this->type,
                'name' => $tag,
            ];
        }, $this->tags);

        if ($this->type == TypeSkills::Technical->value) {
            user()->technicalSkills()->delete();
        }else {
            user()->softSkills()->delete();
        }

        user()->skills()->createMany($skills);

        $this->saved = true;
        $this->message = 'Success changed your skills';
    }

    public function render(): View
    {
        return view('livewire.add-skills-user');
    }
}
