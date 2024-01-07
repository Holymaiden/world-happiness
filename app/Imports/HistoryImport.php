<?php

namespace App\Imports;

use App\Models\Negara;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeImport;

class HistoryImport implements ToModel, WithHeadingRow, WithChunkReading, ShouldQueue
{
    use Importable;

    public $asiaCountry = [
        'Afghanistan',
        'Armenia',
        'Azerbaijan',
        'Bahrain',
        'Bangladesh',
        'Bhutan',
        'Brunei',
        'Kamboja',
        'Tiongkok',
        'Siprus',
        'Georgia',
        'India',
        'Indonesia',
        'Iran',
        'Irak',
        'Israel',
        'Jepang',
        'Yordania',
        'Kazakhstan',
        'Kuwait',
        'Kirgistan',
        'Laos',
        'Lebanon',
        'Malaysia',
        'Maladewa',
        'Mongolia',
        'Myanmar',
        'Nepal',
        'Korea Utara',
        'Oman',
        'Pakistan',
        'Palestina',
        'Filipina',
        'Qatar',
        'Arab Saudi',
        'Singapura',
        'Korea Selatan',
        'Sri Lanka',
        'Suriah',
        'Tajikistan',
        'Thailand',
        'Timor Leste',
        'Turki',
        'Turkmenistan',
        'United Arab Emirates',
        'Uzbekistan',
        'Vietnam',
        'Yaman',
        'Taiwan',
        'Kuwait'
    ];

    /**
     * @param array $row
     */
    public function model(array $row)
    {
        if (!$this->checkIfAsiaCountry($row)) {
            return;
        }

        // Get If exist negara or create
        $negara = Negara::firstOrCreate([
            'nama' => $row['country_or_region']
        ]);

        $negara->regresi()->create([
            'tahun' => $row['year'],
            'ekonomi' => $row['gdp_per_capita'],
            'kesehatan' => $row['healthy_life_expectancy'],
            'kebebasan' => $row['freedom_to_make_life_choices'],
            'score' => $row['score']
        ]);
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function registerEvents(): array
    {
        return [
            AfterImport::class => function () {
                DB::commit();
            },

            BeforeImport::class => function () {
                DB::beginTransaction();
            },
        ];
    }

    public function checkIfAsiaCountry($row): bool
    {
        return in_array($row['country_or_region'], $this->asiaCountry);
    }
}
