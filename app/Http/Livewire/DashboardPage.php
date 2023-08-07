<?php

namespace App\Http\Livewire;

use App\Models\DataPenjualan;
use Livewire\Component;

class DashboardPage extends Component
{
    public function render()
    {
        $this->totalPenjualan = DataPenjualan::whereDate('created_at', date('Y-m-d'))->get()->count();
        $this->PenjualanHariIni = DataPenjualan::get()->count();
        return view('livewire.dashboard-page');
    }
}
