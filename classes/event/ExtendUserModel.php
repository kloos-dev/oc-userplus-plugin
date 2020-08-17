<?php namespace Codecycler\UserPlus\Classes\Event;

use Codecycler\UserPlus\Classes\Helper\ProcessName;
use RainLab\User\Models\User;

class ExtendUserModel
{
    protected $model;

    public function subscribe()
    {
        User::extend(function ($model) {
            $this->model = $model;

            $model->addDynamicMethod('processMiddlename', function () {
                $helper = new ProcessName($this->model);

                $helper->getLastnameWithoutMiddlename();

                $this->model->middlename = $helper->middlename;
                $this->model->last_name_without_middlename = $helper->lastnameWithoutMiddlename;
            });

            $model->bindEvent('model.beforeSave', function () use ($model) {
                $model->processMiddlename();
            });
        });
    }
}