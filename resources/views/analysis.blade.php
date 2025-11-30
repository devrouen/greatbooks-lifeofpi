<!-- resources/views/analysis.blade.php -->
@extends('layouts.app')

@section('title', 'Literary Analysis - Life of Pi')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/analysis.css') }}">
@endpush

@section('content')
<div class="container">
    <div class="analysis-container">
        <div class="analysis-header">
            <h1 class="page-title">Literary Analysis</h1>
            <p class="page-description">
                A deep exploration of meaning, technique, and thematic depth in Yann Martel’s <em>Life of Pi</em>.
            </p>
        </div>

        <div class="analysis-content">
            {{-- 01 – Interpretation of the Prose --}}
            <section class="analysis-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">01</span>
                        <h2>Interpretation of the Prose</h2>
                    </div>
                    <div class="interpretation-grid">
                        <div class="interpretation-card">
                            <strong>Dual Narratives</strong>
                            <p>
                                Pi presents two contradictory survival accounts—one with animals, one with humans—forcing readers 
                                to choose between a symbolic, faith-filled story and a brutal, rational one. This duality 
                                embodies the tension between imagination and empiricism.
                            </p>
                        </div>
                        <div class="interpretation-card">
                            <strong>Symbolism</strong>
                            <p>
                                Richard Parker is not merely a tiger but a manifestation of Pi’s primal instincts, survival drive, 
                                and suppressed animal nature—essential for enduring the ordeal.
                            </p>
                        </div>
                        <div class="interpretation-card">
                            <strong>Narrative Voice</strong>
                            <p>
                                The interplay between the fictional “Author” and Pi creates a layered, metafictional frame that 
                                questions who controls the story and what constitutes truth.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 02 – Core Themes --}}
            <section class="analysis-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">02</span>
                        <h2>Core Themes</h2>
                    </div>
                    <div class="themes-grid">
                        <div class="theme-card">
                            <h3>Faith and Belief</h3>
                            <p>
                                Martel portrays religion not as dogma but as a compass for meaning. Pi’s embrace of Hinduism, 
                                Christianity, and Islam reflects a universal spiritual yearning beyond institutional boundaries.
                            </p>
                        </div>
                        <div class="theme-card">
                            <h3>Survival and Human Instinct</h3>
                            <p>
                                The lifeboat becomes a microcosm of human resilience—where morality bends under the weight 
                                of necessity, and survival demands both cunning and cruelty.
                            </p>
                        </div>
                        <div class="theme-card">
                            <h3>Storytelling and Truth</h3>
                            <p>
                                The novel asserts that emotional truth may outweigh factual accuracy. The “better story” 
                                offers hope, beauty, and meaning—even if it isn’t “real.”
                            </p>
                        </div>
                        <div class="theme-card">
                            <h3>Humans and Nature</h3>
                            <p>
                                Through Richard Parker and the ocean, Martel explores humanity’s fragile, interdependent 
                                relationship with the natural world—both awe-inspiring and terrifying.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 03 – Literary Techniques --}}
            <section class="analysis-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">03</span>
                        <h2>Literary Techniques</h2>
                    </div>
                    <div class="techniques-list">
                        <div class="technique-item">
                            <strong>Narrative Structure</strong>
                            <p>A frame narrative with embedded storytelling blurs the line between author, narrator, and reader, inviting active interpretation.</p>
                        </div>
                        <div class="technique-item">
                            <strong>Symbolism</strong>
                            <ul>
                                <li><strong>Richard Parker</strong> = survival instinct / shadow self</li>
                                <li><strong>The Ocean</strong> = the unconscious, divine mystery, chaos</li>
                                <li><strong>The Floating Island</strong> = false paradise, spiritual complacency</li>
                            </ul>
                        </div>
                        <div class="technique-item">
                            <strong>Mood &amp; Tone</strong>
                            <p>Shifts fluidly from wonder (bioluminescent sea) to horror (carnage on the lifeboat) to quiet reflection (prayers at sunset).</p>
                        </div>
                        <div class="technique-item">
                            <strong>Characterization</strong>
                            <p>Pi is both saint and survivor—reciting scripture while skinning fish, embodying the duality of human nature.</p>
                        </div>
                        <div class="technique-item">
                            <strong>Magical Realism</strong>
                            <p>Blends realistic survival details with surreal, dreamlike imagery (e.g., the carnivorous island), keeping truth ambiguous.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 04 – Ideas Beneath the Text --}}
            <section class="analysis-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">04</span>
                        <h2>Ideas Beneath the Text</h2>
                    </div>
                    <div class="subtext-content">
                        <div class="subtext-item">
                            <strong>The Human Need for Meaning</strong>
                            <p>Stories, faith, and symbols are not escapes—they are tools for enduring suffering with dignity.</p>
                        </div>
                        <div class="subtext-item">
                            <strong>Duality of Human Nature</strong>
                            <p>Civilization and savagery coexist within Pi; Richard Parker is not his enemy but his necessary counterpart.</p>
                        </div>
                        <div class="subtext-item">
                            <strong>Ambiguity of Truth</strong>
                            <p>Facts may describe events, but stories give them meaning. The “true” story is the one that sustains the soul.</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 05 – Significance for the Reader --}}
            <section class="analysis-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">05</span>
                        <h2>Significance for the Reader</h2>
                    </div>
                    <div class="significance-grid">
                        <div class="significance-card">
                            <strong>Personal Reflection</strong>
                            <p>Readers must confront their own worldview: Do you believe the story with animals—or without?</p>
                        </div>
                        <div class="significance-card">
                            <strong>Universal Relevance</strong>
                            <p>Speaks to anyone who has faced loss, fear, or existential doubt—offering storytelling as an act of resilience.</p>
                        </div>
                        <div class="significance-card">
                            <strong>Literary Importance</strong>
                            <p>Challenges realism, champions allegory, and redefines how fiction can convey philosophical truth.</p>
                        </div>
                        <div class="significance-card">
                            <strong>Emotional Impact</strong>
                            <p>Leaves readers not just moved by survival, but haunted by the question: <em>“Which story do you need?”</em></p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- 06 – Literary Merits & Standards --}}
            <section class="analysis-section">
                <div class="section-content">
                    <div class="section-header">
                        <span class="section-pill">06</span>
                        <h2>Literary Merits &amp; Standards</h2>
                    </div>
                    <div class="merits-container">
                        <div class="merit-item">
                            <strong>1. Universality</strong>
                            <p>Themes of faith, survival, and meaning transcend culture, time, and belief systems.</p>
                        </div>
                        <div class="merit-item">
                            <strong>2. Artistry</strong>
                            <p>Vivid, cinematic prose and rich symbolism (e.g., “The sea so beautiful, so blue, so vast…”) showcase poetic mastery.</p>
                        </div>
                        <div class="merit-item">
                            <strong>3. Intellectual Value</strong>
                            <p>Engages philosophy, epistemology, and theology—prompting deep reflection on truth and belief.</p>
                        </div>
                        <div class="merit-item">
                            <strong>4. Suggestiveness</strong>
                            <p>Rich in symbolic ambiguity, inviting multiple interpretations and personal resonance.</p>
                        </div>
                        <div class="merit-item">
                            <strong>5. Spiritual Value</strong>
                            <p>“I just want to love God”—a line that captures the novel’s open-hearted spiritual core.</p>
                        </div>
                        <div class="merit-item">
                            <strong>6. Permanence</strong>
                            <p>Enduring relevance since 2001; studied globally and adapted into an Oscar-winning film.</p>
                        </div>
                        <div class="merit-item">
                            <strong>7. Style</strong>
                            <p>Blends fable, memoir, and philosophical discourse in accessible yet profound prose.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
