<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregoriohc\LaravelTrello\Facades\Wrapper as Trello;

class TrelloController extends Controller
{
    const DEFAULT_BOARD = 'LLqjlCdz';

    /**
     * Zeigt alle Karten des Standard-Board an.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $board = Trello::manager()->getBoard(self::DEFAULT_BOARD);
        $lists = $board->getLists();

        return view('welcome', [
            'board' => $board,
            'lists' => $lists
        ]);
    }

    /**
     * Legt eine Karte für die ausgewählte Liste an.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createCard(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'description' => 'required|min:5'
        ]);

        $card = Trello::manager()->getCard();
        $card->setBoardId($request->boardId)
            ->setListId($request->listId)
            ->setName($request->name)
            ->setDescription($request->description)
            ->save();

        return back();
    }

    /**
     * Editiert eine Karte.
     *
     * @param $cardId
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateCard($cardId, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'description' => 'required|min:5'
        ]);

        $card = Trello::manager()->getCard($cardId);
        $card->setName($request->name)
            ->setDescription($request->description)
            ->save();

        return back();
    }

    /**
     * Fügt der Karte einen zufälligen Kommentar hinzu.
     *
     * @param $cardId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addRandomComment($cardId)
    {
        $comments = [
            "I'm bored",
            "I'm stupid",
            "Yee",
            "Das ist mathematisch Korrekt",
            "Vorwärtsrolle zur Flucht"
        ];
        $comment = $comments[array_rand($comments)];

        $card = Trello::manager()->getCard($cardId);
        $card->addComment($comment)->save();

        return back();
    }
}
