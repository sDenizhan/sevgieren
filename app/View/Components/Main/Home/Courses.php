<?php

namespace App\View\Components\Main\Home;

use App\Enums\Status;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Courses extends Component
{
    public ?array $params = [];

    public function __construct(?array $data = []){
        $this->params = $data;
    }

    public function render(): View {
        $data = $this->params;
        $courses = Course::orderBy('start_date', 'asc')
                            ->where(['status' => Status::Active->value])
                            ->whereDate('start_date', '>=', Carbon::today()->toDateString())
                            ->take(10)
                            ->get();
        return view('components.main.home.courses', compact('data', 'courses'));
    }
}
