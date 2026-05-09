<?php

namespace App\Http\Controllers;

class ProgramController extends Controller
{
    public function index()
    {
        $program = [
            [
                'day' => 'Joi, 15 Iunie',
                'events' => [
                    ['time' => '10:00', 'title' => 'Deschidere oficială', 'description' => 'Ceremonia de deschidere a expoziției'],
                    ['time' => '12:00', 'title' => 'Prezentări mașini electrice', 'description' => 'Test drive-uri și demonstrații'],
                    ['time' => '18:00', 'title' => 'Cocktail expozanți', 'description' => 'Eveniment networking pentru parteneri'],
                ],
            ],
            [
                'day' => 'Vineri, 16 Iunie',
                'events' => [
                    ['time' => '09:00', 'title' => 'Deschidere publicului', 'description' => 'Intrare liberă pentru vizitatori'],
                    ['time' => '14:00', 'title' => 'Concurs design auto', 'description' => 'Competiție pentru studenți la design'],
                    ['time' => '17:00', 'title' => 'Premieri câștigători', 'description' => 'Ceremonia de premiere'],
                ],
            ],
            [
                'day' => 'Sâmbătă, 17 Iunie',
                'events' => [
                    ['time' => '09:00', 'title' => 'Zi de familie', 'description' => 'Activități speciale pentru copii'],
                    ['time' => '15:00', 'title' => 'Licitație auto', 'description' => 'Licitație pentru mașini de colecție'],
                    ['time' => '19:00', 'title' => 'Închidere eveniment', 'description' => 'Ceremonia de închidere'],
                ],
            ],
        ];

        return view('program', compact('program'));
    }
}