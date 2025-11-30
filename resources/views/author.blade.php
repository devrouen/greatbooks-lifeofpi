{{-- resources/views/author.blade.php --}}
@extends('layouts.app')

@section('title', 'About the Author - Yann Martel')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/author.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="author-container">

        {{-- HERO SECTION WITH IMAGE --}}
        <div class="author-hero">
            <div class="author-photo-wrapper">
                <div class="author-photo-frame">
                    {{-- Replace src with your actual author image --}}
                    <img src="{{ asset('images/martel.jpg') }}" alt="Yann Martel" class="author-photo">
                </div>
                <div class="author-photo-glow"></div>
            </div>

            <div class="author-hero-content">
                <h1 class="page-title">About the Author</h1>
                <p class="page-description">
                    Discover the life, influences, and literary journey of Yann Martel, the acclaimed author of
                    <em>Life of Pi</em>.
                </p>

                <div class="author-meta-chips">
                    <span class="meta-chip">Born 1963 · Salamanca, Spain</span>
                    <span class="meta-chip">Canadian Author</span>
                    <span class="meta-chip">Man Booker Prize Winner</span>
                </div>
            </div>
        </div>

        <div class="author-content">

            <section class="author-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">01</span>
                        <h2><span></span>Biographical Overview</h2>
                    </div>
                    <div class="bio-card">
                        <p>
                            <strong>Yann Martel</strong> was born on June 25, 1963, in Salamanca, Spain, to Canadian parents—both diplomats. 
                            His upbringing was marked by frequent relocations across Costa Rica, France, Mexico, and Canada, 
                            fostering a cosmopolitan worldview that deeply informs his writing.
                        </p>
                        <p>
                            Martel studied philosophy at Trent University in Ontario and later traveled extensively, 
                            including a transformative stay in India that would inspire the setting and spiritual themes of <em>Life of Pi</em>.
                        </p>
                        <p>
                            Before achieving global fame, he published short stories and two novels—<em>The Facts Behind the Helsinki 
                            Roccamatios</em> (1993) and <em>Self</em> (1996)—which garnered critical attention but modest readership.
                        </p>
                    </div>
                </div>
            </section>

            <section class="author-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">02</span>
                        <h2>Breakthrough & Recognition</h2>
                    </div>
                    <div class="achievement-content">
                        <div class="achievement-item">
                            <h3>Life of Pi (2001)</h3>
                            <p>
                                After facing multiple rejections, <em>Life of Pi</em> was published and went on to win the 
                                prestigious <strong>Man Booker Prize in 2002</strong>. The novel sold over twelve million copies 
                                worldwide and was translated into more than 50 languages.
                            </p>
                            <p>
                                In 2012, it was adapted into an award-winning film directed by Ang Lee, which won four Academy 
                                Awards, including Best Director.
                            </p>
                        </div>

                        <div class="achievement-item">
                            <h3>Literary Impact</h3>
                            <p>
                                Martel’s work revitalized philosophical and spiritual discourse in contemporary fiction. 
                                His advocacy for storytelling as a vehicle for truth and empathy has influenced a generation 
                                of writers and readers.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="author-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">03</span>
                        <h2>Themes & Literary Philosophy</h2>
                    </div>
                    <div class="themes-grid">
                        <div class="theme-card">
                            <h3>Faith & Doubt</h3>
                            <p>
                                Martel consistently explores the interplay between belief and skepticism, arguing that stories—
                                not facts—are essential to sustaining faith in an uncertain world.
                            </p>
                        </div>
                        <div class="theme-card">
                            <h3>Storytelling as Survival</h3>
                            <p>
                                For Martel, narratives are not mere entertainment but vital tools for meaning-making, 
                                psychological resilience, and human connection.
                            </p>
                        </div>
                        <div class="theme-card">
                            <h3>Cultural Hybridity</h3>
                            <p>
                                Drawing from his multicultural background, Martel champions cross-cultural dialogue and 
                                religious pluralism as paths to deeper understanding.
                            </p>
                        </div>
                        <div class="theme-card">
                            <h3>Animal Symbolism</h3>
                            <p>
                                Animals in Martel’s fiction often represent facets of the human psyche, challenging 
                                the boundary between humanity and animality.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="author-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">04</span>
                        <h2>Major Works</h2>
                    </div>
                    <div class="works-container">
                        <div class="work-item">
                            <strong>The Facts Behind the Helsinki Roccamatios</strong> (1993)
                            <p>A collection of short stories blending realism and allegory, exploring history, memory, and death.</p>
                        </div>
                        <div class="work-item">
                            <strong>Self</strong> (1996)
                            <p>A novel about gender fluidity and identity, following a narrator who transforms from male to female.</p>
                        </div>
                        <div class="work-item">
                            <strong>Life of Pi</strong> (2001)
                            <p>His magnum opus—a philosophical adventure about faith, survival, and the power of storytelling.</p>
                        </div>
                        <div class="work-item">
                            <strong>Beatrice and Virgil</strong> (2010)
                            <p>An allegorical novel using animal characters to confront the Holocaust and the limits of representation.</p>
                        </div>
                        <div class="work-item">
                            <strong>The High Mountains of Portugal</strong> (2016)
                            <p>A triptych narrative weaving grief, faith, and curiosity across three centuries.</p>
                        </div>
                        <div class="work-item">
                            <strong>101 Letters to a Prime Minister</strong> (2012–2013)
                            <p>A nonfiction project where Martel sent a book a week to Canadian Prime Minister Stephen Harper to promote literary culture.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="author-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">05</span>
                        <h2>Writing Process & Beliefs</h2>
                    </div>
                    <div class="process-content">
                        <p>
                            Martel describes himself as a slow, meticulous writer who spends years researching and reflecting 
                            before drafting. He believes literature should “<em>make you feel and think at the same time</em>.”
                        </p>
                        <p>
                            He is an outspoken advocate for public libraries, literary education, and the moral necessity of reading fiction. 
                            In his words: <em>“Fiction stretches the emotional and intellectual canvas of the reader.”</em>
                        </p>
                        <p>
                            Martel currently lives in Saskatoon, Canada, with his partner and children, and continues to write 
                            and promote literary culture through public engagement and experimental projects.
                        </p>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
@endsection
