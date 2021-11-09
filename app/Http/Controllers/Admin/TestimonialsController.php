<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\Role;
use App\Models\Partner;

class TestimonialsController extends Controller
{
    private $partnerRepository;

    public function __construct(Partner $partner)
    {
        $this->partnerRepository = $partner;
       
    }

    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view('admin.pages.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $partners = $this->partnerRepository->pluck('name', 'id');
        return view('admin.pages.testimonials.create', compact('partners'));
    }


    public function store(Request $request)
    {
        Testimonial::create($request->all());

        return redirect()->route('testimonials.index')->with('msg', 'Depoimento Cadastrado!');
    }


    public function show($id)
    {
        if (!$testimonial = Testimonial::find($id)) {
            return redirect()->back();
        };

        return view('admin.pages.testimonials.show', compact('testimonial'));
    }

    public function edit($id)
    {
        if (!$testimonial = Testimonial::find($id)) {
            return redirect()->back();
        };
        $partners = Partner::pluck('name', 'id');
        return view('admin.pages.testimonials.edit', compact('testimonial', 'partners'));
    }


    public function update(Request $request, $id)
    {
        if (!$testimonial = Testimonial::find($id)) {
            return redirect()->back();
        };

        $testimonial->name = $request->name;
        $testimonial->description = $request->description;
        $testimonial->is_active = $request->is_active;
 

        $testimonial->save();

        return redirect()->route('testimonials.index');
    }


    public function destroy($id)
    {
        if (!$testimonial = Testimonial::find($id)) {
            return redirect()->back();
        };

        $testimonial->delete();

        return redirect()->route('testimonials.index');
    }
}
