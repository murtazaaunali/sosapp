<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'title' => 'Received Letter of Interest',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        DB::table('tasks')->insert([
            'title' => 'Interview and give tour to potential franchisee',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        DB::table('tasks')->insert([
            'title' => 'Franchisee Signs Confidentiality Statement',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        DB::table('tasks')->insert([
            'title' => 'We give them the Franchise Disclosure Document',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        DB::table('tasks')->insert([
            'title' => 'Potential Franchisee Signs Exhibtt J: Acknowledgment of Receipt',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        DB::table('tasks')->insert([
            'title' => 'We host Discovery Day',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        DB::table('tasks')->insert([
            'title' => 'Franchisee signs Franchise Disclosure Document',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'We supply Franchisee with Company Email, Pre-opening Checklist, Decor Ideas, BCBA Interview Questionnaire, Employment Application, Job Listing Descriptions',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'We send them Referral to Quickbooks',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'We send them Referral to RingCentral, suggest Phone from Amazon',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
       
        DB::table('tasks')->insert([
            'title' => 'Send Referral to Catalyst',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
       
        DB::table('tasks')->insert([
            'title' => 'Franchisee secure a lease within 90 days of signing Franchise Disclosure Document.',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => 'Franchisee give us a copy of the lease within five business days after it is signed',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'Franchisee turns in Schedule 8: Collateral Assignment of Lease signed by Landlord.',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'After all construction is complete, Franchisee Returns signed copy of schedule 5 ADA and related certifications',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'After opening Bank Account, Franchisee Returns schedule 1 ACH Debit Form',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'Franchisee Returns proof of all necessary business licenses, permits, certifications',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'Franchisee Completes 8 day initial training program (within 90 days of signing the FDD and within 60 days of opening the center)',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
        
        DB::table('tasks')->insert([
            'title' => 'Franchisee Returns proof of all necessary business licenses, permits, certifications',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);

        DB::table('tasks')->insert([
            'title' => 'Franchise location opens within 180 days of signing Franchise Agreement',
            'type' => 'franchise',
            'src' => '',
            'description' => '',
            'comment' => '',
            'status' => 0,
            'created_at' => NOW(),
            'updated_at' => NOW(),
        ]);
    }
}
