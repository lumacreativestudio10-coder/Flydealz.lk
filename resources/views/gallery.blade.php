@extends('layouts.app')

@section('title', 'Gallery - Flydeals.lk')

@section('content')
<div class="container" style="padding: 4rem 0;">
    <div style="text-align: center; margin-bottom: 4rem;">
        <h1 style="font-size: 3rem;">Inspiration Gallery</h1>
        <p style="color: var(--text-muted); max-width: 600px; margin: 0 auto; font-size: 1.1rem;">Explore the beautiful moments and destinations captured by our travelers.</p>
    </div>

    <div style="column-count: 3; column-gap: 1.5rem;">
        <!-- Images -->
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/652890073_1550633283617468_6030901323134911467_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/669638443_1578455674168562_2909321140555469710_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/675967672_1584652613548868_7627050287511688315_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/682054221_1589098836437579_6065701828360075552_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/687681391_1596709322343197_9175933055540947004_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/696005602_1600895621924567_6682433651486531470_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/700679523_1609349767745819_6655976540710733993_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/705771831_17957126421122667_5804666573290202422_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/708877453_17957733489122667_6945871277912056265_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/721441039_1631324015548394_5901557433687768848_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/736740460_1652518746762254_2337896539520437929_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/739471453_1653270436687085_1346128924935755021_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
        <div style="break-inside: avoid; margin-bottom: 1.5rem; border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow-sm);">
            <img src="{{ asset('images/741751607_1659144362766359_2038627261043240500_n.jpg') }}" alt="Gallery Image" style="width: 100%; display: block;">
        </div>
    </div>
</div>
@endsection
