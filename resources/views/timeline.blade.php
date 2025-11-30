{{-- resources/views/timeline.blade.php --}}
@extends('layouts.app')

@section('title', 'Historical Timeline - Life of Pi Analysis')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="content-header">
        <h1 class="page-title">Historical Timeline</h1>
        <p class="page-description">
            Explore the chronological journey of Life of Pi from conception to cultural phenomenon.
        </p>
    </div>

    <div class="timeline-container">
        <div class="timeline-item">
            <div class="timeline-year">1996</div>
            <div class="timeline-content">
                <h3>Inspiration Strikes</h3>
                <p>Yann Martel reads a review of a Brazilian book "Max and the Cats" by Moacyr Scliar, which plants the seed for Life of Pi. He travels to India to research and develop the story.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-year">2001</div>
            <div class="timeline-content">
                <h3>Publication</h3>
                <p>Life of Pi is published by Knopf Canada. The novel receives immediate critical acclaim and begins its journey to international recognition.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-year">2002</div>
            <div class="timeline-content">
                <h3>Man Booker Prize Victory</h3>
                <p>Life of Pi wins the prestigious Man Booker Prize, catapulting Martel to international fame and the book to bestseller status worldwide.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-year">2003-2010</div>
            <div class="timeline-content">
                <h3>Global Success</h3>
                <p>The novel is translated into over 40 languages, sells millions of copies worldwide, and becomes a staple in literature curricula across many countries.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-year">2012</div>
            <div class="timeline-content">
                <h3>Hollywood Adaptation</h3>
                <p>Ang Lee's film adaptation premieres, featuring groundbreaking visual effects and earning 11 Academy Award nominations, winning 4 including Best Director.</p>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-year">2015-Present</div>
            <div class="timeline-content">
                <h3>Enduring Legacy</h3>
                <p>Life of Pi continues to inspire adaptations, theatrical productions, and remains one of the most widely read contemporary novels in educational settings.</p>
            </div>
        </div>
    </div>
</div>

@endsection