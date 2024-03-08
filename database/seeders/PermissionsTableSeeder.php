<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'waiting_list_create',
            ],
            [
                'id'    => 18,
                'title' => 'waiting_list_edit',
            ],
            [
                'id'    => 19,
                'title' => 'waiting_list_show',
            ],
            [
                'id'    => 20,
                'title' => 'waiting_list_delete',
            ],
            [
                'id'    => 21,
                'title' => 'waiting_list_access',
            ],
            [
                'id'    => 22,
                'title' => 'landing_page_create',
            ],
            [
                'id'    => 23,
                'title' => 'landing_page_edit',
            ],
            [
                'id'    => 24,
                'title' => 'landing_page_show',
            ],
            [
                'id'    => 25,
                'title' => 'landing_page_delete',
            ],
            [
                'id'    => 26,
                'title' => 'landing_page_access',
            ],
            [
                'id'    => 27,
                'title' => 'campaign_create',
            ],
            [
                'id'    => 28,
                'title' => 'campaign_edit',
            ],
            [
                'id'    => 29,
                'title' => 'campaign_show',
            ],
            [
                'id'    => 30,
                'title' => 'campaign_delete',
            ],
            [
                'id'    => 31,
                'title' => 'campaign_access',
            ],
            [
                'id'    => 32,
                'title' => 'ai_create',
            ],
            [
                'id'    => 33,
                'title' => 'ai_edit',
            ],
            [
                'id'    => 34,
                'title' => 'ai_show',
            ],
            [
                'id'    => 35,
                'title' => 'ai_delete',
            ],
            [
                'id'    => 36,
                'title' => 'ai_access',
            ],
            [
                'id'    => 37,
                'title' => 'quiz_create',
            ],
            [
                'id'    => 38,
                'title' => 'quiz_edit',
            ],
            [
                'id'    => 39,
                'title' => 'quiz_show',
            ],
            [
                'id'    => 40,
                'title' => 'quiz_delete',
            ],
            [
                'id'    => 41,
                'title' => 'quiz_access',
            ],
            [
                'id'    => 42,
                'title' => 'quiz_answer_create',
            ],
            [
                'id'    => 43,
                'title' => 'quiz_answer_edit',
            ],
            [
                'id'    => 44,
                'title' => 'quiz_answer_show',
            ],
            [
                'id'    => 45,
                'title' => 'quiz_answer_delete',
            ],
            [
                'id'    => 46,
                'title' => 'quiz_answer_access',
            ],
            [
                'id'    => 47,
                'title' => 'engagement_create',
            ],
            [
                'id'    => 48,
                'title' => 'engagement_edit',
            ],
            [
                'id'    => 49,
                'title' => 'engagement_show',
            ],
            [
                'id'    => 50,
                'title' => 'engagement_delete',
            ],
            [
                'id'    => 51,
                'title' => 'engagement_access',
            ],
            [
                'id'    => 52,
                'title' => 'report_create',
            ],
            [
                'id'    => 53,
                'title' => 'report_edit',
            ],
            [
                'id'    => 54,
                'title' => 'report_show',
            ],
            [
                'id'    => 55,
                'title' => 'report_delete',
            ],
            [
                'id'    => 56,
                'title' => 'report_access',
            ],
            [
                'id'    => 57,
                'title' => 'survey_access',
            ],
            [
                'id'    => 58,
                'title' => 'payment_create',
            ],
            [
                'id'    => 59,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 60,
                'title' => 'payment_show',
            ],
            [
                'id'    => 61,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 62,
                'title' => 'payment_access',
            ],
            [
                'id'    => 63,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
