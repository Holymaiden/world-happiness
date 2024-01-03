<?php

namespace App\Services\Contracts;

interface RegresiContract
{
        public function __construct(string $tahun, string $orderBy);

        public function paginated(int $per_page);

        public function data(int $per_page);

        public function sum();

        public function regresi();

        public function prediction(int $per_page);

        public function getStatistic();
}
