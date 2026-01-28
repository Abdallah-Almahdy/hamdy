<?php

namespace App\Livewire\Sections;

use App\Models\product;
use App\Models\section;
use Livewire\Component;
use App\Models\subSection;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class Index extends Component
{
    use WithPagination; // Add WithFileUploads to handle file uploads

    protected $paginationTheme = 'bootstrap';
    public $show = [];
    public $perPage = 5;
     public function delete($id)
    {
        $checkIfMain = section::find($id);
        if ($checkIfMain) {
            $checkSubSection = subSection::where(['main_section_id' => $id])->get();

            if (count($checkSubSection) == 0) {
                section::destroy($id);
            }
        }
    }

    public function deleteSubSection($id)
    {
        $checkIfsub = subSection::find($id);
        if ($checkIfsub) {
            $checkSubSectionProducts = product::where(['section_id' => $id])->get();

            if ($checkSubSectionProducts->count() == 0) {
                subSection::destroy($id);
            }
        }
    }


    public function showSubSection(int $id)
    {
        if (isset($this->show[$id])) {
            $this->show[$id] = false;
        } else {
            $this->show[$id] = true;
        }
    }

    // Custom paginate method to paginate the merged collection
    public function paginateItems($items)
    {
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = $this->perPage;

        // Slice the items for the current page
        $currentItems = $items->slice(($currentPage - 1) * $perPage, $perPage);

        // Create the paginator
        return new LengthAwarePaginator(
            $currentItems,
            $items->count(),
            $perPage,
            $currentPage,
            ['path' => LengthAwarePaginator::resolveCurrentPath()]
        );
    }

    public function render()
    {
        // // Fetch sections and subSections, and merge them
        // $sections = Section::all();
        // $subSections = SubSection::all();

        // // Merge both collections and paginate them
        // $items = $sections->merge($subSections);

        // // Paginate the merged collection
        // $paginatedItems = $this->paginateItems($items);

        // return view('livewire.sections.index', [
        //     'paginatedItems' => $paginatedItems,
        // ]);

        // Paginate sections and subsections separately
        $sections = Section::paginate($this->perPage); // Paginate sections
        $subSections = SubSection::all(); // Get all subsections (not paginated)

        return view('livewire.sections.index', [
            'sections' => $sections,
            'subSections' => $subSections,
        ]);
    }
}
