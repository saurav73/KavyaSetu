<?php

namespace App\Http\Controllers;

use App\Http\Requests\PoemStoreRequest;
use App\Http\Requests\PoemUpdateRequest;
use App\Models\Poem;

/**
 * Handles the poem lifecycle: the public poem feed, detail pages,
 * and author-scoped create, edit, and delete actions.
 */
class PoemController extends Controller
{
    /**
     * Show the public feed of published poems, newest first.
     */
    public function index()
    {
        $poems = Poem::latest()
            ->with('user:id,name')
            ->where('is_published', true)
            ->simplePaginate(12);

        return view('poems.index', compact('poems'));
    }

    /**
     * Show one poem. Drafts are hidden from everyone except the author.
     */
    public function show(Poem $poem)
    {
        if (!$poem->is_published && $poem->user_id !== auth()->id()) {
            abort(404);
        }

        $poem->load('user:id,name');
        return view('poems.show', compact('poem'));
    }

    /**
     * Show the form for writing a new poem.
     */
    public function create()
    {
        return view('poems.create');
    }

    /**
     * Store a newly written poem for the logged-in user.
     */
    public function store(PoemStoreRequest $request)
    {
        $poem = auth()->user()->poems()->create($request->validated());

        return redirect()
            ->route('poems.show', $poem->slug)
            ->with('success', 'Your poem has been saved as a draft.');
    }

    /**
     * Show the edit form. Only the poem's author may open it.
     */
    public function edit(Poem $poem)
    {
        $this->authorize('update', $poem);
        return view('poems.edit', compact('poem'));
    }

    /**
     * Update a poem. Only the poem's author may change it.
     */
    public function update(PoemUpdateRequest $request, Poem $poem)
    {
        $this->authorize('update', $poem);
        $poem->update($request->validated());

        return redirect()
            ->route('poems.show', $poem->slug)
            ->with('success', 'Poem updated.');
    }

    /**
     * Delete a poem. Only the poem's author may delete it.
     */
    public function destroy(Poem $poem)
    {
        $this->authorize('delete', $poem);
        $poem->delete();

        return redirect()->route('poems.my')->with('success', 'Poem deleted.');
    }

    /**
     * Show the logged-in user's own poems, including drafts.
     */
    public function myPoems()
    {
        $poems = auth()->user()->poems()->latest()->simplePaginate(10);
        return view('poems.my', compact('poems'));
    }
}