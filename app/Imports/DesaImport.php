<?php

namespace App\Imports;

use App\Models\Desa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class DesaImport implements ToModel, WithValidation
{
    public function model(array $row)
    {

        return Desa::updateOrCreate(
            ['kecamatan_id' => $row['kecamatan_id']] , // Data yang diimpor ke kolom kecamatan_id
            ['desa' => $row['desa']]  // Mencari desa berdasarkan nama
            
        );
    }

    public function rules(): array
    {
        return [
            'kecamatan_id' => ['required', 'exists:kecamatans,id'],  // Validasi kecamatan_id harus ada di tabel kecamatans
            'desa' => ['required', 'string', 'max:255']
            
        ];
    }
}


