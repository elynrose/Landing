<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'verified'                     => 'Verified',
            'verified_helper'              => ' ',
            'verified_at'                  => 'Verified at',
            'verified_at_helper'           => ' ',
            'verification_token'           => 'Verification token',
            'verification_token_helper'    => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
            'paid'                         => 'Paid',
            'paid_helper'                  => ' ',
            'expiry'                       => 'Expiry',
            'expiry_helper'                => ' ',
        ],
    ],
    'waitingList' => [
        'title'          => 'Waiting List',
        'title_singular' => 'Waiting List',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'first_name'          => 'First Name',
            'first_name_helper'   => ' ',
            'last_name'           => 'Last Name',
            'last_name_helper'    => ' ',
            'email'               => 'Email',
            'email_helper'        => ' ',
            'phone_number'        => 'Phone Number',
            'phone_number_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'landing_page'        => 'Landing Page',
            'landing_page_helper' => ' ',
        ],
    ],
    'landingPage' => [
        'title'          => 'Landing Page',
        'title_singular' => 'Landing Page',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'title'                       => 'Title',
            'title_helper'                => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
            'created_by'                  => 'Created By',
            'created_by_helper'           => ' ',
            'description'                 => 'Description',
            'description_helper'          => ' ',
            'heading'                     => 'Heading',
            'heading_helper'              => ' ',
            'sub_heading'                 => 'Sub Heading',
            'sub_heading_helper'          => ' ',
            'banner_image'                => 'Banner Image',
            'banner_image_helper'         => ' ',
            'introduction'                => 'Introduction',
            'introduction_helper'         => ' ',
            'about'                       => 'About',
            'about_helper'                => ' ',
            'photo'                       => 'Photo',
            'photo_helper'                => ' ',
            'facebook'                    => 'Facebook',
            'facebook_helper'             => ' ',
            'twitter'                     => 'Twitter',
            'twitter_helper'              => ' ',
            'linkedin'                    => 'Linkedin',
            'linkedin_helper'             => ' ',
            'confirmation_message'        => 'Confirmation Message',
            'confirmation_message_helper' => ' ',
            'discord'                     => 'Discord',
            'discord_helper'              => ' ',
            'countdown'                   => 'Countdown',
            'countdown_helper'            => ' ',
        ],
    ],
    'campaign' => [
        'title'          => 'Campaigns',
        'title_singular' => 'Campaign',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'list'                => 'List',
            'list_helper'         => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'body'                => 'Body',
            'body_helper'         => ' ',
            'link'                => 'Link',
            'link_helper'         => ' ',
            'label'               => 'Label',
            'label_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'subject'             => 'Subject',
            'subject_helper'      => ' ',
            'header_image'        => 'Header Image',
            'header_image_helper' => ' ',
        ],
    ],
    'ai' => [
        'title'          => 'AI',
        'title_singular' => 'AI',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'landing_page'           => 'Landing Page',
            'landing_page_helper'    => ' ',
            'campaign'               => 'Campaign',
            'campaign_helper'        => ' ',
            'recommendations'        => 'Recommendations',
            'recommendations_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'quiz' => [
        'title'          => 'Quiz',
        'title_singular' => 'Quiz',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'point'               => 'Point',
            'point_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'question'            => 'Question',
            'question_helper'     => ' ',
            'landing_page'        => 'Landing Page',
            'landing_page_helper' => ' ',
        ],
    ],
    'quizAnswer' => [
        'title'          => 'Quiz Answers',
        'title_singular' => 'Quiz Answer',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'quiz'              => 'Quiz',
            'quiz_helper'       => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'answer'            => 'Answer',
            'answer_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'engagement' => [
        'title'          => 'Engagement',
        'title_singular' => 'Engagement',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'campaign'            => 'Campaign',
            'campaign_helper'     => ' ',
            'email_encode'        => 'Unique ID',
            'email_encode_helper' => ' ',
            'open'                => 'Open',
            'open_helper'         => ' ',
            'click'               => 'Click',
            'click_helper'        => ' ',
            'ip_address'          => 'IP Address',
            'ip_address_helper'   => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'report' => [
        'title'          => 'Reports',
        'title_singular' => 'Report',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'campaign'               => 'Campaign',
            'campaign_helper'        => ' ',
            'total_sent'             => 'Total Sent',
            'total_sent_helper'      => ' ',
            'total_delivered'        => 'Total Delivered',
            'total_delivered_helper' => ' ',
            'total_bounced'          => 'Total Bounced',
            'total_bounced_helper'   => ' ',
            'opens'                  => 'Opens',
            'opens_helper'           => ' ',
            'clicks'                 => 'Clicks',
            'clicks_helper'          => ' ',
            'ip_address'             => 'IP Address',
            'ip_address_helper'      => ' ',
            'unique_clicks'          => 'Unique Clicks',
            'unique_clicks_helper'   => ' ',
            'unique_opens'           => 'Unique Opens',
            'unique_opens_helper'    => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
        ],
    ],
    'survey' => [
        'title'          => 'Research',
        'title_singular' => 'Research',
    ],
    'payment' => [
        'title'          => 'Payments',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'stripe_transaction'        => 'Stripe Transaction',
            'stripe_transaction_helper' => ' ',
            'amount_paid'               => 'Amount Paid',
            'amount_paid_helper'        => ' ',
            'credit'                    => 'Credit',
            'credit_helper'             => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],

];
