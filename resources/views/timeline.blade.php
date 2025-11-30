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
@endsection

{{-- resources/views/biography.blade.php --}}
@extends('layouts.app')

@section('title', 'Author Biography - Life of Pi Analysis')

@section('content')
<div class="container">
    <div class="biography-container">
        <div class="author-header">
            <div class="author-image">
                <img src="https://via.placeholder.com/300x400?text=Yann+Martel" alt="Yann Martel">
            </div>
            <div class="author-info">
                <h1 class="page-title">Yann Martel</h1>
                <p class="author-subtitle">Canadian Author & Philosopher</p>
                <div class="author-details">
                    <div class="detail-item">
                        <strong>Born:</strong> June 25, 1963
                    </div>
                    <div class="detail-item">
                        <strong>Nationality:</strong> Canadian
                    </div>
                    <div class="detail-item">
                        <strong>Education:</strong> Trent University (Philosophy)
                    </div>
                    <div class="detail-item">
                        <strong>Notable Awards:</strong> Man Booker Prize (2002)
                    </div>
                </div>
            </div>
        </div>

        <section class="biography-section">
            <h2>Early Life & Background</h2>
            <p>
                Yann Martel was born in Salamanca, Spain, to Canadian parents who worked as diplomats. 
                His multicultural upbringing took him across various countries including Costa Rica, France, 
                Mexico, and Alaska, experiences that would later influence his worldview and writing style.
            </p>
            <p>
                He studied philosophy at Trent University in Ontario, Canada, which deeply influenced his 
                approach to literature and his exploration of existential themes in his works.
            </p>
        </section>

        <section class="biography-section">
            <h2>Literary Career</h2>
            <p>
                Martel began his writing career with short stories and essays. His first novel, 
                "Self" (1996), explored themes of gender and identity. However, it was his second novel, 
                "Life of Pi" (2001), that brought him international acclaim and established him as a 
                major voice in contemporary literature.
            </p>
            <p>
                Following the success of Life of Pi, Martel continued to write thought-provoking works 
                including "Beatrice and Virgil" (2010) and "The High Mountains of Portugal" (2016), 
                both exploring themes of faith, loss, and the human condition.
            </p>
        </section>

        <section class="biography-section">
            <h2>Writing Philosophy</h2>
            <p>
                Martel believes in the power of storytelling to illuminate truth and meaning. He often 
                explores the intersection of reason and faith, reality and imagination, drawing from 
                his philosophical background and diverse cultural experiences.
            </p>
            <blockquote class="author-quote">
                "The world isn't just the way it is. It is how we understand it, no? And in understanding 
                something, we bring something to it, no? Doesn't that make life a story?"
            </blockquote>
        </section>

        <section class="works-section">
            <h2>Major Works</h2>
            <div class="works-grid">
                <div class="work-item">
                    <h4>Life of Pi (2001)</h4>
                    <p>His masterpiece exploring survival, faith, and the nature of storytelling.</p>
                </div>
                <div class="work-item">
                    <h4>Beatrice and Virgil (2010)</h4>
                    <p>An allegorical novel addressing the Holocaust through the lens of talking animals.</p>
                </div>
                <div class="work-item">
                    <h4>The High Mountains of Portugal (2016)</h4>
                    <p>A three-part novel exploring grief, faith, and the search for meaning.</p>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

{{-- resources/views/summary.blade.php --}}
@extends('layouts.app')

@section('title', 'Work Summary - Life of Pi Analysis')

@section('content')
<div class="container">
    <div class="summary-container">
        <div class="summary-header">
            <h1 class="page-title">Life of Pi - Plot Summary</h1>
            <p class="page-description">
                A comprehensive overview of Pi Patel's extraordinary journey of survival and faith.
            </p>
        </div>

        <div class="plot-sections">
            <section class="plot-section">
                <div class="section-number">01</div>
                <div class="section-content">
                    <h2>Childhood in Pondicherry</h2>
                    <p>
                        Piscine "Pi" Molitor Patel grows up in Pondicherry, India, where his family owns a zoo. 
                        Pi explores multiple religions simultaneously - Hinduism, Christianity, and Islam - 
                        much to the confusion of his secular parents and religious leaders.
                    </p>
                    <div class="key-points">
                        <h4>Key Elements:</h4>
                        <ul>
                            <li>Pi's unique name and how he acquired his nickname</li>
                            <li>The family zoo and Pi's relationship with animals</li>
                            <li>His spiritual journey and multi-religious practice</li>
                            <li>The political climate forcing the family to emigrate</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="plot-section">
                <div class="section-number">02</div>
                <div class="section-content">
                    <h2>The Shipwreck</h2>
                    <p>
                        In 1977, the Patel family decides to emigrate to Canada, selling their zoo animals 
                        to various international buyers. They board the Japanese cargo ship Tsimtsum, 
                        but the ship sinks during a storm in the Pacific Ocean.
                    </p>
                    <div class="key-points">
                        <h4>Key Elements:</h4>
                        <ul>
                            <li>The decision to leave India for Canada</li>
                            <li>The mysterious sinking of the Tsimtsum</li>
                            <li>Pi as the sole human survivor</li>
                            <li>Initial survivors on the lifeboat</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="plot-section">
                <div class="section-number">03</div>
                <div class="section-content">
                    <h2>Life at Sea</h2>
                    <p>
                        Pi finds himself stranded on a lifeboat with a Bengal tiger named Richard Parker. 
                        Initially terrified, Pi must learn to coexist with the tiger while fighting for 
                        survival in the vast Pacific Ocean for 227 days.
                    </p>
                    <div class="key-points">
                        <h4>Key Elements:</h4>
                        <ul>
                            <li>Establishing dominance and territory on the lifeboat</li>
                            <li>Finding food and water in the ocean</li>
                            <li>Creating a training routine with Richard Parker</li>
                            <li>Encounters with other marine life</li>
                            <li>The mysterious carnivorous island</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="plot-section">
                <div class="section-number">04</div>
                <div class="section-content">
                    <h2>Rescue and Alternative Story</h2>
                    <p>
                        Pi and Richard Parker finally reach the coast of Mexico. The tiger immediately 
                        disappears into the jungle without acknowledgment. Pi is rescued and hospitalized, 
                        where he tells his story to Japanese maritime officials who don't believe him.
                    </p>
                    <div class="key-points">
                        <h4>Key Elements:</h4>
                        <ul>
                            <li>Richard Parker's departure without goodbye</li>
                            <li>Pi's recovery and interrogation</li>
                            <li>The alternative, more brutal story</li>
                            <li>The question of which story is "true"</li>
                            <li>The power of storytelling and faith</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

        <div class="themes-preview">
            <h2>Major Themes Explored</h2>
            <div class="themes-grid">
                <div class="theme-card">
                    <div class="theme-icon">🙏</div>
                    <h3>Faith & Spirituality</h3>
                    <p>Pi's multi-religious beliefs sustain him through his ordeal</p>
                </div>
                <div class="theme-card">
                    <div class="theme-icon">🐅</div>
                    <h3>Human-Animal Relationships</h3>
                    <p>The complex bond between Pi and Richard Parker</p>
                </div>
                <div class="theme-card">
                    <div class="theme-icon">📖</div>
                    <h3>Truth vs. Story</h3>
                    <p>The power of narrative to make life bearable</p>
                </div>
                <div class="theme-card">
                    <div class="theme-icon">💪</div>
                    <h3>Survival & Resilience</h3>
                    <p>The will to live against impossible odds</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- resources/views/analysis.blade.php --}}
@extends('layouts.app')

@section('title', 'Literary Analysis - Life of Pi')

@section('content')
<div class="container">
    <div class="analysis-container">
        <div class="analysis-header">
            <h1 class="page-title">Literary Analysis</h1>
            <p class="page-description">
                Deep dive into the literary elements, themes, and critical interpretations of Life of Pi.
            </p>
        </div>

        <div class="analysis-sections">
            <section class="analysis-section">
                <h2>Major Themes</h2>
                <div class="themes-detailed">
                    <div class="theme-analysis">
                        <h3>Faith and Religious Pluralism</h3>
                        <p>
                            Martel explores the compatibility of different religious traditions through Pi's 
                            simultaneous practice of Hinduism, Christianity, and Islam. The novel suggests 
                            that faith itself, rather than specific doctrine, is what sustains the human spirit.
                        </p>
                        <blockquote>
                            "I just want to love God" - Pi's response to religious leaders who demand exclusivity
                        </blockquote>
                    </div>

                    <div class="theme-analysis">
                        <h3>The Nature of Truth and Storytelling</h3>
                        <p>
                            The novel's central question revolves around which version of Pi's survival story 
                            is "true." Martel suggests that the truth that makes life bearable and meaningful 
                            may be more important than factual accuracy.
                        </p>
                    </div>

                    <div class="theme-analysis">
                        <h3>Survival and Human Resilience</h3>
                        <p>
                            Pi's physical survival mirrors his spiritual and psychological endurance. The novel 
                            explores how humans adapt to extreme circumstances and what it means to remain "human" 
                            when reduced to basic survival instincts.
                        </p>
                    </div>
                </div>
            </section>

            <section class="analysis-section">
                <h2>Literary Devices and Techniques</h2>
                <div class="devices-grid">
                    <div class="device-card">
                        <h3>Allegorical Elements</h3>
                        <p>
                            Richard Parker represents Pi's survival instinct, his "animal" nature that emerges 
                            when civilized behavior becomes impossible. The tiger is both Pi's greatest threat 
                            and his salvation.
                        </p>
                    </div>

                    <div class="device-card">
                        <h3>Unreliable Narration</h3>
                        <p>
                            The framing device and Pi's alternative story raise questions about the reliability 
                            of the narrator and the nature of truth in storytelling.
                        </p>
                    </div>

                    <div class="device-card">
                        <h3>Symbolism</h3>
                        <p>
                            The ocean represents the unconscious, the lifeboat civilization, and the carnivorous 
                            island a false paradise that ultimately proves deadly.
                        </p>
                    </div>

                    <div class="device-card">
                        <h3>Magical Realism</h3>
                        <p>
                            Martel blends realistic survival narrative with fantastical elements, particularly 
                            in the carnivorous island episode.
                        </p>
                    </div>
                </div>
            </section>

            <section class="analysis-section">
                <h2>Critical Reception</h2>
                <div class="reception-content">
                    <div class="positive-reception">
                        <h3>Praised Aspects</h3>
                        <ul>
                            <li>Innovative narrative structure and philosophical depth</li>
                            <li>Vivid, immersive descriptions of survival at sea</li>
                            <li>Thoughtful exploration of faith and spirituality</li>
                            <li>The powerful allegory of human nature and civilization</li>
                        </ul>
                    </div>

                    <div class="critical-reception">
                        <h3>Critical Perspectives</h3>
                        <ul>
                            <li>Some critics found the religious themes heavy-handed</li>
                            <li>Questions raised about the portrayal of Indian culture</li>
                            <li>Debate over whether the fantastical elements enhance or detract from the story</li>
                            <li>Discussion about the novel's treatment of truth and reality</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="analysis-section">
                <h2>Cultural Impact</h2>
                <p>
                    Life of Pi has become a modern classic, widely taught in schools and universities. 
                    Its exploration of faith, survival, and storytelling resonates across cultures, 
                    making it one of the most internationally successful Canadian novels of the 21st century.
                </p>
                
                <div class="impact-stats">
                    <div class="impact-item">
                        <span class="impact-number">40+</span>
                        <span class="impact-label">Languages Translated</span>
                    </div>
                    <div class="impact-item">
                        <span class="impact-number">15M+</span>
                        <span class="impact-label">Copies Sold Worldwide</span>
                    </div>
                    <div class="impact-item">
                        <span class="impact-number">Academy Award</span>
                        <span class="impact-label">Winning Film Adaptation</span>
                    </div>
                </div>
            </section>
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