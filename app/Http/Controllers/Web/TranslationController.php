<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Translation\StoreTranslationRequest;
use App\Http\Requests\Translation\UpdateTranslationRequest;
use App\Models\Translation;
use App\Services\LocaleService;
use App\Services\TranslationService;

class TranslationController extends Controller
{
    public function index($lang, $group)
    {
        return view('translations.index', compact('group'));
    }

    public function create($lang, $group)
    {
        $locales = LocaleService::all();

        return view('translations.create', compact('group', 'locales'));
    }

    public function store($lang, $group, StoreTranslationRequest $request)
    {
        TranslationService::create($group, $request->validated());

        return redirect()->route('translations.index', ['lang' => _lang(), 'group' => $group])->with('success', __('admin.added'));
    }

    public function edit($lang, Translation $translation)
    {
        $locales = LocaleService::all();

        return view('translations.edit', compact('translation', 'locales'));
    }

    public function update($lang, Translation $translation, UpdateTranslationRequest $request)
    {
        TranslationService::update($translation, $request->validated());

        return redirect()->route('translations.index', ['lang' => _lang(), 'group' => $translation->group])->with('success', __('admin.saved'));
    }
}
