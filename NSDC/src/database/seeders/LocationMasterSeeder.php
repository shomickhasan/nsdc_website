<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Division;
use App\Models\PostOffice;
use App\Models\Upazila;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class LocationMasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedDivisions();
        $this->seedDistricts();
        $this->seedUpazilas();
        $this->seedPostOffices();
    }

    private function seedDivisions(): void
    {
        $rows = $this->getJsonRows('divisions.json', 'divisions');

        foreach ($rows as $row) {
            Division::updateOrCreate(
                ['id' => $row['id']],
                [
                    'name' => $row['name'] ?? null,
                    'bn_name' => $row['bn_name'] ?? null,
                ]
            );
        }

        $this->command->info('Divisions seeded successfully.');
    }

    private function seedDistricts(): void
    {
        $rows = $this->getJsonRows('districts.json', 'districts');

        foreach ($rows as $row) {
            District::updateOrCreate(
                ['id' => $row['id']],
                [
                    'division_id' => $row['division_id'] ?? null,
                    'name' => $row['name'] ?? null,
                    'bn_name' => $row['bn_name'] ?? null,
                ]
            );
        }

        $this->command->info('Districts seeded successfully.');
    }

    private function seedUpazilas(): void
    {
        $rows = $this->getJsonRows('upazilas.json', 'upazilas');

        foreach ($rows as $row) {
            Upazila::updateOrCreate(
                ['id' => $row['id']],
                [
                    'district_id' => $row['district_id'] ?? null,
                    'name' => $row['name'] ?? null,
                    'bn_name' => $row['bn_name'] ?? null,
                ]
            );
        }

        $this->command->info('Upazilas seeded successfully.');
    }

    private function seedPostOffices(): void
    {
        $rows = $this->getJsonRows('postcodes.json', 'postcodes');

        foreach ($rows as $index => $row) {
            PostOffice::updateOrCreate(
                [
                    'id' => $row['id'] ?? ($index + 1),
                ],
                [
                    'upazila_id' => $row['upazila_id'] ?? null,
                    'name' => $row['postOffice'] ?? ($row['name'] ?? null),
                    'post_code' => $row['postCode'] ?? ($row['post_code'] ?? null),
                ]
            );
        }

        $this->command->info('Post Offices seeded successfully.');
    }

    private function getJsonRows(string $fileName, string $rootKey): array
    {
        $path = database_path('data/' . $fileName);

        if (!File::exists($path)) {
            $this->command->error("$fileName file not found.");
            return [];
        }

        $json = json_decode(File::get($path), true);

        if (!is_array($json)) {
            $this->command->error("Invalid JSON in $fileName");
            return [];
        }

        if (isset($json[$rootKey]) && is_array($json[$rootKey])) {
            return $json[$rootKey];
        }

        if (isset($json['data']) && is_array($json['data'])) {
            return $json['data'];
        }

        if (array_is_list($json)) {
            return $json;
        }

        $this->command->error("Invalid root key in $fileName. Expected '$rootKey'.");
        return [];
    }
}
