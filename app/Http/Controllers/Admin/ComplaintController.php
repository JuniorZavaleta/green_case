<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;

use App\Models\Complaint;
use App\Models\ComplaintStatus;
use App\Models\District;
use App\Models\ContaminationType;

use Csv\CsvGenerator;

/**
 * ComplaintController is a class that manage the complaints applying filters
 * if the user is authority or admin
 *
 * @package App\Http\Controllers\Admin
 * @author Junior Zavaleta
 * @version 1.0
 */
class ComplaintController extends Controller
{
    protected $per_page;

    public function __construct()
    {
        $this->per_page = 20;
    }

    /**
     * List the last 20 complaints applying filter like
     *     User logged
     *     Contamination type
     *     Status
     *     District
     *     Registered between dates
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::guard('admin')->user();
        $status = ComplaintStatus::pluck('description', 'id');
        $districts = $user->is_admin ? District::orderBy('name')->pluck('name', 'id') : [];
        $contamination_types = ContaminationType::orderBy('description')->pluck('description', 'id');

        $complaints = $this->filter($user);

        return view('admin.complaints.index', compact(
            'complaints', 'status', 'districts', 'contamination_types', 'user'
        ));
    }

    /**
     * Filter the complaints with the input of the request and the user logged
     * @param  App\Models\User $user user logged
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function filter($user)
    {
        $query = Complaint::with('district', 'contamination_type', 'status');

        if (!$user->is_admin) {
            $query->where('district_id', session('district_id'))->completed();
        }

        if (request('distrito')) {
            $query->whereHas('district', function ($q) {
                $q->where('name', request('distrito'));
            });
        }

        if (request('tipo_contaminacion')) {
            $query->whereHas('contamination_type', function ($q) {
                $q->where('description', request('tipo_contaminacion'));
            });
        }

        if (request('estado')) {
            $query->whereHas('status', function ($q) {
                $q->where('description', request('estado'));
            });
        }

        if (request('desde')) {
            $from = Carbon::createFromFormat('d/m/Y', request('desde'))->startOfDay();

            $query->where('created_at', '>=', $from);
        }

        if (request('hasta')) {
            $to = Carbon::createFromFormat('d/m/Y', request('hasta'))->endOfDay();

            $query->where('created_at', '<=', $to);
        }

        $query->latest('complaints.id');

        return $query->paginate($this->per_page)->appends(request()->except('page'));
    }

    /**
     * Show the complaint selected
     * @param  Complaint $complaint complaint selected
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        if (session('district_id')) {
            if ($complaint->district_id != session('district_id')) {
                return redirect()->route('admin.complaint.index')
                    ->with('access_denied', 'Acceso Inválido');
            }
        }

        return view('admin.complaints.show', compact('complaint'));
    }

    /**
     * Export a CSV file with the same behavior as index
     * @return \Illuminate\Http\Response csv file
     */
    public function export()
    {
        $user = Auth::guard('admin')->user();
        $generator = new CsvGenerator('complaints');

        $generator->setTitles(
            'Id',
            'Tipo contaminacion',
            'Distrito',
            'Estado',
            'Fecha de registro'
        );

        $generator->setColumns(
            'complaints.id',
            'contamination_types.description',
            'districts.name',
            'complaint_states.description',
            'complaints.created_at'
        );

        $generator->setFilename(storage_path('app/csv/casos_'.date('d_m_Y_H_i_s').'.csv'));

        $generator->join('contamination_types', 'complaints.type_contamination_id', '=' ,'contamination_types.id')
            ->join('districts', 'complaints.district_id', 'districts.id')
            ->join('complaint_states', 'complaints.complaint_state_id', 'complaint_states.id');

        if (!$user->is_admin) {
            $generator->where('complaints.district_id', session('district_id'))
                      ->whereNot('complaint_state_id', Complaint::INCOMPLETED);
        }

        $generator->whereIf('complaint_states.description', request('estado'))
                  ->whereIf('districts.name', request('distrito'))
                  ->whereIf('contamination_types.description', request('tipo_contaminacion'))
                  ->orderBy('complaints.id', 'DESC');

        $filename = $generator->execute();

        return response()->download($filename)->deleteFileAfterSend(true);
    }
}
