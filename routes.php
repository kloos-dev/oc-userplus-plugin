<?php

use RainLab\User\Models\User;

Route::get('/convert-user-names', function () {
    if (input('key') != '8tn63mwf') {
        return;
    }

    foreach (User::where('last_name_without_middlename')->take(100)->get() as $user) {
        $user->processMiddlename();
        $user->save();
    }
});