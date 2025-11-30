{{-- resources/views/timeline.blade.php --}}
@extends('layouts.app')

@section('title', 'Historical Timeline - Life of Pi Analysis')

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

@push('styles')
<style>
.timeline-container {
    position: relative;
    margin: 3rem 0;
}

.timeline-container::before {
    content: '';
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 4px;
    height: 100%;
    background: var(--gradient-primary);
    border-radius: 2px;
}

.timeline-item {
    display: flex;
    margin: 3rem 0;
    position: relative;
}

.timeline-item:nth-child(odd) {
    flex-direction: row-reverse;
}

.timeline-year {
    flex: 0 0 100px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--primary-color);
    color: white;
    border-radius: 50px;
    font-weight: 700;
    font-size: 1.1rem;
    height: 60px;
    position: relative;
    z-index: 2;
}

.timeline-content {
    flex: 1;
    background: white;
    padding: 2rem;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
    margin: 0 2rem;
    border: 1px solid var(--border-color);
}

.plot-section, .analysis-section {
    display: flex;
    gap: 2rem;
    margin: 3rem 0;
    padding: 2rem;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
}

.section-number {
    flex: 0 0 80px;
    height: 80px;
    border-radius: 50%;
    background: var(--gradient-primary);
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 700;
}

.section-content {
    flex: 1;
}

.themes-grid, .devices-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin: 2rem 0;
}

.theme-card, .device-card {
    background: white;
    padding: 1.5rem;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
    text-align: center;
}

.theme-icon {
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.author-header {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 3rem;
    margin-bottom: 3rem;
}

.author-image img {
    width: 100%;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-md);
}

.biography-section {
    margin: 3rem 0;
    padding: 2rem;
    background: white;
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-sm);
}

.author-quote {
    font-size: 1.2rem;
    font-style: italic;
    color: var(--text-secondary);
    border-left: 4px solid var(--primary-color);
    padding-left: 1rem;
    margin: 2rem 0;
}

.works-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.work-item {
    padding: 1.5rem;
    background: var(--bg-secondary);
    border-radius: var(--radius-md);
    border: 1px solid var(--border-color);
}

@media (max-width: 768px) {
    .timeline-container::before {
        left: 30px;
    }
    
    .timeline-item {
        flex-direction: row !important;
    }
    
    .timeline-item:nth-child(odd) {
        flex-direction: row !important;
    }
    
    .timeline-year {
        flex: 0 0 60px;
        height: 60px;
        font-size: 1rem;
    }
    
    .author-header {
        grid-template-columns: 1fr;
        text-align: center;
    }
    
    .plot-section, .analysis-section {
        flex-direction: column;
    }
    
    .section-number {
        flex: 0 0 60px;
        height: 60px;
        align-self: center;
    }
}
</style>
@endpush
@endsection