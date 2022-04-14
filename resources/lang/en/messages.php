<?php

return [
    'common'  => [
        'success' => 'Success',
    ],
    'auth'    => [
        'forgot'       => 'An email with verification code was just sent to :email',
        'password'     => 'Your password has been successfully changed.',
        'gsm'          => 'Your phone number has been successfully changed.',
        'success'      => 'Successfully logged in',
        'logout'       => 'Successfully logouted',
        'reset'        => 'Your password has been reset successfully. You can login now.',
        'notification' => 'Notification preferences have been updated.',
        'email-change'   => [
            'success' => 'Your e-mail has been successfully updated.',
        ],
        'sms-change'   => [
            'success' => 'Your phone number is verified.',
        ],
        'forget-password' => 'Password reset instructions have been sent.',
        'change-password' => 'Your password has been successfully changed.',
    ],
    'crud'    => [
        'store'   => ':title was successfully created.',
        'update'  => ':title was successfully updated.',
        'destroy' => ':title was successfully deleted.',
        'cancel' => ':title was successfully cancel.',

        'detach' => ':title2 detached.',
        'order'  => ':title order updated.',

        'queue' => ':title has been successfully queued.',

    ],
    'user' => [
        'sms'   => [
            'verify'  => 'Your verification code has been sent to your gsm number.',
        ],
        'meet' => [
            'success' => 'Your email has been successfully sent.'
        ],
        'card' => [
            'delete' => [
                'success' => 'Your card has been successfully deleted.',
            ],
        ],
    ],
    'walker' => [
        'walk' => [
            'cancel-success' => 'Your Walk has been successfully cancel.',
            'action-success' => 'Your Walk action has been successfully.',
        ],
    ],
    'booking' => [
        'cancel'        => 'Your booking has been cancelled',
        'cancel_title'  => 'Thank you for cancelling in advance!',
        'cancel_content'=> 'If your walker is confirmed and you have less than 12 hours for the walk, you will be charged £:money cancellation fee.',
        'not-amount'        => 'Payment was not received',
    ],
    'payout' => [
        'awaiting' => 'Awaiting',
    ],
    'edit' => [
        'title'       => 'Reschedule a New Walk Within:',
        'content_1'   => 'If you reschedule your booking 12 hours\' before your booking time there is no rescheduling fee.',
        'content_2'   => 'To Avoid £:price Cancellation Fee',
        'content_3'   => 'Less than 12 hours your booking.if you reschedule now you\'ve yo pay £:price',
    ],
    'track' => [
        'track_walk' => ':dog_name has just been picked up!',
        'see_report' => ':dog_name is back home safe and tired after their walk!',
    ],
    'sms' => [
        'verify_code' => 'Your sms verification code',
    ],
];
