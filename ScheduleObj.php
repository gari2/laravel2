<?php
use App\Models\Person;
use App\Jobs\Myjob;
use Illuminate\Support\Facades\Storage;

class ScheduleObj
{
    private $person;

    public function __construct($id)
    {
        $this->person = Person::find($id);
    }

    public function __invoke()
    {
        Storage::append(
            'person_accesss_log.txt',
            $this->person->all_data
        );
        Myjob::dispatch($this->person);
        return 'true';
    }
}