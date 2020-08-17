<?php namespace Codecycler\UserPlus\Classes\Helper;

class ProcessName
{
    protected $user;

    public $middlename = null;

    public $lastnameWithoutMiddlename = '';

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function getLastnameWithoutMiddlename()
    {
        $middlename = '';

        foreach (config('codecycler.userplus::middlenames') as $needle) {
            if (str_contains($this->user->surname, $needle) && strlen($needle) > strlen($middlename)) {
                $middlename = $needle;
            }
        }

        $lastnameWithoutMiddlename = str_replace($middlename, '', $this->user->surname);

        $this->lastnameWithoutMiddlename = $lastnameWithoutMiddlename;
        $this->middlename = $middlename;

        return $lastnameWithoutMiddlename;
    }
}