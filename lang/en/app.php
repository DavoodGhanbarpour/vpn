<?php

use App\Models\User;

return [
    'general' => [
        'link' => 'Link',
        'description' => 'Description',
        'title' => 'Title',
        'ip' => 'IP',
        'port' => 'Port',
        'date' => 'Date',
        'quota' => 'Quota',
        'debit' => 'Debit',
        'credit' => 'Credit',
        'days_remain' => ':count day(s) remains',
        'name' => 'Name',
        'email' => 'Email',
        'email_address' => 'Email address',
        'users_count' => 'Users count',
        'start_date' => 'Start date',
        'end_date' => 'End date',
        'subscription_price' => 'Subscription price/day',
    ],
    'messages' => [
        'server_has_children' => 'Server has inbounds connected to it',
    ],
    'login' => [
        'login_to_your_account' => 'Login to your account',
        'remember' => 'Remember me on this device',
        'sign_in' => 'Sign in',
    ],
    'passwords' => [
        'password' => 'Password',
        'show_password' => 'Show password',
        'hide_password' => 'Hide password',
        'generate_password' => 'Generate Password',
    ],
    'dashboard' => [
        'home' => 'Home',
        'enable_dark_mode' => 'Enable dark mode',
        'enable_light_mode' => 'Enable light mode',
        'built_with' => 'Built with the :title theme.',
        'rights_reserved' => 'All rights reserved.',
    ],
    'auth' => [
        'user' => 'User',
        'users' => 'Users',
        'role' => 'Role',
        'roles' => [
            User::CUSTOMER => 'Customer',
            User::CUSTOMER.'s' => 'Customers',
            User::ADMIN => 'Admin',
            User::ADMIN.'s' => 'Admins',
        ],
        'login' => 'Login',
        'logout' => 'Logout',
        'last_visit' => 'Last visit',
    ],
    'inbounds' => [
        'inbound' => 'Inbound',
        'inbounds' => 'Inbounds',
        'assign_inbounds' => 'Assign Inbound(s) to :user',
        'available_inbounds' => 'Available Inbound(s) (VPN configs)',
        'inbounds_in_use' => ':count Inbound(s) active',
        'inbounds_not_in_use' => ':count Inbound(s) idle',
        'inbounds_clients' => 'V2ray clients',
        'inbounds_count' => 'Inbounds count',
    ],
    'servers' => [
        'server' => 'Server',
        'servers' => 'Servers',
    ],
    'invoices' => [
        'invoice' => 'Invoice',
        'invoices' => 'Invoices',
    ],
    'pageComponents' => [
        'new' => 'New',
        'add' => 'Add',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'copy' => 'Copy',
        'actions' => 'Actions',
        'index' => 'Index',
        'submit' => 'Submit',
        'cancel' => 'Cancel',
        'copied' => 'Copied to clipboard',
        'not_copied' => 'Coping to clipboard failed',
    ],
    'platforms' => [
        'android' => 'Android',
        'windows' => 'Windows',
        'linux' => 'Linux',
        'ios' => 'IOS',
        'mac' => 'Mac',
    ],
];
