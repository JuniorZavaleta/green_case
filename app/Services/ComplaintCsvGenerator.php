<?php

namespace App\Services;

/**
 * Csv generator for complaints
 * @author Junior Zavaleta
 * @version 1.0
 */
class ComplaintCsvGenerator extends CsvGenerator
{
    public function __construct()
    {
        $this->titles = '"Id", "Tipo contaminacion", "Distrito", "Estado", "Fecha de registro"';
        $this->filename = storage_path('app/csv/casos_'.date('d_m_Y_H_i_s').'.csv');
        $this->query = "
            SELECT complaints.id, contamination_types.description, districts.name, complaint_states.description, complaints.created_at
            FROM complaints
            JOIN contamination_types ON complaints.type_contamination_id = contamination_types.id
            JOIN districts ON complaints.district_id = districts.id
            JOIN complaint_states ON complaints.complaint_state_id = complaint_states.id
        ";
    }
}